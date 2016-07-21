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
		<?php endif;?>
		<div class="col-md-6">
			<div class="page-header">
				<h1>Modificar Platos/Bebidas</h1>
			</div>
			<?= form_open() ?>
			<input type='hidden' value='<?php echo $query[0]->id; ?>' name='ida' />
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre del plato" value="<?php echo $query[0]->nombre;?>">
					<p class="help-block">Al menos 4 caracteres</p>
				</div>
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="number" class="form-control" id="precio" name="precio" placeholder="Escribe el Precio del articulo" value="<?php echo $query[0]->precio;?>">
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
					<input type="submit" class="btn btn-default" value="Update">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->