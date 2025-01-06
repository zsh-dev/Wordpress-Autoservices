<?php 
get_header(); 
?>
<main>
<section class="section-padding">
<div class="container">
    <h1 class="title text-center mb50">Наши услуги</h1>
    
    <div class="three-cols">
        <?php 
        if (have_posts()) : 
            while (have_posts()) : 
                the_post(); 
                get_template_part('template-parts/services-post');
          
            endwhile; 
        endif; 
        ?>
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
</section>
</main>
<?php get_footer(); ?>