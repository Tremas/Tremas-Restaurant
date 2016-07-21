<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<!--<?php if (validation_errors()) : ?>-->
		<!--	<div class="col-md-12">-->
		<!--		<div class="alert alert-danger" role="alert">-->
		<!--			<?= validation_errors() ?>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--<?php endif; ?>-->
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
					<!--<?php echo $error; ?>-->
				</div>
			</div>
		<?php endif; ?>
		
		    <div class="col-md-4">
        	<div class="page-header">
				<h1>Cambiar Contraseña</h1>
			</div>
			<?= form_open() ?>
			    <div class="form-group">
					<label for="password_antic">Contraseña Actual</label>
					<input type="password" class="form-control" id="password_antic" name="password_antic" placeholder="Enter a password">
					<p class="help-block">Al menos 6 caracteres</p>
				</div>
		    	<div class="form-group">
					<label for="password">Contraseña Nueva</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<p class="help-block">Al menos 6 caracteres</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirma Contraseña</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<p class="help-block">Debe coincidir con la contraseña</p>
				</div>
					<div class="form-group">
					<input type="submit" class="btn btn-default" value="Cambiar">
				</div>
			</form>