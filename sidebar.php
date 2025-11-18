<?php get_header(); ?>


<?php if ( !is_front_page() ) : ?>
	<a href="<?php echo home_url(); ?>/">&laquo; Home</a>
<?php endif ?>
		
		
<?php
/* If not using a customised sidebar (Appearance > Customise > Widgets), then use a default layout */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	
	<ul>
		<?php if ( is_404() || is_category() || is_day() || is_month() ||
					is_year() || is_search() || is_paged() ) {
		?> <li>

		<?php /* If this is a 404 page */ if (is_404()) { ?>
		<?php /* If this is a category archive */ } elseif (is_category()) { ?>
		<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

		<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
		<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
		for the day <?php (function_exists ('the_time_historic') ? the_time_historic('l, F jS, Y') : the_time('l, F jS, Y')); ?>.</p>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
		for <?php (function_exists ('the_time_historic') ? the_time_historic('F, Y') : the_time('F, Y')); ?>.</p>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
		for the year <?php (function_exists ('the_time_historic') ? the_time_historic('Y') : the_time('Y')); ?>.</p>

		<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
		<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
		for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

		<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>
		<?php } ?>
		
		</li> <?php }?>
	</ul>
	
	
	<h2>Archives</h2>
	<ul>
		<li>
			<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
				<option value=""><?php echo esc_attr( __( 'Select month' ) ); ?></option>
				<?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
			</select>
		</li>
	</ul>
	
	<h2>Search</h2>
	<ul>
		<li><?php get_search_form(); ?></li>
	</ul>

	<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
	
	<h2>Categories</h2>
	<ul>
		<?php wp_list_categories('show_count=1&title_li='); ?>
	</ul>
	
	<?php if ( is_front_page() ) : ?>
	<h2>Tags</h2>
	<?php wp_tag_cloud(); ?>
	<?php endif ?>
	
	<?php if( has_tag() ) : ?>
		<h2>Tags</h2>
		<?php echo get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>'); // Display tags as links ?>
	<?php endif; ?>
	
	<!--
	<ul>
		<li><a href="#">Link</a></li>
	</ul>
	-->
	
	<h2>RSS feed</h2>
	<ul>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">
		<img src="/images/icons/feed.png" alt="RSS Feed 2.0" height="16" width="16" /> RSS feed</a></li>
	</ul>

<?php endif; ?>

