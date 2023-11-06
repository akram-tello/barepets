<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $sidebar_position = get_field('sidebar_position');

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    if(isset($_GET['category'])) :
        
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'category_name' => $_GET['category'],
            'paged' => $paged
        );

    elseif(isset($_GET['search'])) :
        
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            's' => $_GET['search'],
            'paged' => $paged
        );

    elseif(isset($_GET['filter'])) :
        $filter = '';
        
        if($_GET['filter'] == 'recent') :

            $filter = 'date';
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 9,
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            );

        
        elseif($_GET['filter'] == 'most-viewed') :
            
            $filter = 'post_views_count';

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 9,
                'meta_key' =>  $filter,
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            );

        elseif($_GET['filter'] == 'all') :
            
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
   

        
        endif;


    else :
        
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'paged' => $paged
        );

    endif;


    $the_query = new WP_Query( $args );
?>


<section class="module module--blog-section <?= $className ?>">
    <div class="wrapper">
        <div class="blog-sidebar">
            
            <div class="sidebar-sections blog-search">
                <h4>Search</h4>
                <form action="<?= home_url( '/blog/' ) ?>" method="get">
                    <input type="search" name="search" id="search" placeholder="Search..">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <button><?= get_template_part('img/icon-search.svg') ?></button>
                </form>
            </div>
            <div class="sidebar-sections blog-categories">
                <h4>Category <span class="dropdown-arrow"><?= get_template_part('img/icon-arrow-down.svg') ?></span></h4>
                <?php $blog_categories = get_categories(); ?>
                <ul class="category-list">
                <?php foreach($blog_categories as $blog_category) : ?>
                    <li class="category"><a href="<?= home_url( '/blog/' ) . '?category=' . $blog_category->slug ?>"><span class="category-name"><?= $blog_category->name ?></span><span><?= $blog_category->count ?></span></a></li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="sidebar-sections blog-recent">
                <h4>Recent</h4>
                <?php
                $recent_args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3);
                $recent_query = new WP_Query( $recent_args );
                ?>
                <?php if ( $recent_query->have_posts() ) : ?>
                    <div class="recent-list">
                    <?php while ( $recent_query->have_posts() ) : $recent_query->the_post(); ?>
                        <div class="recent-post">
                            <div class="recent-image">
                                <a href="<?= get_the_permalink(); ?>"><img data-src="<?= get_the_post_thumbnail_url(get_the_ID(),'thumbnail') ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></a>
                            </div>
                            <div class="recent-title">
                                <p><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>

                <?php else : ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); // Restore original Post Data. ?>
            </div>
        </div>
        <div class="blog-listing">
            <div class="blog-filter">
                <form action="<?= home_url( '/blog/' ) ?>" method="get">
                    <select name="filter" id="filter">
                      <option value="default" disabled selected>Filter by</option>
                      <option value="all" style="border-bottom: 1px solid">All Posts</option>
                      <option value="recent">Recent</option>
                      <option value="most-viewed">Most Views</option>
                    </select>
                    <!-- <input type="submit" name="submit" value="Submit" hidden> -->
                </form>
            </div>
        <?php if ( $the_query->have_posts() ) : ?>
            <div class="blog-grid">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <?php
                $categories = get_the_category();
                $category = $categories[0]->cat_name;
                $category_link = esc_url( get_category_link( $categories[0]->term_id ) );
                ?>

                <div class="blog-item">
                    <div class="blog-wrapper">
                        <a class="featured-image" href="<?= get_the_permalink(); ?>">
                            <!-- <a class="category" href="<?= $category_link ?>"><?= $category ?></a> -->
                            <span class="category"><?= $category ?></span>
                            <img data-src="<?= get_the_post_thumbnail_url(get_the_ID(),'full') ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                        </a>
                        <div class="post-title">
                            <h3><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h3>
                        </div>
                        <div class="post-info">
                            <span class="date"><?= get_the_date('M, d h:i A'); ?></span>
                            <?= gt_get_post_view(); ?>
                        </div>
                        <div class="post-excerpt">
                            <?php  echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                        </div>
                        <div class="post-link">
                            <a href="<?= get_the_permalink(); ?>">Read Full Article</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

            </div>
            
            <div class="pagination">
                <?php 
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $the_query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '%1$s', __( '<span class="blog-nav prev-blog"></span>', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s', __( '<span class="blog-nav next-blog"></span>', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                ?>
             </div>
        <?php else : ?>
            <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); // Restore original Post Data. ?>
        </div>
    </div>
</section>