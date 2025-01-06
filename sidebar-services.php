<aside class="site-sidebar">
    <div class="sidebar-item mb45">
        <h3 class="mini-title">Наши услуги</h3>
        <ul class="services-list">
            <?php
            // Получаем все записи кастомного типа services
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1, // Выводим все услуги
                'orderby' => 'title', // Сортировка по названию
                'order' => 'ASC'
            );
            $services = new WP_Query($args);

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    // Проверяем, является ли текущая услуга активной
                    $active_class = (get_the_ID() === get_queried_object_id()) ? 'active' : '';
            ?>
                    <li class="services-list__item <?php echo $active_class; ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
            <?php
                endwhile;
                wp_reset_postdata(); // Сбрасываем глобальную переменную поста
            else :
                echo '<li>Услуги не найдены.</li>';
            endif;
            ?>
        </ul>
    </div>
    <div class="sidebar-item sidebar-item_gray mb45">
        <h3 class="mini-title">Связаться с нами</h3>
      <?php echo do_shortcode( '[contact-form-7 id="264e15b" title="Форма в сайдбаре"]' );?>
    </div>
</aside>
