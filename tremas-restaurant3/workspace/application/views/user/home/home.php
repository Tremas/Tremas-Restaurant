<?php// defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container" >
	  <br>
	  <div id="myCarousel" class="carousel slide " data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		  <li data-target="#myCarousel" data-slide-to="2"></li>
		  <li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner " role="listbox">
		  <div class="item active">
			<img src="<?php echo base_url();?>/img/slider1.jpg" alt="Chania" width="100%" height="245">
		  </div>

		  <div class="item">
			<img src="<?php echo base_url();?>/img/slider2.jpg" alt="Chania" width="460" height="245">
		  </div>
		
		  <div class="item">
			<img src="<?php echo base_url();?>/img/slider3.jpg" alt="Flower" width="460" height="245">
		  </div>

		  <div class="item">
			<img src="<?php echo base_url();?>/img/slider4.jpg" alt="Flower" width="460" height="245">
		  </div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	</div>
	<br/><br/>
	<div class="container marketing">
      <div class="row">
        <div class="col-lg-4 center2">
          <img class="img-circle" src="<?php echo base_url();?>/img/comida.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Cocina</h2>
          <p>A lo largo de tantos años de relación entre nuestros clientes y proveedores, la cocina ha tratado de avanzar día a día en su afianzamiento como marca y ligarla ésta a los mayores estándares de calidad ...</p>
          <p><a class="btn btn-default" data-toggle="modal" data-target="#modal1" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 center2">
          <img class="img-circle" src="<?php echo base_url();?>/img/cartaa.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Carta</h2>
          <p>En nuestra carta encontrara platos con ingredientes del territorio, naturales y frescos, ya que por nuestra ubicación tenemos un gran abanico de ellos. Encontrará una gran variedad: barbacoas, comidas ligeras, combinando sabores, texturas, y siempre atendiendo las sugerencias de los clientes.</p>
          <p><a class="btn btn-default" data-toggle="modal" data-target="#modal2" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 center2">
          <img class="img-circle" src="<?php echo base_url();?>/img/copa.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Carta de vinos</h2>
          <p>Los vinos en nuestro país nos llevan a la pasión por su consumo. Es importante su temperatura, su cuerpo, su textura, su espuma, si es tinto o blanco. En nuestro restaurante encontrara el mejor asesoramiento sobre su combinación con los platos.</p>
          <p><a class="btn btn-default" data-toggle="modal" data-target="#modal3" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	</div>
	<div class="modal fade" id="modal1" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Cocina</h4>
			</div>
			<div class="modal-body">
			  <p>A lo largo de tantos años de relación entre nuestros clientes y proveedores, MK Restaurant ha tratado de avanzar día a día en su afianzamiento como marca y ligarla ésta a los mayores estándares de calidad.   </p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	</div>
	<div class="modal fade" id="modal2" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Carta</h4>
			</div>
			<div class="modal-body">
			  <p>En nuestra carta encontrara platos con ingredientes del territorio, naturales y frescos, ya que por nuestra ubicación tenemos un gran abanico de ellos. Encontrará una gran variedad: barbacoas, comidas ligeras, combinando sabores, texturas, y siempre atendiendo las sugerencias de los clientes.  </p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	</div>
	<div class="modal fade" id="modal3" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Vinos</h4>
			</div>
			<div class="modal-body">
			  <p>Los vinos en nuestro país nos llevan a la pasión por su consumo. Es importante su temperatura, su cuerpo, su textura, su espuma, si es tinto o blanco. En nuestro restaurante encontrara el mejor asesoramiento sobre su combinación con los platos.   </p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	</div>