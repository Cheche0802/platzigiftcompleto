<?php get_header(); ?>

<main class='container my-3'>
    <?php if(have_posts()){
            while(have_posts()){
                the_post();
            ?>
                <h1 class='my-5'><?php the_title() ?></h1>
                <?php $taxonomy = get_the_terms(get_the_ID(), 'categoria-productos'); ?>
                <div class="row my-5">
                    <div class="col-md-4 col 12">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="col-md-8 col 12">
                        <?php the_content(); ?>
                    </div> 
                </div>
                <?php   }                
                ?>
                <?php 
                $post_id = get_post($post->ID)->ID;
                $args = array(
                   'post_type' => 'producto',
                   'post_per_page' => 6,
                   'order' => 'asc',
                   'orderby' => 'title',
                   'post__not_in'  => array(
                       $post->ID),
                    'orderby' => 'title',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categoria-productos',
                            'field' => 'slug',
                            'terms' => $taxonomy[0]->slug,
                        )
                    ) 
                ); ?>
               
              <?php $producto = new WP_Query( $args ); ?>

                <?php if ($producto->have_posts()) { ?>
                    <div class="row text-center justify-content-productos-relacionados">
                        <div class="col-12">
                            <h3 >Productos Relacionados</h3>
                        </div>
                        <?php while($producto->have_posts()) { ?>
                               <?php $producto->the_post(); ?>
                        <div class="col-2 my-3 align-item-center" >
                            <?php the_post_thumbnail('thumbnail'); ?>
                            <h4 class ="col-2 my-3 text-center">
                                <a href="<?php the_permalink();?>">
                                    <?php the_title() ?>
                                </a>
                            </h4>
                        </div>
                        
                        <?php
                            } 
                        ?>
                    </div>
            <?php
            }
    } ?>


</main>
<?php get_footer(); ?>