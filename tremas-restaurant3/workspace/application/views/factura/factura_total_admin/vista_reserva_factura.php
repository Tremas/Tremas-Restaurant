<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">
		<!--<div class="col-md-4 col-md-offset-8">
			<a href='<?php echo base_url()?>add_empleado'> <button class="btn btn-success">Añadir Empleado</button></a>
		</div>-->
	</div>
	<div class=" col-md-6 col-md-offset-3 table-responsive">

        
		<table class="table">
			<th>Id de la reserva</th>
			<th>Precio</th>
			<th>Fecha</th>
			<?php 
			$suma=0;
			if( !empty($query) ) {
				foreach($query as $row): ?>
				<tr> 
						
						
						<td><?php echo $row->id_reserva; ?></td><!-- cambiar por el nombre -->
						<td><?php echo $row->preu_total; $suma+=$row->preu_total; ?>&euro;</td>
						<td><?php echo $row->date; ?></td>
					    
						
					 </tr> 
				
				<?php endforeach;}
				
				else{echo"no coje comandas";} ?>
		</table>
		
	</div>
	<div class=" col-md-6 col-md-offset-6">
		<?php echo "<h5>Precio Total:". $suma."&euro;</h5>"; ?>
	</div>
						
						
</div>