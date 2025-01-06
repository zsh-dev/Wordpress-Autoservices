<?php get_header(); ?>



<main>

<section class="promo-main" style="background-image: url(<?php the_field('promo_bg') ?>);">

    <div class="container">



        <?php if( get_field('promo_if') == 'Да' ): ?>

        <span class="promo__subtitle"><?php the_field( "promo_subtitle" ); ?></span>

        <?php endif; ?>





        <h1 class="title"><?php the_field('promo_title') ?></h1>

        <?php 



$link = get_field('promo_btn');



if( $link ): 

	$link_url = $link['url'];

	$link_title = $link['title'];

	?>

        <a class="btn" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?></a>

        <?php endif; ?>



    </div>

</section>

<div class="counter-sec">

    <div class="container">

        <ul class="four-cols">

            <?php if(get_field('counter_blocks')): ?>

            <?php while(has_sub_field('counter_blocks')) : ?>

            <li class="counter-block">

                <div class="counter-block__number">

                    <?php the_sub_field('counter_block-numb'); ?>

                    <?php if (get_sub_field('counter_block-symvol')): ?>

                    <span class="counter-block__number-symbol"><?php the_sub_field('counter_block-symvol'); ?></span>

                    <?php endif; ?>

                </div>

                <p><?php the_sub_field('counter_block-txt'); ?></p>

            </li>

            <?php endwhile; ?>

            <?php endif; ?>



        </ul>

    </div>

</div>



<section class="section-padding ovh">

    <div class="container">





        <div class="space-between services-slider-wrapper">



            <h2 class="title">Наши услуги</h2>

            <div class="slider-btns">

                <button class="slider-btn slider-btn-prev services-slider-prev"><</button><button class="slider-btn slider-btn-next services-slider-next">></button>

            </div>

        </div>

        <?php

$args = array(

    'post_type'      => 'services',

    'post_status'    => 'publish',

    'posts_per_page' => -1,

);



$query = new WP_Query($args);



if ($query->have_posts()) : ?>

        <div class="services-container">





            <div class="swiper services-slider">

                <div class="swiper-wrapper">

                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="swiper-slide">

                        <div class="service-card">

                            <?php if (has_post_thumbnail()) : ?>

                            <a class="service-card__image" href="<?php the_permalink(); ?>">

                                <?php the_post_thumbnail(); ?>

                            </a>

                            <?php endif; ?>

                            <div class="service-card__bottom">



                                <h3 class="mini-title service-card__title"><a

                                        href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>



                                <span class="arrow-icon">→</span>



                            </div>

                        </div>

                    </div>

                    <?php endwhile; ?>

                </div>



            </div>

        </div>

        <?php

endif;



wp_reset_postdata();

?>

    </div>

</section>





<section class="section-padding">

    <div class="two-cols align-center">

        <img src="<?php echo esc_url(get_field('why_img')['url']); ?>" class="img-radius img-full"

            alt="<?php echo esc_attr(get_field('why_img')['alt']); ?>" />

        <div class="why-content">

            <h2 class="title mb25"><?php the_field('why_title') ?></h2>

            <?php 

                if(get_field('why_txt')) :

                    ?>

            <p class="mb50">

                <?php the_field('why_txt') ?>

            </p>

            <?php endif; ?>

            <?php if(get_field('why_reasons')): ?>

            <div class="why-cols">

                <?php while(has_sub_field('why_reasons')) : ?>

                <div class="why-item">

                    <img src="<?php echo esc_url(get_sub_field('why_reason_ico')['url']); ?>"

                        alt="<?php echo esc_attr(get_field('why_reason_ico')['alt']); ?>" />

                    <h3 class="mini-title"><?php the_sub_field('why_reasons_title'); ?></h3>

                    <p><?php the_sub_field('why_reasons_txt'); ?></p>

                </div>

                <?php endwhile; ?>

            </div>

            <?php endif; ?>

        </div>

    </div>

</section>



<section class="section-padding">

    <div class="container">

        <h2 class="title mb50">Наша экспертная команда</h2>

        <?php

$args = array(

    'post_type'      => 'team',

    'post_status'    => 'publish',

    'orderby'  => 'date',

	'order'    => 'ASC',

    'posts_per_page' => -1,

);



$query = new WP_Query($args);



if ($query->have_posts()) : ?>

        <div class="four-cols gap40">

            <?php while ($query->have_posts()) : $query->the_post(); ?>

            <div class="team-box">

                <?php if (has_post_thumbnail()) : ?>

                <?php the_post_thumbnail(); ?>

                <?php endif; ?>

                <div class="team-box__body">



                    <h3 class="mini-title"><?php the_title(); ?></h3>



                    <p class="team-box__position"><?php the_field('team_position') ?></p>

                    <div class="team-socials">

                        <button class="share-ico">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                                <path

                                    d="M386.445,182.626A76.868,76.868,0,1,0,319.09,142.7L186.127,212.03a76.8,76.8,0,1,0-1.057,95.648l130.876,68.045a77.114,77.114,0,1,0,10.313-17.179L195.613,290.62a76.659,76.659,0,0,0,.695-61.342L331.1,158.994A76.578,76.578,0,0,0,386.445,182.626Z">

                                </path>

                            </svg>

                        </button>

                        <div class="team-socials__wrap">

                            <?php if( get_field('team_tg')): ?>

                            <a href="<?php ( the_field('team_tg'))?>"><svg xmlns="http://www.w3.org/2000/svg"

                                    viewBox="0 0 24 24">

                                    <path

                                        d="M16.114 9.291c.552-.552 1.1-1.84-1.2-.276a395.806 395.806 0 0 1-6.489 4.372 2.7 2.7 0 0 1-2.117.046c-1.38-.414-2.991-.966-2.991-.966s-1.1-.691.783-1.427c0 0 7.961-3.267 10.722-4.418 1.058-.46 4.647-1.932 4.647-1.932s1.657-.645 1.519.92c-.046.644-.414 2.9-.782 5.338-.553 3.451-1.151 7.225-1.151 7.225s-.092 1.058-.874 1.242a3.787 3.787 0 0 1-2.3-.828c-.184-.138-3.451-2.209-4.648-3.221a.872.872 0 0 1 .046-1.473 169.31 169.31 0 0 0 4.835-4.602Z">

                                    </path>

                                </svg></a>

                            <?php endif; ?>

                            <?php if( get_field('team_ig')): ?>

                            <a href="<?php ( the_field('team_ig'))?>"><svg xmlns="http://www.w3.org/2000/svg"

                                    width="2500" height="2500" viewBox="0 0 2476 2476">

                                    <path

                                        d="M825.4 1238c0-227.9 184.7-412.7 412.6-412.7 227.9 0 412.7 184.8 412.7 412.7 0 227.9-184.8 412.7-412.7 412.7-227.9 0-412.6-184.8-412.6-412.7m-223.1 0c0 351.1 284.6 635.7 635.7 635.7s635.7-284.6 635.7-635.7-284.6-635.7-635.7-635.7S602.3 886.9 602.3 1238m1148-660.9c0 82 66.5 148.6 148.6 148.6 82 0 148.6-66.6 148.6-148.6s-66.5-148.5-148.6-148.5-148.6 66.5-148.6 148.5M737.8 2245.7c-120.7-5.5-186.3-25.6-229.9-42.6-57.8-22.5-99-49.3-142.4-92.6-43.3-43.3-70.2-84.5-92.6-142.3-17-43.6-37.1-109.2-42.6-229.9-6-130.5-7.2-169.7-7.2-500.3s1.3-369.7 7.2-500.3c5.5-120.7 25.7-186.2 42.6-229.9 22.5-57.8 49.3-99 92.6-142.4 43.3-43.3 84.5-70.2 142.4-92.6 43.6-17 109.2-37.1 229.9-42.6 130.5-6 169.7-7.2 500.2-7.2 330.6 0 369.7 1.3 500.3 7.2 120.7 5.5 186.2 25.7 229.9 42.6 57.8 22.4 99 49.3 142.4 92.6 43.3 43.3 70.1 84.6 92.6 142.4 17 43.6 37.1 109.2 42.6 229.9 6 130.6 7.2 169.7 7.2 500.3 0 330.5-1.2 369.7-7.2 500.3-5.5 120.7-25.7 186.3-42.6 229.9-22.5 57.8-49.3 99-92.6 142.3-43.3 43.3-84.6 70.1-142.4 92.6-43.6 17-109.2 37.1-229.9 42.6-130.5 6-169.7 7.2-500.3 7.2-330.5 0-369.7-1.2-500.2-7.2M727.6 7.5c-131.8 6-221.8 26.9-300.5 57.5-81.4 31.6-150.4 74-219.3 142.8C139 276.6 96.6 345.6 65 427.1 34.4 505.8 13.5 595.8 7.5 727.6 1.4 859.6 0 901.8 0 1238s1.4 378.4 7.5 510.4c6 131.8 26.9 221.8 57.5 300.5 31.6 81.4 73.9 150.5 142.8 219.3 68.8 68.8 137.8 111.1 219.3 142.8 78.8 30.6 168.7 51.5 300.5 57.5 132.1 6 174.2 7.5 510.4 7.5 336.3 0 378.4-1.4 510.4-7.5 131.8-6 221.8-26.9 300.5-57.5 81.4-31.7 150.4-74 219.3-142.8 68.8-68.8 111.1-137.9 142.8-219.3 30.6-78.7 51.6-168.7 57.5-300.5 6-132.1 7.4-174.2 7.4-510.4s-1.4-378.4-7.4-510.4c-6-131.8-26.9-221.8-57.5-300.5-31.7-81.4-74-150.4-142.8-219.3C2199.4 139 2130.3 96.6 2049 65c-78.8-30.6-168.8-51.6-300.5-57.5-132-6-174.2-7.5-510.4-7.5-336.3 0-378.4 1.4-510.5 7.5">

                                    </path>

                                </svg></a>

                            <?php endif; ?>

                            <?php if( get_field('team_whatsapp')): ?>

                            <a href="https://wa.me/<?php ( the_field('team_whatsapp'))?>"><svg

                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 737.509 740.824">

                                    <path fill-rule="evenodd"

                                        d="M630.056 107.658C560.727 38.271 468.525.039 370.294 0 167.891 0 3.16 164.668 3.079 367.072c-.027 64.699 16.883 127.855 49.016 183.523L0 740.824l194.666-51.047c53.634 29.244 114.022 44.656 175.481 44.682h.151c202.382 0 367.128-164.689 367.21-367.094.039-98.088-38.121-190.32-107.452-259.707m-259.758 564.8h-.125c-54.766-.021-108.483-14.729-155.343-42.529l-11.146-6.613-115.516 30.293 30.834-112.592-7.258-11.543c-30.552-48.58-46.689-104.729-46.665-162.379C65.146 198.865 202.065 62 370.419 62c81.521.031 158.154 31.81 215.779 89.482s89.342 134.332 89.311 215.859c-.07 168.242-136.987 305.117-305.211 305.117m167.415-228.514c-9.176-4.591-54.286-26.782-62.697-29.843-8.41-3.061-14.526-4.591-20.644 4.592-6.116 9.182-23.7 29.843-29.054 35.964-5.351 6.122-10.703 6.888-19.879 2.296-9.175-4.591-38.739-14.276-73.786-45.526-27.275-24.32-45.691-54.36-51.043-63.542-5.352-9.183-.569-14.148 4.024-18.72 4.127-4.11 9.175-10.713 13.763-16.07 4.587-5.356 6.116-9.182 9.174-15.303 3.059-6.122 1.53-11.479-.764-16.07-2.294-4.591-20.643-49.739-28.29-68.104-7.447-17.886-15.012-15.466-20.644-15.746-5.346-.266-11.469-.323-17.585-.323-6.117 0-16.057 2.296-24.468 11.478-8.41 9.183-32.112 31.374-32.112 76.521s32.877 88.763 37.465 94.885c4.587 6.122 64.699 98.771 156.741 138.502 21.891 9.45 38.982 15.093 52.307 19.323 21.981 6.979 41.983 5.994 57.793 3.633 17.628-2.633 54.285-22.19 61.932-43.616 7.646-21.426 7.646-39.791 5.352-43.617-2.293-3.826-8.41-6.122-17.585-10.714"

                                        clip-rule="evenodd"></path>

                                </svg></a>

                            <?php endif; ?>

                        </div>





                    </div>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

        <?php

endif;



wp_reset_postdata();

?>



    </div>

</section>

<section class="section-padding feedbacks">

    <div class="container container-full">

        <div class="two-cols gap40">

            <img src="<?php echo esc_url(get_field('feedback_img')['url']); ?>" class="img-radius obj-l img-full"

                alt="<?php echo esc_attr(get_field('feedback_img')['alt']); ?>" />

            <div class="box-gray min-w">

                <h2 class="title"><?php the_field('feedback_title') ?></h2>

                <div class="pos-relative">

                    <?php

                        $args = array(

                            'post_type'      => 'feedbacks',

                            'post_status'    => 'publish',

                            'posts_per_page' => -1,

                        );



                        $query = new WP_Query($args);



                        if ($query->have_posts()) : ?>

                    <div class="swiper feedbacks-slider">

                        <div class="swiper-wrapper">

                            <?php while ($query->have_posts()) : $query->the_post(); ?>

                            <div class="swiper-slide">

                                <div class="feedback-item">

                                    <?php if (get_the_content()) the_content(); ?>

                                    <h3 class="feedback-item__name"><?php the_title(); ?></h3>

                                </div>

                            </div>

                            <?php endwhile; ?>



                        </div>



                    </div>

                    <div class="feedbacks-slider__btns slider-btns">

                    <button class="slider-btn slider-btn-prev feedbacks-slider-btn-prev"><</button><button class="slider-btn slider-btn-next feedbacks-slider-btn-next">></button>

                </div>

             

                </div>

                <?php

                                endif;



                                wp_reset_postdata();

                                ?>



<?php if(get_field('feedback_counter')): ?>

            <?php while(has_sub_field('feedback_counter')) : ?>

            <div class="counter-block">

                <div class="counter-block__number">

                    <?php the_sub_field('counter_block-numb'); ?>

                    <?php if (get_sub_field('counter_block-symvol')): ?>

                    <span class="counter-block__number-symbol"><?php the_sub_field('counter_block-symvol'); ?></span>

                    <?php endif; ?>

                </div>

                <p><?php the_sub_field('counter_block-txt'); ?></p>

            </div>

            <?php endwhile; ?>

            <?php endif; ?>



               

            </div>

        </div>

    </div>

</section>





<section class="section-padding">

  <div class="container">

    <div class="banner-box" style="background-image: url(<?php the_field('banner_bg') ?>);">

    <div class="banner-box__body">



        <h3 class="subtitle"><?php the_field('banner_subtitle') ?></h3>

        <h2 class="title mb25"><?php the_field('banner_title') ?></h2>

        <?php 



$banner_btn = get_field('banner_btn');





	$banner_btn_url = $banner_btn['url'];

	$banner_btn_title = $banner_btn['title'];

	?>

	<a class="btn" href="<?php echo esc_url($banner_btn_url); ?>"><?php echo esc_html($banner_btn_title); ?></a>

    

</div>

</div>

  </div>

</section>





<section class="section-padding">

  <div class="container">

    <h2 class="title text-center mb90">Полезные статьи</h2>

    <div class="two-cols gap40">

      <?php

      // Параметры для запроса только постов стандартного типа

      $args = [

        'post_type'      => 'post', // Только стандартные записи

        'posts_per_page' => 4,      // Количество постов для отображения

        'orderby'        => 'date', // Сортировка по дате

        'order'          => 'DESC', // Сначала новые

      ];



      $query = new WP_Query($args);



      if ($query->have_posts()) :

        while ($query->have_posts()) : $query->the_post(); ?>

          <article class="blog-box">

            <div class="blog-box__image blog-box__image-w50">

              <?php if (has_post_thumbnail()) : ?>

                <a href="<?php the_permalink(); ?>">

                <?php the_post_thumbnail(); ?>

                </a>

              <?php else : ?>

                <a href="<?php the_permalink(); ?>">

                <img src="<?php echo get_template_directory_uri() . "/assets/img/post.jpg" ?>" alt="Заглушка" class="img-radius">

                </a>

              <?php endif; ?>

              <div class="blog-box__date">

  <?php echo date_i18n('j M Y', strtotime(get_the_date())); ?>

</div>



            </div>

            <div class="blog-box__body">

              <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>" class="blog-box__category">

                <?php echo get_the_category()[0]->name; ?>

              </a>

              <h3 class="mini-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              <a href="<?php the_permalink(); ?>" class="blog-box__link">Читать далее</a>

            </div>

          </article>

        <?php endwhile;

      else : ?>

        <p>Постов пока нет.</p>

      <?php endif;



      wp_reset_postdata();

      ?>

    </div>

  </div>

</section>



</main>



<?php get_footer(); ?>