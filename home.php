<?php

get_header(); // Подключает шапку сайта

?>



<main class="blog-page container section-padding">

  <h1 class="title text-center mb50"><?php single_post_title(); // Заголовок страницы ?></h1>

  <div class="two-cols two-cols_leftbig">

    <div>

    <div class="two-cols gap40 two-cols_md">

        <?php if (have_posts()) : while (have_posts()) : the_post(); 

       get_template_part('template-parts/blog-post');

         endwhile; else : ?>

            <p>Записей пока нет.</p>

        <?php endif; ?>

    </div>



    <div class="pagination">

    <?php   the_posts_pagination(array(

            'mid_size' => 2,

            'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg">

            <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 13 1 7l6-6"></path>

          </svg>',

            'next_text' => '<svg xmlns="http://www.w3.org/2000/svg">

            <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 6-6-6-6"></path>

          </svg>',

       

        )); ?>

    </div>

    </div>

    <?php get_sidebar(); ?>

    </div>

</main>



<?php

get_footer(); // Подключает подвал сайта

?>

