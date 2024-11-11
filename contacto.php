<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Contacto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
                
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
	<body class="is-preload" style="background-color: #d1d1d1;
    background-image: linear-gradient(to top, rgba(248, 248, 248, 0.884), rgba(224, 221, 221, 0.877)), url(../../images/bg.jpg);">
<?php 

	require 'bd/conexion_bd.php';

	$obj = new BD_PDO();

	@$buscar = $_POST['txtbuscar'];
	$datos_buscar= $obj->Ejecutar_Instruccion("select * from medicamento WHERE medicamento LIKE '%$buscar%'");
        $medicamentos= $obj->Ejecutar_Instruccion("select * from medicamento");

?>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">Secure Lock</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index2.php">Home</a></li>
								<li><a href="login3.php">Log In</a></li>
								<li><a href="contacto.php">Contacto</a></li>
                                                                 <?php
                                    if (@$_SESSION['privilegio']=='Admin') 

                                {?>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="Botiquin.php">Admin</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
            if (@$_SESSION['privilegio']=='Usuario' | @$_SESSION['privilegio']=='Admin') 

            {
            ?>
                        <a onclick="javascript: cerrar_sesion();" class="btn_2 d-none d-lg-block" href="#"><i class="ti-unlock"> Cerrar sesion</i></a>
                        <?php }
    
    else
	{
    ?>
                        <a class="btn_2 d-none d-lg-block" href="login2.php"><i class="ti-user"> Iniciar sesion</i></a>
                        <?php } ?>
							</ul>
						</div>
					</nav>


				<!-- Footer -->
					<section id="footer" style="background-color: #d1d1d1;background-image: linear-gradient(to top, rgba(248, 248, 248, 0.884), rgba(224, 221, 221, 0.877)), url(../../images/bg.jpg);">
						<div class="inner">
							<h2 class="major">Contactanos</h2>
							<form action="mailto:securelockbt@gmail.com" method="post">
								<div class="fields">
									<div class="field">
										<label for="name" >Nombre</label>
										<input type="text" name="name" id="name" style="border: solid 2px rgb(10,10,10,.35)!important ;" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" style="border: solid 2px rgb(10,10,10,.35)!important ;" />
									</div>
									<div class="field">
										<label for="message">Mensaje</label>
										<textarea name="message" id="message" rows="4" style="border: solid 2px rgb(10,10,10,.35)!important ;"></textarea>
									</div>
								</div>
								<ul class="actions">
									<button type="submit" id="form-submit" class="button" style="border: solid 2px rgb(10,10,10,.35)!important ;">Enviar mensaje</button>
								</ul>
							</form>
							<ul class="contact">
								<h2 class="major">Equipo de trabajo</h2>
								<li class="icon brands fa-github"><a href="https://github.com/Rodbame">Luis Rodrigo Barrón Mejía</a></li>
								<li class="icon brands fa-github"><a href="https://github.com/ElBrandy69">Brandon Axel Cardoza Rodríguez</a></li>
								<li class="icon brands fa-github"><a href="">Cristopher Alexis Martínez Suarez</a></li>
								<li class="icon brands fa-github"><a href="https://github.com/Alexiasc7">Alexia Salas Carrasco</a></li>
							</ul>
						</div>
					</section>
                                        <secion id="footer" style="background: #ff4141background: -webkit-linear-gradient(to right, #db1b1b, #ff4141);background: linear-gradient(to right, #db1b1b, #ff4141);display: flex; justify-content:center;">
                                                <div>
                                        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <i class="ti-heart" aria-hidden="true"></i> by <a href="" target="_blank">Tilines</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                                        
                                        </div>
                                        </Section>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>