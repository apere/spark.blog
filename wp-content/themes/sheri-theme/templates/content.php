<article <?php post_class(); ?>
  <header>
    <?php 
      $title = get_the_title();
      if( $title != "" ) : 
    ?>
    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo($title) ?></a></h1>
    <ul class="tags project-info">
      <?php the_category('li'); ?>
      <li class = "post-date">
        <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
      </li>
    </ul>
    <ul class = "tags">
      <li class="list-title">Tags: </li>
      <?php
          $posttags = get_the_tags();
          if ($posttags) {
            foreach($posttags as $tag) {
              echo '<li class = "post-tag"><a href ='. get_tag_link($tag->term_id). '>' . $tag->name . '</a></li>'; 
            }
          }
        ?>
    </ul>
    <?php endif; ?>
  </header>
  <div class="post-content">
    
  <?php 
    the_content();
    $contentS = $post->post_content;
    $searchimages = '~<img [^>]* />~';
    preg_match_all( $searchimages, $contentS, $pics );
    $iNumberOfPics = count($pics[0]);
    if( $title = "" && $iNumberOfPics > 0 ) : 
  ?>
    <header>
        <ul class="tags project-info">
          <?php the_category('li'); ?>
          <li class = "post-date">
            <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
          </li>
        </ul>
        <ul class = "tags">
          <li class="list-title">Tags: </li>
          <?php
              $posttags = get_the_tags();
              if ($posttags) {
                foreach($posttags as $tag) {
                  echo '<li class = "post-tag"><a href ='. get_tag_link($tag->term_id). '>' . $tag->name . '</a></li>'; 
                }
              }
            ?>
        </ul>
    </header>
    <?php endif; ?>
    <div class="spacer" style="clear: both;"></div>
  </div>
</article>

