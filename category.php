<?php
get_header(); // Подключает шапку сайта
?>

<main class="category-page container section-padding">
    <h1 class="title text-center mb50"><?php single_cat_title(); // Заголовок рубрики ?></h1>
    <div class="two-cols two-cols_leftbig">
    <div class="category-posts">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="blog-box blog-box-styletwo">
            <div class="blog-box__image">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="blog-box__imagewrap">
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
              <h2 class="mini-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="btn">Читать далее</a>
            </div>
          </article>
        <?php endwhile; else : ?>
            <p>Записей в этой рубрике пока нет.</p>
        <?php endif; ?>
   

    <div class="pagination">
        <?php
        // Пагинация
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('« Назад'),
            'next_text' => __('Вперед »'),
        ));
        ?>
    </div>
    </div>
    <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer(); // Подключает подвал сайта
?>
