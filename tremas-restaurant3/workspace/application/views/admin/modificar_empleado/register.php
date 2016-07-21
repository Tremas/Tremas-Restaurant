<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif;  ?>
		<div class="col-md-6">
			<div class="page-header">
				<h1>Update</h1>
			</div>
			   
			<?= form_open()  ?>
			
			<input type='hidden' value='<?php echo $query[0]->id; ?>' name='ida' />
				<div class="form-group">
					<label for="username">Usuario</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Introduce tu nombre de usuario" value="<?php echo $query[0]->username;?>">
					<p class="help-block">Al menos 4 caracteres, letras o números solamente</p>
				</div>
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre" value="<?php echo $query[0]->name;?>" required>
					<p class="help-block">Escribe tu nombre</p>
				</div>
				<div class="form-group">
					<label for="lastname">Apellidos</label>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Introduce tu apellido"  value="<?php echo $query[0]->lastname;?>" required>
					<p class="help-block">Escribe tu apellido</p>
				</div>
			
				<div class="form-group">
					<label for="categoryy">Categoria</label>
					<select name="category">
						<option value="empleado" selected>empleado</option>
						<option value="admin">admin</option>
						<option value="user">user</option>
					</select>
				</div>
				<div class="form-group">
					<label for="telefono">Telefono</label>
					<input type="string" class="form-control" id="telefono" name="telefono" placeholder="Introduce tu telefono" value="<?php echo $query[0]->telefono;?>">
					<p class="help-block">Numero de telefono</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"   value="<?php echo $query[0]->email;?>">
					<p class="help-block">Un email valido</p>
				</div>
				
					<input type="submit" class="btn btn-default" value="Update">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->