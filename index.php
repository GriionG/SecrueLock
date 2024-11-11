<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio</title>
    <meta
        name="description"
        content="Secure Lock es un sitio web pensado para el control de botiquines de la UTNC, con un sistema de inventario y control de la salida del material medico.">
    <link rel="icon" href="img/logo-cruz.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    
   	 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="css/si.css">
    
    <link
  href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap"
  rel="stylesheet"
/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	<script>
		
		function eliminar(id){
			if (confirm("¿Estas seguro de eliminar el registro?")) {

				window.location = "index.php?ideliminar=" + id;

			}
		}

		function modificar(id){
			window.location = "index.php?idmodificar=" + id;
		}

		function cerrar_sesion()
		{
			if (confirm("¿Estas seguro de cerrar la sesion")) {
				window.location = "cerrar_sesion.php"
			}
		}
	</script>
</head>

<body>

<?php 

	require 'bd/conexion_bd.php';

	$obj = new BD_PDO();

	@$buscar = $_POST['txtbuscar'];
	$datos_buscar= $obj->Ejecutar_Instruccion("select * from medicamento WHERE medicamento LIKE '%$buscar%'");

	?>
         <!--::header part start::-->
     <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logosc.webp" width="300px" heigth="300px" alt="logo" > </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button><div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav align-items-center">
                                <li class="nav-item ">
                                   <a class="nav-link active" href="index.php">Inicio</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="/securelockbt/#tablaSecure">Medicamentos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="/securelockbt/#conocenoSecure">Conocenos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contacto</a>
                                </li>
                     <?php
 if (@$_SESSION['privilegio']=='Admin') 

{
?>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Admin</a>
                                   <ul class="list-group">
  <li class="list-group-item active">Modulos de Admin</li>
  <li class="list-group-item"><a class="nav-link2" href="Botiquines.php">Botiquines</a></li>
  <li class="list-group-item"><a class="" href="Inventario.php">Inventario</a></li>
  <li class="list-group-item"><a class="" href="Movimientos.php">Movimentos</a></li>
  <li class="list-group-item"><a class="" href="Usuarios.php">Usuarios</a></li>
</ul>
                                </li>
                                
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
 if (@$_SESSION['privilegio']=='Usuario' | @$_SESSION['privilegio']=='Admin') 

{
?>
                        <a onclick="javascript: cerrar_sesion();" class="btn_2" href="cerrar_sesion.php"><i class="ti-unlock"> cerrar sesion</i></a>
                        <?php }
    
    else
	{
    ?>
                        <a class="btn_2" href="login.php"><i class="ti-user"> Iniciar sesion</i></a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
    
       <!-- about us part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="about_us_img">
                        <img src="img/l_candado.webp" alt="conceptop_botiquin">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text"class=""style="Justify">
                        <h2>Secure Lock</h2>
                        <p>Nuestro proyecto busca facilitar y optimizar el control de medicamentos y material medico que se encuentran dentro de los botiquines de emergencia de cada edificio de la institucion, esto con el objetivo de llevar un
                                mejor manejo, principalmente de la salidas del material medico del botiquin y conocer que personal autorizado fue el que
                                accedio al  botiquin, proporcionando una mayor rapidez en caso de que se presente alguna emergencia, ademas de que maneja un control de inventario de cada botiquin y sus localizaciones actuales más su estado de actividad.  </p>
                        
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- about us part end-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2 id="tablaSecure">Medicamentos</h2>
                    </div>
                </div>
            </div>
				<!-- row -->
				<div class="row datos-cent">

					<div class="col-md-12">
						<!-- Billing Details -->  
<div class="table-responsive-lg">
	<table class="table table-hover table-bordered" id="myTable">
    <thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Cantidad</td>
			<td>Fecha de Expiracion</td>
		</tr>
    </thead>
    <tbody>
		<?php foreach ($datos_buscar as $renglon) { ?>
		<tr>
			<td> <?php echo $renglon[0]; ?> </td>
			<td> <?php echo $renglon[1]; ?> </td>
			<td> <?php echo $renglon[3]; ?> </td>
			<td> <?php echo $renglon[2]; ?> </td>
		</tr>
		<?php } ?>
    </tbody>
	</table>
        </div>
	</div>
</div>
			</div>
			<!-- /container -->

    </section>
    <!-- feature_part start-->
    <section class="feature_part single_feature_page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2 id="conocenoSecure">Conócenos</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="img/logo-cruz.webp" alt="logo-cruz"></span>
                            <h4>SecureLock</h4>
                            <p>Solucionaremos el problema de robo de medicamentos ya que solo peronas previamente autorizadas podran tener acceso al contenido de los botiquines.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                        <div class="single_feature_img">
                            <img  src="img/service.webp" alt="dibujo de doctor">
                        </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="img/logo-cruz.webp" alt="logo cruz" ></span>
                            <h4>SecureLock</h4>
                            
                            <p>Cada que se extraiga un medicamento se registrará en una base de datos, a la persona que lo
extrajo,lo que facilitaria llevar el control de todo.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div>
                            <span ></span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<br> <br>
    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7">
                    <div class="regervation_part_iner">
                        <form>
                            
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="reservation_img">
                        <img src="" alt="" class="reservation_img_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->


    <!-- footer part start-->
    <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                        <a href="#" class="footer_logo"> <img src="img/logosc.png" alt="Logo Secure Lock"> </a>
                        <p>Somos estudiantes de la UTNC de la carrera de tecnoligias de la informacion area y desarrollo software multiplataforma</p>
                        <div class="social_logo">
                        <a href="https://www.facebook.com/brandon.cardozarodriguez"><i class="ti-facebook"></i></a>
                        <a href="https://twitter.com/RodrigoBarrme"> <i class="ti-twitter"></i> </a>
                        <a href="https://www.instagram.com/_alex_salas/"><i class="ti-instagram"></i></a>
                        <a href="https://www.youtube.com/@GrionG/featured"><i class="ti-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                        <h4>Información</h4>
                        <ul>
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#"> Contáctanos</a></li>
                            <li><a href="#">Términos y Condiciones</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                        <h4>Servicios</h4>
                        <ul>
                            <li><a href="#">Mi Cuenta</a></li>
                            <li><a href="#">Ayuda</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-6 single-footer-widget">
                        <h4>Integrantes del proyecto</h4>
                        <ul>
                            <li><a href="https://github.com/Rodbame">Luis Rodrigo Barrón Mejía</a></li>
                            <li><a href="https://github.com/ElBrandy69">Brandon Axel Cardoza Rodriguez</a></li>
                            <li><a href="https://github.com/GriionG">Cristopher Alexis Martinez Suarez</a></li>
                            <li><a href="https://github.com/Alexiasc7">Alexia Salas Carrazco</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
                        <h4>Recomendaciones</h4>
                        <p>Si es que has encontrado un error en la página has nos lo saber</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank" action=" contact.php" method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Correo"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-b text-uppercase"> <i class="ti-angle-right"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <i class="ti-heart"></i> by <a href="#" target="_blank">Tilines</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="https://www.facebook.com/brandon.cardozarodriguez"><i class="ti-facebook"></i></a>
                        <a href="https://twitter.com/RodrigoBarrme"> <i class="ti-twitter"></i> </a>
                        <a href="https://www.instagram.com/_alex_salas/"><i class="ti-instagram"></i></a>
                        <a href="https://www.youtube.com/@GrionG/featured"><i class="ti-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer part end-->

    <!-- jquery plugins here

    <script src="js/jquery-1.12.1.min.js"></script>
    popper js 
    <script src="js/popper.min.js"></script>
     bootstrap js
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- contact js
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js 
    <script src="js/custom.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-MX.json'
            }
        });
    });
</script>

</body>


</html>