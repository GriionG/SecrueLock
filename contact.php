<?php 

session_start();

@$_SESSION['privilegio'];

?>

<?php

   if(isset($_POST['enviar'])){
      $to = "securelockbt@gmail.com";
      $subject="Contacto de dudas y aclaraciones de SecureLock";
      $message ="Correo: ".$_POST['txtcorreo']."\nRemitente: ".$_POST['txtnombre']."\nTeléfono: ".$_POST['txttelefono']."\nMensaje: ".$_POST['txtmensaje'] ;

      $t=mail($to,$subject,$message);

      if($t){
         echo'<script type="text/javascript">alert("El correo se envio correctamente")</script>';
      } else{
         echo '<script type="text/javascript">alert("No se puede enviar el correo ,intente mas tarde ")</script>';
      }
   }
   ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contacto</title>
    <link rel="icon" href="img/logo-cruz.webp">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
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
  
  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
  <!--::header part start::-->
    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logosc.webp" alt="logo" width="150px" heigth="200px"> </a>
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
  <li class="list-group-item"><a class="" href="Botiquines.php">Botiquines</a></li>
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
                        <a onclick="javascript: cerrar_sesion();" class="btn_2" href="#"><i class="ti-unlock"> cerrar sesion</i></a>
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

  <!-- breadcrumb start-->
  <section class="breadcrumb_part breadcrumb_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Ponerse en Contacto</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact.php" method="post" id="request" 
            novalidate="novalidate">
            <div class="row">
            
              <div class="col-12">
              <p>Mensaje </p>
                <div class="form-group">

                  <textarea class="form-control w-100" name="txtmensaje" id="txtmensaje" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensaje'"
                    placeholder='Mensaje'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
              <p>Nombre </p>
                <div class="form-group">
                  <input class="form-control" name="txtnombre" id="txtnombre" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Nombre'" placeholder='Nombre'>
                </div>
              </div>
              <div class="col-sm-6">
              <p>Correo </p>
                <div class="form-group">
                  <input class="form-control" name="txtcorreo" id="txtcorreo" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Correo'" placeholder='Correo'>
                </div>
              </div>
              <div class="col-12">
              <p>Telefono </p>
                <div class="form-group">
                  <input class="form-control" name="txttelefono" id="txttelefono" type="tel" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Telefono'" placeholder='Telefono'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
            <button name="enviar" id="enviar" class="btn_3 button-contactForm" >Enviar</button>
            </div>
          </form>
        </div> 
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Piedras Negras, Coahuila.</h3>
              <p>Villas del Carmen, CA 26080</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
            <a href="tel:+528781370387"> <h3>878 109 7902</h3> </a>
              <p>Lunes a Viernes 09 AM a 6 PM</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>¡Envíanos tu consulta cuando quieras!</h3>
              <p>SecureLock@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

   <!-- footer part start-->
   <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                        <a href="#" class="footer_logo"> <img src="img/logosc.png" alt="index.php"> </a>
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
                            <li><a href="#">Luis Rodrigo Barrón Mejía</a></li>
                            <li><a href="#">Brandon Axel Cardoza Rodriguez</a></li>
                            <li><a href="#">Cristopher Alexis Martinez Suarez</a></li>
                            <li><a href="#">Alexia Salas Carrazco</a></li>
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
 <i class="ti-heart"></i> by <a href="" target="_blank">Tilines</a>
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

  <!-- jquery plugins here-->

  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- owl carousel js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- contact js -->
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/contact.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>

</html>