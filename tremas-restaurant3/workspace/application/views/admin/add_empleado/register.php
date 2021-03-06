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
		<?php endif; ?>
		<div class="col-md-6">
			<div class="page-header">
				<h1>Añadir Empleado</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Usuario</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Introduce tu nombre de usuario">
					<p class="help-block">Al menos 4 caracteres, letras o números solamente</p>
				</div>
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre">
					<p class="help-block">Escribe tu nombre</p>
				</div>
				<div class="form-group">
					<label for="lastname">Apellidos</label>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Introduce tu apellido">
					<p class="help-block">Escribe tu apellido</p>
				</div>
				<!--Tiene que ser siempre usuario de la calle en este caso-->
				<div class="form-group">
					<label for="telefono">Telefono</label>
					<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Introduce tu telefono">
					<p class="help-block">Int</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
					<p class="help-block">Un email valido</p>
				</div>
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<p class="help-block">Al menos 6 caracteres</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirma Contraseña</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<p class="help-block">Debe coincidir con la contraseña</p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->