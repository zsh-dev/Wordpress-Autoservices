<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title(); ?></title>

    <?php wp_head(  ); ?>

</head>

<body <?php body_class( ); ?>>



<header class="header">

<div class="container header__container">



<a href="<?= get_site_url(); ?>">

    <?php 

    $image = get_field('site_logo', 'option');

    

        ?>

        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

        <?php

        ?> 

</a>

<div class="header-menu-inner">

    <button class="close-btn close-menu-btn"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">

  <path d="M12,2C6.5,2,2,6.5,2,12s4.5,10,10,10s10-4.5,10-10S17.5,2,12,2z M15.7,14.3c0.4,0.4,0.4,1,0,1.4c-0.4,0.4-1,0.4-1.4,0

	L12,13.4l-2.3,2.3c-0.4,0.4-1,0.4-1.4,0c-0.4-0.4-0.4-1,0-1.4l2.3-2.3L8.3,9.7c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0l2.3,2.3

	l2.3-2.3c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4L13.4,12L15.7,14.3z"></path>

</svg></button>

    <?php 

wp_nav_menu( [

    'menu'            => 'Menu-header',

	'container'       => "nav",

	'container_class'       => "menu-wrap",

    ] );

    ?>

    </div>

<div class="header__btns">



    <button class="btn openModalBtn">Связаться</button>

    

    <button class="burger">

        <span></span>

        <span></span>

        <span></span>

    </button>

</div>



</div>

</header>