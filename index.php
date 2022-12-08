<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="favicon.ico" />

	<title>Sistem Pakar Gangguan Menstruasi</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/style.css" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">SP Menstruasi</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php
					if (_session('login')) {
						if ($_SESSION['akses'] == '0') { ?>
							<li><a href="?m=penyakit"><span class="glyphicon glyphicon-pushpin"></span> Penyakit</a></li>
							<li><a href="?m=gejala"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
							<li><a href="?m=aturan"><span class="glyphicon glyphicon-star"></span> Aturan</a></li>
							<li><a href="?m=konsultasi"><span class="glyphicon glyphicon-check"></span> Konsultasi</a></li>
							<li><a href="?m=history"><span class="glyphicon glyphicon-time"></span> History</a></li>
							<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
							<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					<?php 
						} elseif ($_SESSION['akses'] == '1') { ?>
						<li><a href="?m=konsultasi"><span class="glyphicon glyphicon-check"></span> Konsultasi</a></li>
						<li><a href="?m=history"><span class="glyphicon glyphicon-time"></span> History</a></li>
						<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
						<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					<?php 
						} 
					} else { ?>
						<li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li><a href="?m=signup"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li>
			    <?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php
		if (file_exists($mod . '.php')) {
			if (_session('login') || $mod == 'login' || $mod == 'konsultasi' || $mod == 'signup' || $mod == 'history') {
				include $mod . '.php';
			} else {
				redirect_js('index.php?m=login');
			}
		} else {
			include 'home.php';
		}
		?>
	</div>
	<footer class="footer bg-pink">
		<div class="container">
			<p>Contact Developer: <em class="pull-right">artaputra95@gmail.com</em></p>
		</div>
	</footer>
	<script type="text/javascript">
		$('.form-control').attr('autocomplete', 'off');
	</script>
	<script>
	if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
	}
	</script>
</body>
</html>