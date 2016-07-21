<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="page-header">
				<h1>Lista de comanda</h1>
			</div>
		
		<!--<?= form_open() ?>-->
	
			<div class="col-md-4">
				<table class="table">
		    		<th>Id de la reserva</th>
		
					<th>Nombre del plato</th>
					<?php 
					if( !empty($query2) ) {
					foreach($query2 as $row): ?>
					<tr> 
							
							<!--<td><?php echo $row->id_nombre; ?></td>-->
							<td><?php echo $row->id_reserva; ?></td>
							<td><?php echo $row->nombre; ?></td><!-- cambiar por el nombre -->
							<form name="borri" action='<?php echo base_url()?>mostrar_comanda' method='post'>
							<input type='hidden' value='<?php echo $row->id_reserva; ?>' name='delete_post' />
							<input type='hidden' value='<?php echo $row->id_comanda; ?>' name='delete_post_comanda' />
							<input type='hidden' value='<?php //echo $row->id; ?>' name='accion_post' /><!-- cambiar  por el valor ala ora de acer la accion de la funcion -->
							<td><button class="btn btn-danger"  type="submit" >X</button></td>
						    
						 </tr> 
					
					<?php endforeach;}else{echo"no hay datos";} ?>
				</table>	
				
			</div>
			
			
			<div class="form-group col-md-4"> <!--  data-spy="scroll"  data-target=".navbar" data-offset="50" -->
				
				<label for="nombre">Primer plato</label>
				<div id='sel_plat_1'></div>
				<label for="nombree">Segundo plato</label>
				<div id='sel_plat_2'></div>
				<label for="nombreee">Postres</label>
				<div id='sel_plat_3'></div>
				<label for="nombreeee">Bebidas</label>
				<div id='sel_plat_4'></div>
				<label for="nombreeeee">Complementos</label>
				<div id='sel_plat_5'></div>
			
			</div>
			<div class="col-md-4" class="pre-scrollable" style="height:350px;  overflow-y:scroll; ">
					<?php 
					if( !empty($query7) ) {
			
					$num=1;
					$num_max=(int)$query7[0]->personas_max;
					
				for( $i=$num;$i<$num_max+1;$i++): ?>
						<div class="checkbox">
						 	<label><input type="checkbox" value="<?php echo $i; ?>"><?php echo "comensal ".$i; ?></label>
						</div>
					
					<?php endfor;}else{echo"no hay datos";} ?>
				
			</div>
			
				<?php 		
				echo "<script>
						document.getElementById('sel_plat_1').innerHTML = '';
						document.getElementById('sel_plat_1').innerHTML += '<div class=\'form-group\'>'
											+'<form name=\'primer\' action=\'mostrar_comanda\' method=\'post\'>'
											+'".$query."'
											+'<input type=\'hidden\' value=\'insert_primer_plato\' name=\'accion_post\' />'
											+'</br>'
											+'<input type=\'submit\' class=\'btn btn-default\' value=\'Añadir Plato\'>'
											+'</form>'
										+'</div>'
				</script>"; 
				//	+'<input type=\'hidden\' name=\'id_reserva\' value=\'".id."\'></input>\';
				echo "<script>
						document.getElementById('sel_plat_2').innerHTML = '';
						document.getElementById('sel_plat_2').innerHTML += '<div class=\'form-group\'>'
													+'<form name=\'segundo\' action=\'mostrar_comanda\' method=\'post\'>'
														+'".$query3."'
													+'<input type=\'hidden\' value=\'insert_segundo_plato\' name=\'accion_post\' />'
													+'</br>'
													+'<input type=\'submit\' class=\'btn btn-default\' value=\'Añadir Plato\'>'
										+'</form>'
										+'</div>'
				</script>"; 	
				
			echo "<script>
						document.getElementById('sel_plat_3').innerHTML = '';
						document.getElementById('sel_plat_3').innerHTML += '<div class=\'form-group\'>'
													+'<form name=\'postres\' action=\'mostrar_comanda\' method=\'post\'>'
														+'".$query4."'
													+'<input type=\'hidden\' value=\'insert_postres\' name=\'accion_post\' />'
													+'</br>'
													+'<input type=\'submit\' class=\'btn btn-default\' value=\'Añadir Postre\'>'
										+'</form>'
										+'</div>'
				</script>"; 
				echo "<script>
						document.getElementById('sel_plat_4').innerHTML = '';
						document.getElementById('sel_plat_4').innerHTML += '<div class=\'form-group\'>'
													+'<form name=\'bebidas\' action=\'mostrar_comanda\' method=\'post\'>'
														+'".$query5."'
													+'<input type=\'hidden\' value=\'insert_bebida\' name=\'accion_post\' />'
													+'</br>'
													+'<input type=\'submit\' class=\'btn btn-default\' value=\'Añadir Bebida\'>'
										+'</form>'
										+'</div>'
				</script>"; 
				echo "<script>
						document.getElementById('sel_plat_5').innerHTML = '';
						document.getElementById('sel_plat_5').innerHTML += '<div class=\'form-group\'>'
													+'<form name=\'complementos\' action=\'mostrar_comanda\' method=\'post\'>'
														+'".$query6."'
													+'<input type=\'hidden\' value=\'insert_complemento\' name=\'accion_post\' />'
													+'</br>'
													+'<input type=\'submit\' class=\'btn btn-default\' value=\'Añadir Complemento\'>'
										+'</form>'
										+'</div>'
				</script>"; 
				
				?>