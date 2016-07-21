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
				<h1>Añadir Platos/Bebidas</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre del plato">
					<p class="help-block">Al menos 3 caracteres</p>
				</div>
			
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="number" class="form-control" id="precio" name="precio" placeholder="Escribe el Precio del articulo">
					<p class="help-block">Escribe el Precio del articulo</p>
				</div>
				<div class="form-group">
					<label for="tipoo">Tipo de plato</label>
					<select name="tipo">
						<option value="primer plato" selected>Primer plato</option>
						<option value="segundo plato">Segundo Plato</option>
						<option value="postre">Postre</option>
						<option value="bebida">Bebida</option>
						<option value="complementos">Complementos</option>
					</select>
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->