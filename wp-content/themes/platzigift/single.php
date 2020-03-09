<?php get_header(); ?>

<main class='container my-3'>
    <?php if(have_posts()){
            while(have_posts()){
                the_post();
            ?>
                <h1 class='my-5 col-2 my-3 text-center'><?php the_title() ?></h1>
                <div class="row text-center justify-content my-5">
                    <div class="col-md-4 col 12">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="col-md-8 col 12">
                        <?php the_content(); ?>
                    </div> 
                </div>
                <?php get_template_part( 'templete-parts/post', 'navigation' ); ?> 
            <?php
            }
    } ?>

</main>
<?php get_footer(); ?>