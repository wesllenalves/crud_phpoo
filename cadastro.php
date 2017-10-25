<?php
//BUSCANDO AS CLASSES
require_once 'classes/Funcionario.class.php';
require_once  'classes/PHPMailer/PHPMailerAutoload.php';
//ESTANCIANDO A CLASSES
$objFunc = new Funcionario();
//FAZENDO O CADASTRO
if(isset($_POST['btCadastrar'])){
	$objFunc->queryInsert($_POST);
        
         //Enviar email
                            
                            

       
}
//Verifica se conseguiu cadastrar se true redireciona para o login
if (isset($_GET['cadastro']) != 'ok'){
          
       }else{
           header('location: http://localhost/crud_phpoo/');
       }

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en-US">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Synthetica HTML5/CSS3 Template</title>
	<meta name="description" content="A free html template with Sketch design made with Bootstrap">
	<meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
	<meta name="author" content="Codrops" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon generated by http://realfavicongenerator.net/ -->
	<link rel="apple-touch-icon" sizes="57x57" href="assets/home/img/favicon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/home/img/favicon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/home/img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/home/img/favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/home/img/favicon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/home/img/favicon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/home/img/favicon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/home/img/favicon/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/home/img/favicon/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="assets/home/img/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="assets/home/img/favicon/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="assets/home/img/favicon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="assets/home/img/favicon/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="assets/home/img/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="assets/home/img/favicon/manifest.json">
	<link rel="mask-icon" href="assets/home/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="assets/home/img/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#66e0e5">
	<meta name="msapplication-TileImage" content="assets/home/img/favicon/mstile-144x144.png">
	<meta name="msapplication-config" content="assets/home/img/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- end favicon links -->
	<link rel="stylesheet" href="assets/home/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/home/css/normalize.min.css">
	<link rel="stylesheet" href="assets/home/css/animate.min.css">
	<link rel="stylesheet" href="assets/home/css/flickity.min.css">
	<link rel="stylesheet" href="assets/home/css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container-fluid">
		<div class="row">
			<div class="header-nav-wrapper">
				<div class="logo">
					<a href="/index.html"><img src="assets/home/img/synthetica-logo.png" alt="Synthetica Freebie"></a>
				</div>
				<div class="primary-nav-wrapper">
					<nav>
						<ul class="primary-nav">
							<li><a href="#intro">The collective</a></li>
							<li><a href="#team">The crew</a></li>
							<li><a href="cadastro.php">Cadastro</a></li>
							<li><a href="login.php">Login</a></li>
						</ul>
					</nav>
					<div class="secondary-nav-wrapper">
						<ul class="secondary-nav">
							<li class="subscribe"><a href="#get-started">Subscribe</a></li>
							<li class="search"><a href="#search" class="show-search"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
					<div class="search-wrapper">
						<ul class="search">
							<li>
								<input type="text" id="search-input" placeholder="Start typing then hit enter to search">
							</li>
							<li>
								<a href="#" class="hide-search"><i class="fa fa-close"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="navicon">
					<a class="nav-toggle" href="#"><span></span></a>
				</div>
			</div>
		</div>
	</div>  
        
        <!-- SECTION: Intro -->
	<section class="collective has-padding" id="intro">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4>Cadastro</h4>
                                        
				</div>
				<div class="col-md-6">
                                    
                                    <form method="POST">
                                        <div class="col-md-10">
                                    <label>Nome</label><br>
                                    <input type="text" name="nome" class="form-control" required size="12"><br></div>
                                    <div class="col-md-10">
                                    <label>E-mail</label><br>
                                    <input type="email" name="email" class="form-control" required><br></div>
                                   <div class="col-md-5">
                                        <label>Data de Nascimento</label><br>
                                        <input type="date" name="data_nascimento" class="form-control" required><br>
                                   </div>
                                    <div class="col-md-5">
                                    <label>Telefone</label><br>
                                        <input type="number" name="telefone" class="form-control" required><br>
                                    </div>
                                        <div class="col-md-10">
                                    <label>Senha</label><br>
                                    <input type="password" name="senha" class="form-control" required><br></div>
                                    <div class="col-md-10">
                                        <button type="submit" name="btCadastrar" value="Enviar">Cadastrar</button></div>
                                    </form>
				</div>
			</div>
		</div>
	</section>
        
           
        
   <!-- SECTION: Footer -->
	<footer class="has-padding footer-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4 footer-branding">
					<img class="footer-branding-logo" src="assets/home/img/synthetica-logo.png" alt="Synthetica freebie html5 css3 template logo">
					<p>A free website template created exclusively for <a href="http://tympanus.net/codrops/"><em>Codrops</em></a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 footer-nav">
					<ul class="footer-primary-nav">
						<li><a href="#intro">The Collective</a></li>
						<li><a href="#team">The Crew</a></li>
						<li><a href="#articles">Articles</a></li>
						<li><a href="#freebies">Freebies</a></li>
						<li><a href="#">Subscribe</a></li>
					</ul>
					<ul class="footer-share">
						<li><a href="http://tympanus.net/codrops/licensing/">Licence</a></li>
						<li><a href="#" class="share-trigger"><i class="fa fa-share"></i>Share</a></li>
					</ul>
					<div class="share-dropdown">
						<ul>
							<li><a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<ul class="footer-secondary-nav">
						<li><p>A free website template created exclusively for <a href="http://tympanus.net/codrops/"><em>Codrops</em></a></p></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- END SECTION: Footer -->
	<!-- JS CDNs -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	<script src="http://vjs.zencdn.net/5.4.6/video.min.js"></script>
	<!-- jQuery local fallback -->
	<script>
	window.jQuery || document.write('<script src="assets/home/js/min/jquery-1.11.2.min.js"><\/script>')
	</script>
	<!-- JS Locals -->
	<script src="assets/home/js/min/bootstrap.min.js"></script>
	<script src="assets/home/js/min/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script src="assets/home/js/min/retina.min.js"></script>
	<script src="assets/home/js/min/jquery.waypoints.min.js"></script>
	<script src="assets/home/js/min/flickity.pkgd.min.js"></script>
	<script src="assets/home/js/min/scripts-min.js"></script>
	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID and uncomment -->
	<!--
	<script>
	(function(b, o, i, l, e, r) {
		b.GoogleAnalyticsObject = l;
		b[l] || (b[l] =
			function() {
				(b[l].q = b[l].q || []).push(arguments)
			});
		b[l].l = +new Date;
		e = o.createElement(i);
		r = o.getElementsByTagName(i)[0];
		e.src = '//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e, r)
	}(window, document, 'script', 'ga'));
	ga('create', 'UA-XXXXX-X', 'auto');
	ga('send', 'pageview');
	</script>
	-->
</body>

</html>
