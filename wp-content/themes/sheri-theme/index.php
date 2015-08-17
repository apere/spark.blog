<?php
wp_reset_postdata();
global $post;
 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$my_items = array(
    'numberposts' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page'   => 10,
    'paged' => $paged
);
 
$my_postlist = new WP_Query( $my_items );
$c=0;

if($my_postlist->have_posts()) : while($my_postlist->have_posts()) : $my_postlist->the_post();
    $c++;
    if( $c == 1) :
      get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
   elseif( get_post_format() == 'image' ) :
    get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
   else :
      get_template_part('templates/content-compact', get_post_type() != 'post' ? get_post_type() : get_post_format());
   endif;

   if( $c != count($posts)) :
      echo('<hr>');
    endif;
  endwhile; 
  if ($my_postlist) : 
    wp_reset_query(); 
    wp_pagenavi( array( 'query' => $my_postlist) ); 
    wp_reset_postdata(); 
  endif;

else :
  echo('<div class="alert alert-warning">Sorry, no results were found.</div>');
  get_search_form();
endif; 

?>