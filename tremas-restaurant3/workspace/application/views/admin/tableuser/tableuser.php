<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<a href='<?php echo base_url()?>add_empleado'> <button class="btn btn-success">Añadir Empleado</button></a>
		</div>
	</div>
	 <div class="table-responsive">

		<table class="table">
			<th>Id</th>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Categoria</th>
			<th>Telefono</th>
			<th>Email</th>
			<th>Modificar</th>
			<th>Eliminar</th>
			<?php 
			if( !empty($query) ) {
			foreach($query as $row): ?>
			<tr> 
					
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->username; ?></td>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->lastname; ?></td>
					<td><?php echo $row->category; ?></td>
					<td><?php echo $row->telefono; ?></td>
					<td><?php echo $row->email; ?></td>
					<form name="modi" action='<?php echo base_url()?>modificar_empleado' method='post'>
					<input type='hidden' value='<?php echo $row->id; ?>' name='idid' />
					<td><button class="btn btn-success" type="submit">Modificar</button></td>
					</form>
					
					<form name="borri" action='<?php echo base_url()?>borrar_usuario' method='post'>
					<input type='hidden' value='<?php echo $row->id; ?>' name='idid' />
					<td><button class="btn btn-danger"  type="submit" >Eliminar</button></td>
					</form>
				 </tr> 
			
			<?php endforeach;}else{echo"no coje tabla";} ?>
		</table>
	</div>
</div>