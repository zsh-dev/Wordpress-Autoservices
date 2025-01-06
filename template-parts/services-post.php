<div class="service-item">
                            <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="service-item__img">
                                <?php the_post_thumbnail(); ?>
                                <div class="service-item__icon">

                                    <span class="arrow-icon">→</span>
                                </div>
                            </a>
                            <?php endif; ?>
                            <div class="service-item__bottom">

                                <h3 class="mini-title service-item__title"><a
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
                                        <?php the_excerpt(); ?>
                            </div>
                        </div>