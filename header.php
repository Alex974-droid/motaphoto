<?php
/**
 * The header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 * 
 * 
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>

<body>
	<header id="main-header">
		<!-- Logo du site -->
		<div class="logo">
			<?php
				if (function_exists('the_custom_logo')) {
					the_custom_logo();
				} else {
					echo '<h3>' . get_bloginfo('name') . '</h3>';
				}
			?>
		</div>

		<!-- Bouton menu burger -->
		<button class="menu-toggle" aria-controls="nav-menu" aria-expanded="false">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</button>

		<!-- Affichage Menu du HEADER -->
		<nav id="nav-menu" role="navigation">
			<?php
			wp_nav_menu([
				'theme_location' =>	'menu_principal',
				'container' => false,
				'menu_class' => 'menu',
				]);
			?>
		</nav>
	</header>

	<main>