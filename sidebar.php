<aside class="site-sidebar">
    <div class="mb45">
    <?php get_search_form( ); ?>
    </div>
    <div class="sidebar-item mb45">
        <h3 class="mini-title">Категории</h3>
        <ul class="category-list">
            <?php
            wp_list_categories(array(
                'title_li' => '', // Убирает стандартный заголовок
                'show_count' => true, // Показывает количество записей
                'orderby' => 'name', // Сортирует категории по имени
                'order' => 'ASC', // В алфавитном порядке
                'style' => 'list', // Оставляет стандартный HTML-вывод в виде списка
            ));
            ?>
        </ul>
    </div>
    <div class="sidebar-item mb45">
        <h3 class="mini-title">Последние статьи</h3>
        <ul class="recent-posts-list">
        <?php
        $recent_posts = new WP_Query(array(
            'post_type' => 'post', // Тип записей: стандартные посты
            'posts_per_page' => 3, // Количество записей
            'post_status' => 'publish', // Только опубликованные записи
        ));

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <li class="recent-post">
                <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="recent-post__img">
                <?php the_post_thumbnail(); ?>
                </a>
              <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="recent-post__img">
                <img src="<?php echo get_template_directory_uri() . "/assets/img/post.jpg" ?>" alt="Заглушка" class="img-radius">
                </a>
              <?php endif; ?>
              <h3>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                </li>
            <?php
            endwhile;
            wp_reset_postdata(); // Сбрасываем глобальные данные после WP_Query
        else : ?>
            <li>Записей пока нет.</li>
        <?php endif; ?>
    </ul>
    </div>
</aside>