<?php get_header(); ?>

<main class="single-post section-padding">
    <div class="container">
        <div class="two-cols two-cols_leftbig">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
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
                </div>

            </article>
            <?php get_sidebar(); ?>
            </div>
        <?php endwhile; else : ?>
            <p><?php _e('Запись не найдена.', 'your-theme-textdomain'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
