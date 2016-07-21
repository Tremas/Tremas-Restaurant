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
					<!--<?php echo $error; ?>-->
				</div>
			</div>
		<?php endif; ?>
		
		
		<div class="col-md-12">
			<div class="page-header">
				<h1> Modificar Reserva</h1>
			</div>	
		
			<?= form_open() ?>
					<input type='hidden' value='<?php echo $query[0]->id_reserva; ?>' name='ida' />
					<div class="form-group col-md-6">
						<label for="nombre">Nombre *</label>
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre para la reserva" value="<?php echo $query[0]->nombre;?>">
						<p class="help-block">Al menos 4 caracteres, letras</p>
					</div>
					<div class="form-group col-md-6">
						<label for="telefono">Telefono *</label>
						<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Introduce tu numero telefono" value="<?php echo $query[0]->telefono;?>">
						<p class="help-block">Escribe tu numero de telefono</p>
					</div>
					<div class="form-group col-md-6">
						<label for="personas_max">Nº Personas</label>
						<input type="number" min="1" class="form-control" id="personas_max" name="personas_max" placeholder="Nº personas" value="<?php echo $query[0]->personas_max;?>">
						<p class="help-block">Indica cuantas personas asistiran</p>
					</div> 
					<div class="form-group col-md-6">
						<label for="fecha">Fecha</label>
						<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo $query[0]->fecha;?>">
						<p class="help-block">la fecha de la reserva</p>
						
					</div>
					<div class="form-group col-md-6">
						<label for="hora">hora</label>
						<input type="time" class="form-control" id="hora" name="hora"  value="<?php echo $query[0]->hora;?>" placeholder="hora">
						<p class="help-block">la hora de la reserva</p>
					</div>
				
					<div class='form-group col-md-12'>
						<input type='submit' class='btn btn-default' value='Actualizar Reservar'>
					</div>
					
			</form>
		
		
		</div>
	</div>