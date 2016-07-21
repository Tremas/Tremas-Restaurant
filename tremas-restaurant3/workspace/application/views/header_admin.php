<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<!--<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MK Restaurant</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<!-- css -->
	<head>
		<title>Tremas Restaurant</title>
		<meta charset="utf-8">
		<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
		<link href="Style/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		
		<link href="Style/css/demo-page.css" rel="stylesheet" media="all">
		<link href="Style/css/mystyle.css" rel="stylesheet" media="all">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="Style/bootstrap/js/bootstrap.min.js"></script>
	
	</head>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="restaurant" style="background-color:#ffffb3">
	<div class="navbar-wrapper ">
		  <div class="container">
			<nav class="navbar navbar-default navbar-static-top">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>img/logo.png" width="75px" height="75px"></a>
				</div>
			
				<div id="navbar" class="navbar-collapse collapse ">
				  <ul class="nav navbar-nav">
					<li><a href="<?= base_url() ?>">Home</a></li>
					<li>
						<form  accept-charset="utf-8" method="post" action="<?= base_url('mostrar_usuarios') ?>">
							<select  id="selectCategory" onchange="this.form.submit()" name="selectCategory">
								<option >Gestionar cuentas</option>
								<option value="admin">Administradores</option>
								<option value="empleado">Empleados</option>
								<option value="user">Clientes</option>
								<option value="todos">Todos</option>
							</select>
						</form>
					</li>
					<li>
						<form  accept-charset="utf-8" method="post" action="<?= base_url('mostrar_platos') ?>">
							<select  id="selectCategory" onchange="this.form.submit()" name="tipo">
								<option >Gestionar Articulos</option>
								<option value="primer plato">Platos (primeros)</option>
								<option value="segundo plato">Platos (segundos)</option>
								<option value="postre">Postres</option>
								<option value="Bebida">Bebidas</option>
								<option value="complementos">Complementos</option>
								<option value="todos">Todos</option>
							</select>
						</form>
					</li>
					<li><a href="<?= base_url('mostrar_factura_admin') ?>">Facturas</a></li>
					<li><a href="<?= base_url('perfil') ?>">Perfil</a></li>
					<li><a href="<?= base_url('change_password') ?>">Cambiar Contraseña</a></li>
					<li><a href="<?= base_url('logout') ?>">Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		  </div>
		</div>
		
