<?php get_header(); ?>

<main id="main" class="site-main section-padding">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- Заголовок страницы -->
                    <h1 class="title mb90 text-center"><?php the_title(); ?></h1>
              

                <!-- Основной контент -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

            </section>
        <?php endwhile; else : ?>
            <section class="no-content">
                <h2 class="title mb25">Страница не найдена</h2>
                <p>К сожалению, запрашиваемая страница не существует. Попробуйте воспользоваться меню или формой поиска.</p>
                <?php get_search_form(); ?>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
