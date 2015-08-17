<?php
wp_reset_postdata();
global $post;
 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if( is_category() ) : 
  $theCat = get_query_var('cat');
  $my_items = array(
      'cat' => $theCat,
      'post_type' => '',
      'numberposts' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page'   => 10,
      'paged' => $paged
  );
elseif( is_tag() ) : 
  $theTag = get_query_var('tag');
  $my_items = array(
      'tag' => $theTag,
      'post_type' => '',
      'numberposts' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page'   => 10,
      'paged' => $paged
  );
else :
  $my_items = array(
      'post_type' => '',
      'numberposts' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page'   => 10,
      'paged' => $paged
  );
endif;
 
$my_postlist = new WP_Query( $my_items );
$c=0;

if($my_postlist->have_posts()) : while($my_postlist->have_posts()) : $my_postlist->the_post();
    $c++;
    get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
  
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