<?php get_header(); ?>



<main class="single-post section-padding">

    <div class="container">

        <div class="two-cols two-cols_rightbig">

            <?php get_sidebar('services'); ?>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div <?php post_class(); ?>>

                <!-- Заголовок записи -->

                <h1 class="title mb50"><?php the_title(); ?></h1>



                <!-- Изображение записи -->

                <?php if (has_post_thumbnail()) : ?>

                <div class="single-post-image">

                    <?php the_post_thumbnail(); ?>

                    <span class="blog-box__date"><?php echo get_the_date(); ?></span>

                </div>

                <?php else : ?>

                <span class="single-post__date"><?php echo get_the_date(); ?></span>

                <?php endif; ?>

                <?php the_category(''); ?>





                <!-- Контент записи -->

                <div class="post-content">

                    <?php the_content(); ?>

                    <?php if( get_field('faq_if') == 'Да' ): ?>

                    <?php if( get_field('serv-faq_title')): ?>

                        <h3 class="title mb25"><?php the_field('serv-faq_title') ?></h3>

                        <?php endif; ?>

                    <?php if( get_field('serv-faq_txt')): ?>

                        <p><?php the_field('serv-faq_txt') ?></p>

                        <?php endif; ?>

                <?php if( have_rows('serv-faq_items') ): ?>



                <ul class="faq-items">



                    <?php while( have_rows('serv-faq_items') ): the_row(); 

                                ?>



                    <li class="faq-item">

                        <h4 class="faq-item__question"><button><?php the_sub_field('serv-faq_question'); ?> <div class="faq-item__ico"></div></button> </h4>

                        <p class="faq-item__answer"><?php the_sub_field('serv-faq_answer'); ?></p>

                    </li>



                    <?php endwhile; ?>



                </ul>



                <?php endif; ?>

                <?php endif; ?>

                </div>

                    <div class="text-right">



                        <a href="/contacts#form" class="btn">Связаться</a>

                    </div>



            </div>



        </div>

        <?php endwhile; else : ?>

        <p><?php _e('Запись не найдена.', 'your-theme-textdomain'); ?></p>

        <?php endif; ?>

    </div>

</main>



<?php get_footer(); ?>