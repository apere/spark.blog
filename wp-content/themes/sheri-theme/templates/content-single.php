<span class = "format"><?php $format =  get_post_format(); ?></span>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php  get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  <?php endwhile; ?>
<?php endif; ?>






