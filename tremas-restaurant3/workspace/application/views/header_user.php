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
		<!--<link href="<?php echo base_url('style/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('style/css/demo-page.css'); ?>" rel="stylesheet" media="all">
		<link href="<?php echo base_url('style/css/mystyle.css'); ?>" rel="stylesheet" media="all">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="<?php echo base_url('style/bootstrap/js/bootstrap.min.js'); ?>"></script>-->
	
	
 
  	
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
<!--<body class="restaurant">-->
<body style="background-color:#ffffb3">
	<div class="navbar-wrapper ">
		<div class="container">
			<nav class="navbar navbar-default navbar-static-top">
			
			 	<div class="container">
					<div class="navbar-header">
						<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">-->
						<!--	<span class="sr-only">Toggle navigation</span>-->
						<!--	<span class="icon-bar"></span>-->
						<!--	<span class="icon-bar"></span>-->
						<!--	<span class="icon-bar"></span>-->
					 <!-- 	</button>-->
					  	<a class="navbar-brand" href="<?php echo base_url() ?>"><img src="img/logo.png" width="75px" height="75px"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse hidden-print ">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
						<li><a href="<?php echo base_url('mostrar_reserva_user') ?>">Reservar</a></li>
						<li><a href="<?= base_url('perfil') ?>">Perfil</a></li>
						<li><a href="<?= base_url('change_password') ?>">Cambiar Contraseña</a></li>
						<li><a href="<?= base_url('logout') ?>">Logout</a></li>
					
					  </ul>
					</div>
					
					
			  	</div>
			</nav>
	   	</div>
	</div>

	