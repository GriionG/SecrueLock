<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Usuarios</title>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/si.css">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        function eliminar(id) {
            if (confirm("¿Estas seguro de eliminar el registro?")) {

                window.location = "Usuarios.php?id_eliminar=" + id;

            }
        }

        function modificar(id) {
            window.location = "Usuarios.php?idmodificar=" + id;
        }

        function cerrar_sesion() {
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
    if (isset($_POST['btninsertar'])) {
        $id_usuario = filter_var($_POST['txtid_usuario'],FILTER_SANITIZE_STRING);
        @$nombre = filter_var($_POST['txtnombre'],FILTER_SANITIZE_STRING);
        @$apellidos = filter_var($_POST['txtapellidos'],FILTER_SANITIZE_STRING);
        @$correo = filter_var($_POST['txtcorreo'],FILTER_SANITIZE_EMAIL);
        @$contrasena = filter_var($_POST['txtcontrasena'],FILTER_SANITIZE_STRING);
        @$hashed_password = password_hash($contrasena,PASSWORD_DEFAULT);
        @$privilegio = filter_var($_POST['selprivilegio'],FILTER_SANITIZE_STRING);
        @$huella = filter_var($_POST['selhuella'],FILTER_SANITIZE_STRING);

        @$result = $obj->Ejecutar_Instruccion("INSERT INTO `usuarios` (`nombre`, `apellidos`, `correo`, `contrasena`, `privilegio`, `numero_huella`) VALUES ('$nombre', '$apellidos', '$correo', '$hashed_password','$privilegio', '$huella');");
        echo '<script>window.location = "Usuarios.php"; </script>';
    } else if (isset($_GET['id_eliminar'])) {
        $id = $_GET['id_eliminar'];
        $obj->Ejecutar_Instruccion("delete from usuarios where id_usuario = '$id'");
        echo '<script>window.location = "Usuarios.php"; </script>';
    }
    
        $result = $obj->Ejecutar_Instruccion("select * from usuarios");
        $lsthuella = $obj->Ejecutar_Instruccion("select * from huellas");
        
    ?>
    <!--::header part start::-->
    <header class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logosc.png" alt="logo" width="150px" heigth="200px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Inicio</a>
                                </li>
                                <?php
                                if (@$_SESSION['privilegio'] == 'Admin') {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Botiquines.php">Botiquin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Inventario.php">Inventario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Movimientos.php">Movimientos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="Usuarios.php">Usuarios</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
                        if (@$_SESSION['privilegio'] == 'Usuario' | @$_SESSION['privilegio'] == 'Admin') {
                        ?>
                            <a onclick="javascript: cerrar_sesion();" class="btn_2 d-none d-lg-block" href="#"><i class="ti-unlock"> cerrar sesion</i></a>
                        <?php } else {
                        ?>
                            <a class="btn_2 d-none d-lg-block" href="login.php"><i class="ti-user"> Iniciar sesion</i></a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->


    <!-- Start Align Area -->
    <div class="whole-wrap">
        <div class="container box_1170">

            <div class="section-top-border">
                <div class="row datos-cent">
                    <div class="col-lg-7 col-md-7">
                        <div class="section_tittle text-center">
                            <h2>Usuarios</h2>
                        </div>
                        <form action="Usuarios.php" id="frminsertar" name="frminsertar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="txtid_usuario" id="txtid_usuario" placeholder="ID" class="single-input">
                            <div class="form-group">
                                <p>Nombre</p>
                                <input type="text" name="txtnombre" id="txtnombre" class="input" placeholder="Nombre(s)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'" required>
                            </div>
                            <div class="form-group">
                                <p>Apellidos</p>
                                <input type="text" name="txtapellidos" id="txtapellidos" class="input" placeholder="Apellido(s)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellidos'" required>
                            </div>
                            <div class="form-group">
                                <p>Correo</p>
                                <input type="email" name="txtcorreo" id="txtcorreo" class="input" placeholder="Correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellidos'" required>
                            </div>
                            <div class="form-group">
                                <p>Contraseña </p>
                                <input type="password" name="txtcontrasena" id="txtcontrasena" class="input" placeholder="Contraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contrasena'" required>
                            </div>
                            <div class="">
                	            <i name="cajita" onclick="mostrar()" class="ti-check-box"> Mostrar contraseña</i>
                            </div>
                            <div class="form-group" name="privilegioinput">
                                <label>Privilegio</label>
                                <select id="selprivilegio" name="selprivilegio" class="form-select" aria-label="Select privilegio" required>
                                    <option value="" disabled selected>Seleccionar privilegio</option>
                                    <option value="Admin">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <div class="form-group" name="huellainput">
                                <label>Huella</label>
                                <select id="selhuella" name="selhuella" class="form-select" aria-label="Select huella">
                                    <option value="" disabled selected>Seleccionar Huella</option>
                                    <?php foreach ($lsthuella as $renglon) { ?>
                                        <option value="<?php echo ($renglon[0]) ?>"><?php echo $renglon[0]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <div class="datos-cent">
                                <button name="btninsertar" id="btninsertar" class="btn btn_3" >Insertar</button>
                            </div>
                        </form>


                    </div>
                </div>


                <!-- feature_part start-->
                <section class="feature_part">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="section_tittle text-center">
                                    <h2>Usuarios</h2>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <!-- container -->
                            <div class="container">
                                <!-- row -->
                                <div class="row datos-cent">

                                    <div class="col-md-12 table-responsive-lg">
                                        <!-- Billing Details -->

                                        <table class="table table-hover table-bordered" id="myTable">
                                            <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Nombre</td>
                                                    <td>Apellidos</td>
                                                    <td>Correo</td>
                                                    <td>Privilegio</td>
                                                    <td>Huella</td>
                                                    <?php if                    (@$_SESSION['privilegio'] == 'Admin') { ?>
                                                    <td>Accion </td>
                                        <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (@$result as $renglon) { ?>
                                                    <tr>
                                                        <td> <?php echo $renglon[0]; ?> </td>
                                                        <td> <?php echo $renglon[1]; ?> </td>
                                                        <td> <?php echo $renglon[2]; ?> </td>
                                                        <td> <?php echo $renglon[3]; ?> </td>
                                                        <td> <?php echo $renglon[6]; ?> </td>
                                                        <td> <?php echo $renglon[7]; ?> </td>
                                                        <?php if (@$_SESSION['privilegio'] == 'Admin') { ?>
                                                            <td style="text-align: center;"><a type="button" class="btn btn_3 px-3" id="btneliminar" name="btneliminar" onclick="javascript:eliminar('<?php echo $renglon[0]; ?>');"><i style="color: white" class="ti-trash"></i></a>
                                                                <a type="button" class=" btn btn_3 px-3 editbtn" data-toggle="modal" value="Modificar" data-target="#editar"> <i style="color: white" class="ti-pencil-alt"></i> </a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            <tbody>
                                        </table>
                                    </div>
                                    <!-- /Billing Details -->
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /container -->
                        </div>
                        <!-- /SECTION -->
                    </div>
                </section>

            </div>
        </div>
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
                                    <input class="form-control" name="EMAIL" placeholder="Correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
                                    <button class="click-btn btn btn-b text-uppercase"> <i class="ti-angle-right"></i>
                                    </button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
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
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> Todos los derechos reservados <i class="ti-heart" aria-hidden="true"></i> by <a href="" target="_blank">Tilines</a>
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


        <!-- Modal Editar -->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuarios</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--formulario-->
                        <form action="editar_usuarios.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="txtid_usuario" id="id_usuario" placeholder="ID" class="single-input">
                            <div class="form-group">
                                <p>Nombre</p>
                                <input type="text" name="txtnombre" id="nombre" class="input" placeholder="Nombre(s)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'" required>
                            </div>
                            <div class="form-group">
                                <p>Apellidos</p>
                                <input type="text" name="txtapellidos" id="apellidos" class="input" placeholder="Apellido(s)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellidos'" required>
                            </div>
                            <div class="form-group">
                                <p>Correo</p>
                                <input type="text" name="txtcorreo" id="correo" class="input" placeholder="Correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellidos'" required>
                            </div>
                            <div class="form-group" name="privilegioinput">
                                <p>Privilegio</p>
                                <select id="privilegio" name="selprivilegio" class="form-select" required>
                                    <option value="Admin">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <div class="form-group" name="huellainput">
                                <p>Huella</p>
                                <select id="huella" name="selhuella" class="form-select">
                                    <?php foreach ($lsthuella as $renglon) { ?>
                                        <option value="<?php echo ($renglon[0]) ?>"><?php echo $renglon[0]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <div class="datos-cent">
                                <button name="btninsertar" id="btninsertar" class="btn btn_3" >Actualizar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.editbtn').on('click', function(){

            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });
            $('#id_usuario').val(datos[0]);
            $('#nombre').val(datos[1]);
            $('#apellidos').val(datos[2]);
            $('#correo').val(datos[3]);
            $('#privilegio').val(datos[4]);
            $('#huella').val(datos[5]);
        });
    </script>
<script>
    function mostrar(){
    var pass = document.getElementById('txtcontrasena');
    if (pass.type==="password") {
        pass.type="text";
    }else{
        pass.type="password";
    }
        return true;
    }
</script>  

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
            });
        });
    </script>
</body>

</html>