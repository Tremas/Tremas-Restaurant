<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">

	</div>
	 <div class="table-responsive">

        
		<table class="table">
		    <th>Id de la reserva</th>
			<th>Nombre de la reserva</th>
			<th>Personsas</th>
			<?php 
			if( !empty($query) ) {
			foreach($query as $row): ?>
			<tr> 
					
				
					<td><?php echo $row->id_reserva; ?></td>
					<td><?php echo $row->nombre; ?></td><!-- cambiar por el nombre -->
					<td><?php echo $row->personas_max; ?></td>
				    
					<form name="modi" action='<?php echo base_url()?>mostrar_comanda' method='post'>
					<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='idid' />
					<td><button class="btn btn-success" type="submit">Elegir Reserva</button></td>
					</form>
					
				 </tr> 
			
			<?php endforeach;}else{echo"no coje datos";} ?>
		</table>
	</div>
</div>