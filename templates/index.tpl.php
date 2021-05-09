<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>	
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a href="." class="navbar-brand">
				<!-- Logo Image -->
				<svg id="kard" version="1.0" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1280.000000 640.000000" preserveAspectRatio="xMidYMid meet">
					<g transform="translate(0.000000,640.000000) scale(0.100000,-0.100000)" fill="#ed6f6f" stroke="#000000">
						
					<path d="M2352 4638 c-14 -14 -16 -90 -2 -138 5 -20 23 -57 40 -83 l30 -48 0
					-448 0 -449 -67 -6 c-296 -26 -640 -40 -1018 -41 -526 0 -599 9 -722 91 -84
					56 -154 78 -253 78 -77 1 -92 -2 -152 -32 -121 -59 -193 -172 -205 -320 -18
					-240 99 -509 258 -594 37 -19 59 -23 134 -23 96 0 125 10 251 85 89 53 169 63
					509 62 165 0 438 -5 606 -11 284 -10 560 -4 632 14 l23 6 -4 -358 c-3 -337 -4
					-361 -24 -408 -25 -60 -37 -210 -19 -244 12 -21 16 -21 272 -21 l259 0 10 26
					c6 14 10 55 10 92 0 54 -6 80 -30 130 l-30 64 0 296 0 296 51 -78 c28 -42 61
					-82 74 -88 34 -15 137 10 436 108 l255 84 260 10 c321 12 1119 34 2219 60 462
					11 1031 24 1265 30 234 5 630 14 880 20 250 6 649 15 885 20 510 12 1182 26
					1830 40 1152 24 1052 20 1139 47 166 52 563 230 625 280 16 13 22 26 18 36
					-13 33 -451 237 -629 292 l-83 25 -4245 8 -4245 7 -100 37 c-55 20 -167 62
					-250 93 -124 48 -161 58 -215 59 l-65 1 -50 -67 -50 -67 -3 390 -2 390 25 42
					c47 81 53 183 12 209 -21 13 -531 10 -545 -4z"></path>
					</g>
				</svg>
				<!-- Logo Text -->
				<span class="text-uppercase font-weight-bold"><?= $oldalak['/']['szoveg'] ?></span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<?php foreach ($oldalak as $url => $oldal) { ?>
							   <?php if( $url!='/' && $url!="https://budapestsystema.hu/" && !isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
									<li<?= ($oldal == $keres) ? ' class="nav-item active"' : ' class="nav-item"' ?>>
									<a class="nav-link" href="<?= '?oldal=' . $url ?>">
									<?= $oldal['szoveg'] ?></a>
									</li>
								<?php } ?>

								
								<?php if( $url=="https://budapestsystema.hu/" ) { ?>
									<li class="nav-item">
									<a class="nav-link" href="<?= $url ?>">
									<?= $oldal['szoveg'] ?></a>
									</li>
								<?php } ?>
					<?php } ?>
				</ul>
			</div>
		</nav>
		<?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
		<div><?php if(isset($_SESSION['login'])) { ?>Bejlentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?></div>
	</header> 
	
	<main>
		
        <div class='container' id="container">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
    </main>
    <footer class="bg-light text-center text-lg-start">

		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		<?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
			<a class="text-dark" href="https://<?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>.com"><?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?></a>
		</div>
		<!-- Copyright -->
		<script src="./js/main.js" ></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </footer>
</body>
</html>
