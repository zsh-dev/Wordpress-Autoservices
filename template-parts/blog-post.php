<article class="blog-box blog-box-styletwo">
            <div class="blog-box__image">
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
              <h2 class="mini-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <a href="<?php the_permalink(); ?>" class="blog-box__link">Читать далее</a>
            </div>
          </article>