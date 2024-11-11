<?php session_start(); 

 if (@$_SESSION['privilegio']=='Admin') 

{
  ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movimientos</title>
    <link rel="icon" href="img/logo-cruz.png">
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
	<script>
		
        function eliminar(id){
         if (confirm("¿Estas seguro de eliminar el registro?")) {

            window.location = "Movimientos.php?id_eliminar=" + id;

         }
      }

      function modificar(id){
         window.location = "Movimientos.php?idmodificar=" + id;
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
        if (isset($_POST['btnbuscar'])){
@$buscar = $_POST['txtbuscar'];
$result = @$obj->Ejecutar_Instruccion("select * from movimientos WHERE localizacion LIKE '%$buscar%' or usuario LIKE '%$buscar%' ");
}
else{
$result = $obj->Ejecutar_Instruccion("SELECT id_movimiento,cantidad,fecha,fk_medicamento,medicamento,movimientos.fk_usuario,nombre,medicamento,fk_localizacion,localizacion FROM movimientos INNER JOIN medicamento ON movimientos.fk_medicamento = medicamento.id_medicamento INNER JOIN usuarios ON movimientos.fk_usuario = usuarios.id_usuario INNER JOIN botiquines ON movimientos.fk_localizacion = botiquines.id_botiquines
");
}
?>
    <!--::header part start::-->
    <header class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logosc.png" alt="logo" width="150px" heigth="200px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button><div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item ">
                                    <a class="nav-link" href="index.php"><i class="ti-home"> Inicio</i></a>
                                </li>
                                <?php
 if (@$_SESSION['privilegio']=='Admin') 

{
?>
                                <li class="nav-item">
                                    <a class="nav-link" href="Botiquines.php">Botiquínes</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="Inventario.php">Inventario</a>
                                </li>
                    
                                <li class="nav-item">
                                    <a class="nav-link active" href="Movimientos.php">Movimientos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="usuarios.php">Usuarios</a>
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


	<!-- Start Align Area -->
	<div class="whole-wrap ">
		<div class="container box_1170">
        
			<div class="section-top-border">
            <div class="col-xl-11">
                    <div class="section_tittle text-center">
                        <h2>Movimientos</h2>
                    </div>
                </div>
            <div class="row">
            <div class="col-lg-12">
                 <div class="table-responsive-lg">
                  <table class="table table-hover table-bordered" id="myTable">
                  <thead>
		          <tr>
			      <td>ID</td>
                  <td>Fecha</td>
			      <td>Usuario</td>
                  <td>Medicamentos</td>
                  <td>Cantidad</td>
                  <td>Localizacion</td>
                        <?php 
                  if (@$_SESSION['privilegio']=='Admin') 
                  {
	              ?>
                  <td>Acciónes </td>
                        
                  <?php } ?>
		          </tr>
                  </thead>
                  <tbody>
		        <?php foreach (@$result as $renglon) { ?>
                
		        <tr>
			<td> <?php echo $renglon[0]; ?> </td>
			<td> <?php echo $renglon[2]; ?> </td>
			<td> <?php echo $renglon[6]; ?> </td>
            <td> <?php echo $renglon[4]; ?> </td>
            <td> <?php echo $renglon[1]; ?> </td>
            <td> <?php echo $renglon[9]; ?> </td>
			
            <?php 
     if (@$_SESSION['privilegio']=='Admin') 
     {
	 ?>
			<td style="text-align: center;"><a type="button" class="btn btn_3 px-3" id="btneliminar" name="btneliminar" onclick="javascript:eliminar('<?php echo $renglon[0];?>');"><i style="color: white" class="ti-trash"></i></a> 
        </td>
	
            <?php } ?>

		</tr>
		<?php } ?>

        </tbody>
	 </table>
     </div>
	</div>
					
    </div>
                
				</div>
			</div>

   

		</div>
	</div>
    <br><br>
	<!-- End Align Area -->

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-MX.json'
            }
        },{
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    });
    
</script>
</body>

<?php } ?>

</html>