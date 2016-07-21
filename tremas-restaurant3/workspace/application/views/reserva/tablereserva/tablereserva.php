<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<?php if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado') : ?>
				<a href='<?php echo base_url()?>add_reserva'> <button class="btn btn-success">Añadir Reserva</button></a>
			<?php endif; ?>
			<?php if(isset($_SESSION['category']) && $_SESSION['category'] == 'user') : ?>
				<a href='<?php echo base_url()?>add_reserva_user'> <button class="btn btn-success">Añadir Reserva</button></a>
			<?php endif; ?>
			
			
			
	
		
		</div>
	</div>
	<div class="table-responsive">
		
		<table class="table">
			<?php if(isset($_SESSION['category']) && $_SESSION['category'] == 'empleado') : ?>
				
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Personas</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>No Cliente</th>
				<th>Usuario</th>
				<?php 
				if( !empty($query) ) {
				foreach($query as $row): ?>
					<tr> 
							
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->personas_max; ?></td>
						<td><?php echo $row->fecha; ?></td>
						<td><?php echo $row->hora; ?></td>
						<td><?php echo $row->is_not_client; ?></td>
						<td><?php echo $row->username; ?></td>
						
						<form action='<?php echo base_url()?>modificar_reserva' method='post'>
							<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='idid' />
							<td><button class="btn btn-success">Modificar</button></td>
						</form>
						
						<form action='<?php echo base_url()?>borrar_reserva' method='post'>
							<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='idid' />
							<td><button class="btn btn-danger"  type="submit" >Eliminar</button></td>
						</form>
					 </tr> 
				
				<?php endforeach;}else{echo"<h2>No Hay reservas</h2>";} ?>
			
			<?php endif; ?>
			<?php if(isset($_SESSION['category']) && $_SESSION['category'] == 'user') : ?>
			
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Personas</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Usuario</th>
				<?php 
				if( !empty($query) ) {
				foreach($query as $row): ?>
					<tr> 
							
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->personas_max; ?></td>
						<td><?php echo $row->fecha; ?></td>
						<td><?php echo $row->hora; ?></td>
						<td><?php echo $row->username; ?></td>
						
						<form action='<?php echo base_url()?>modificar_reserva' method='post'>
							<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='idid' />
							<td><button class="btn btn-warning">Modificar</button></td>
						</form>
						<form action='<?php echo base_url()?>borrar_reserva' method='post'>
							<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='idid' />
							<td><button class="btn btn-danger"  type="submit" >Eliminar</button></td>
						</form>
					 </tr> 
				
				<?php endforeach;}else{echo"<h2>No Hay reservas</h2>";} ?>
			
			<?php endif; ?>
		</table>
	</div>
</div>