<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">
		
	</div>
	<div class=" col-md-6 col-md-offset-3 table-responsive">

        
		<table class="table">
			<th>Platos</th>
			<th>Precio</th>
			<th>Fecha</th>
			<?php 
			$suma=0;
			if( !empty($query) ) {
				foreach($query as $row): ?>
					<tr> 
						
						
						<td><?php echo $row->nombre; ?></td><!-- cambiar por el nombre -->
						<td><?php echo $row->precio; $suma+=$row->precio; ?>&euro;</td>
						<td><?php echo $row->fecha; ?></td>
					    
						
					</tr> 
				
				<?php endforeach;}
				
				else{echo"no coje comandas";} ?>
		</table>
		
	</div>
	<div class=" col-md-6 col-md-offset-7 table-responsive">
		<form name="modi"  action='<?php echo base_url()?>mostrar_factura' method='post'>
		<input type='hidden' value='<?php echo $row->id_reserva;?>' name='idid' />
		<input type='hidden' value='<?php echo $suma;?>' name='pagar' />
		<input type='hidden' value='<?php echo $row->fecha; ?>' name='fecha' />
		<?php echo "Precio Total:". $suma ?>&euro;
		<button class="btn btn-success hidden-print " onclick="window.print();" type="submit">cobrar</button>
		</form>
	</div>	
	<button class="btn btn-danger  col-md-offset-8 hidden-print " onclick='window.location.href = "<?php echo base_url()?>mostrar_factura_reserva"' >retorna</button>
						
						
</div>