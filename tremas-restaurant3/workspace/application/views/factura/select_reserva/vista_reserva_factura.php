<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">
		
	</div>
	 <div class="table-responsive" >

        
		<table class="table" >
		    <th>Id de la reserva</th>
			<th>Nombre de la reserva</th>
			<th>Personsa</th>
			<th>Fecha</th>
			<?php 
			if( !empty($query) ) {
				foreach($query as $row): ?>
				<tr> 
						
						<!--<td><?php echo $row->id_nombre; ?></td>-->
						<td><?php echo $row->id_reserva; ?></td>
						<td><?php echo $row->nombre; ?></td><!-- cambiar por el nombre -->
						<td><?php echo $row->personas_max; ?></td>
					    <td><?php echo $row->fecha; ?></td>
						<form name="modi"  action='<?php echo base_url()?>mostrar_factura' method='post'>
							<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='idid' />
							<td class"hidden-print"><button class="btn btn-success" type="submit">Elegir Reserva</button></td>
						</form>
					
					 </tr> 
				
				<?php endforeach;}
				
				else{echo"</br></br><h3>No hay comandas para cobrar</h3>";} ?>
		</table>
	</div>
</div>