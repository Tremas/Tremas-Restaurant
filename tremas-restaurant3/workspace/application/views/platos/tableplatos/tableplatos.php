<?php// defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<a href='<?php echo base_url()?>add_platos'> <button class="btn btn-success">Añadir Platos/Bebidas</button></a>
		</div>
	</div>
	<div class="table-responsive">
		
		<table class="table">
			<th>Id</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Tipo</th>
			<th>Modificar</th>
			<th>Eliminar</th>
			<?php 
			if( !empty($query) ) {
			foreach($query as $row): ?>
			
			<tr> 
					
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->nombre; ?></td>
					<td><?php echo $row->precio; ?>&euro;</td>
					<td><?php echo $row->tipo; ?></td>
					
					<form action='<?php echo base_url()?>modificar_platos' method='post'>
						<input type='hidden' value='<?php echo $row->id; ?>' name='idid' />
						<td><button class="btn btn-success">Modificar</button></td>
					</form>
					
					<form action='<?php echo base_url()?>borrar_platos' method='post'>
						<input type='hidden' value='<?php echo $row->id; ?>' name='idid' />
						<td><button value="<?php echo $row->id; ?>" class="btn btn-danger"  type="submit" >Eliminar</button></td>
					</form>
				 </tr> 
			
			<?php endforeach;}else{echo"no coje tabla";} ?>
		</table>
	</div>
</div>