<?php 
  $categories = get_the_category();
  $heroImage = "";
  $title = "";
  $subtitle = "";
  $default_header_image = get_theme_mod('default-header-img', get_bloginfo('template_directory') . '/assets/images/default_hero.jpg');
  $main_url = esc_url(home_url('/'));

  if( is_home()) :
    $heroImage = "background-image:url('" . get_theme_mod( 'header-img-upload', $default_header_image ) . "');";
    $title = get_bloginfo( 'name' );
    $subtitle = get_bloginfo( 'description' );

  elseif( is_single() ) : 
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-image' );
    if(  !is_null($image) && !empty($image) && $image[0] && !is_null($image[0]) && !empty($image[0]) && $image[0] != "" && !is_numeric($image[0]) ) :
      $heroImage = "background-image:url('" . $image[0] . "');";
    else  :
      $heroImage = "background-image:url('" . get_theme_mod( 'cat-' . $categories[0]->name . '-img', $default_header_image) . "');";
    endif;

    $title = get_the_title();

    $i = 0;
    $cat = "";
    foreach($categories as $category) {
      $i++;
      if( $i == 1 ) :
         $cat = $category->name;
      else :
        $cat = $cat . ', ' . $category->name;
      endif;
    }
    $subtitle = $cat;

  elseif( is_page() ) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-image' );
    if(  !is_null($image) && !empty($image) && $image[0] && !is_null($image[0]) && !empty($image[0]) && $image[0] != "" && !is_numeric($image[0]) ) :
      $heroImage = "background-image:url('" . $image[0] . "');";
    else  :
      $heroImage = "background-image:url('" . $default_header_image . "');";
    endif;
    $title = get_the_title();
    $subtitle = "";

  elseif( is_category() ) :
    $heroImage = "background-image:url('" . get_theme_mod( 'cat-' . $categories[0]->name . '-img', $default_header_image ) . "');";
    $title = $categories[0]->name;
    $subtitle = "Project Archive";

  elseif( is_tag() ) : 
    $heroImage = "background-image:url('" . get_bloginfo('template_directory') . "/assets/images/default_hero.jpg')";
    $title = get_tag(get_query_var('tag_id'))->name;
    $subtitle = "Tag Archive";

  elseif( is_404()) :
    $heroImage = "background-image:url('" . get_theme_mod( 'header-img-upload', $default_header_image ) . "');";
    $title = "Error 404!";
    $subtitle = "It seems this page doesn't exist.";
  endif;

?>
<a href = "<?php echo($main_url) ?>">
  <header class="banner" role="banner">
    <div class = "wrapper">
      <div class = "hero-image" style= <?php echo($heroImage); ?> > </div>
      <div class = "hero-text">
        <div class = "title"> 
          <?php echo($title); ?> 
        </div>
        <div class = "subtitle"> 
          <?php echo($subtitle); ?> 
        </div>
      </div>
      <div class = "overlay"></div>
    </div>                      
  </header>
</a>
