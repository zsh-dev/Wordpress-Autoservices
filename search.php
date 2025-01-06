<?php get_header(); ?>



<main class="search-results">

    <section class="promo-main promo-mini"

    style="background-image: url(<?= get_template_directory_uri(); ?>/assets/img/search-bg.webp);">

        <div class="container">

            <h1 class="title">

                <?php 

            // Заголовок поиска

            printf(

                __('Результаты поиска по запросу: %s', 'your-theme-textdomain'),

                '<span>' . get_search_query() . '</span>'

            ); 

            ?>

            </h1>

        </div>

    </section>

    <div class="searchform-wrap container">

    <?php get_search_form( ); ?>

    </div>

    <section>

    <div class="container">

        <div class="search-tabs section-padding">

            <div class="tabs-btns">

                <?php

                // Проверяем наличие записей для стандартных постов (Статьи)

                $posts_query = new WP_Query(array(

                    's' => get_search_query(),

                    'post_type' => 'post',

                ));



                if ($posts_query->have_posts()) : ?>

                    <button class="btn tabs-btn" data-tab="#tab1">Статьи</button>

                <?php endif; wp_reset_postdata(); ?>



                <?php

                // Проверяем наличие записей для кастомного типа записей (Услуги)

                $custom_query = new WP_Query(array(

                    's' => get_search_query(),

                    'post_type' => 'services', // Укажите ваш кастомный тип

                ));



                if ($custom_query->have_posts()) : ?>

                    <button class="btn tabs-btn" data-tab="#tab2">Услуги</button>

                <?php endif; wp_reset_postdata(); ?>

            </div>



            <?php if ($posts_query->have_posts()) : ?>

                <!-- Таб для стандартных постов -->

                <div id="tab1" class="tabs-content">

                    <h2 class="title mb25">Статьи</h2>

                    <div class="two-cols">

                        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>

                            <?php get_template_part('template-parts/blog-post'); ?>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>

                </div>

            <?php endif; ?>



            <?php if ($custom_query->have_posts()) : ?>

                <!-- Таб для кастомного типа записей -->

                <div id="tab2" class="tabs-content">

                    <h2 class="title mb25">Услуги</h2>

                    <div class="two-cols">

                        <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                            <?php get_template_part('template-parts/services-post'); ?>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>

                </div>

            <?php endif; ?>

            <?php if (!$posts_query->have_posts() && !$custom_query->have_posts()) : ?>

    <div class="no-results">

        <h2 class="title mb25">Ничего не найдено</h2>

        <p>Попробуйте использовать другие ключевые слова для поиска.</p>

    </div>

<?php endif; ?>



        </div>

        

    </div>

</section>



</main>



<?php get_footer(); ?>