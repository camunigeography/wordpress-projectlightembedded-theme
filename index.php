<?php get_header(); ?>

<div class="campl-wp-content">
	
	<?php if ( is_front_page() ) : ?>
		<h4 class="frontpagemessage"><?php echo get_bloginfo( 'description' ) ?></h4>
	<?php endif ?>
	
	
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php (function_exists ('the_time_historic') ? the_time_historic('F jS, Y') : the_time('F jS, Y')) ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php if(function_exists('the_views')) { the_views(); } ?> | <?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

</div>



<div class="campl-wp-sidebar" id="blogmenu">
	
	<?php get_sidebar(); ?>

</div>




<?php get_footer(); ?>
