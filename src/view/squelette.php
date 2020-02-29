<!DOCTYPE html>
<html>
<head>
  <title><?php echo $this->title; ?></title>
  <meta charset="UTF-8" />
	<link rel="stylesheet" href="skin/reset.css" />
  <link rel="stylesheet" href="skin/screen.css" />
  <?php echo $this->js; ?>
  <link rel="icon" type="image/png" href="skin/img/favicon.png" />
</head>
<body>
	<header>
		<ul id="compte">
			<?php foreach ($this->getCoMenu() as $url => $text) { 
				echo '<li><a href="'.$url.'">'.$text.'</a></li>';
			}?>
		</ul>
		<?php echo $this->imgheader ; ?>
		<nav>
			<ul id="navigation">
			<?php foreach ($this->getNavMenu() as $url => $text) { 
				echo '<li><a href="'.$url.'">'.$text.'</a></li>';
			}?>
			</ul>
		</nav>
	</header>

	<main>
		<?php if ($this->feedback !== '') {
			echo '<div id="feedback">'.$this->feedback.'</div>';
		}
		echo $this->content; ?>
	</main>
	
	<footer>
		<p id="propriete">Le terme &ldquo;<em>super-héros</em>&rdquo; est actuellement la propriété de marque conjointe des firmes américaines :<br/>
			<a href="http://marvel.com/" title="Aller sur le site officiel Marvel" target='_blank'>Marvel Comics</a> et <a href="http://www.dccomics.com/" title="Aller sur le site officiel DC Comics" target='_blank'>DC Comics</a>.
		</p>

		<div id="logo">
			<img src="skin/img/marvel_logo.jpg" alt="logo Marvel" title="logo de Marvel"/>
			<img src="skin/img/dc_logo.png" alt="logo DC Comics" title="logo de DC Comics"/>
		</div>
	</footer>
</body>
</html>
