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
		<div class="col-md-12">
			<div class="page-header">
				<h1>Reserva</h1>
			</div>
						
		<?= form_open() ?>
				<div class="form-group col-md-6">
					<label for="nombre">Nombre *</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre para la reserva">
					<p class="help-block">Al menos 4 caracteres, letras</p>
				</div>
				<div class="form-group col-md-6">
					<label for="telefono">Telefono *</label>
					<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Introduce tu numero telefono">
					<p class="help-block">Escribe tu numero de telefono</p>
				</div>
				<div class="form-group col-md-6">
					<label for="personas_max">Nº Personas</label>
					<input type="number" min="1" class="form-control" id="personas_max" name="personas_max" placeholder="Nº personas">
					<p class="help-block">Indica cuantas personas asistiran</p>
				</div>
				<div class="form-group col-md-6">
					<label for="fecha">Fecha</label>
					<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
					<p class="help-block">la fecha de la reserva</p>
					
				</div>
				<div class="form-group col-md-6">
					<label for="hora">hora</label>
					<input type="time" class="form-control" id="hora" name="hora" value="<?php echo date("H:i",time()+(2*60*60)); ?>" placeholder="hora">
					<p class="help-block">la hora de la reserva</p>
				</div>
			
				<div class="form-group col-md-12">
					Empleado:<input type="radio" name="radio_usuario" id="empleado"  onchange='cargarcuentas(<?php echo $_SESSION['user_id'] ?>)'>
					Cliente: <input type="radio" name="radio_usuario" id="cliente" onchange='cargaruser()'>
				</div>
				<div class="form-group col-md-12" id="usu">
				
				</div>
				
		</form>
		</div>
	</div>
	<?php 	
			echo "<script>function cargaruser(){
										document.getElementById('usu').innerHTML = '';
										document.getElementById('usu').innerHTML += '".$query."'
																+'<div class=\'form-group\'>'
																+'<input type=\'hidden\' name=\'is_not_client\' value=\'0\'></input>'
																	+'<input type=\'submit\' class=\'btn btn-default\' value=\'Reservar\'>'
																+'</div>'
									}</script>"; ?>
	<script>
		function cargarcuentas(id){
			document.getElementById('usu').innerHTML = '';
			document.getElementById('usu').innerHTML += '<input type="hidden" name="id_usuario" value="'+id+'"></input>';
			document.getElementById('usu').innerHTML += '<input type="checkbox" name="is_not_client" value="false">No client </input>'
														+'<div class="form-group">'
															+'<input type="submit" class="btn btn-default" value="Reservar">'
														+'</div>';
		}
		document.getElementById('fecha').valueAsDate = new Date();
		
		
		
	</script><!-- .row -->
</div><!-- .container -->