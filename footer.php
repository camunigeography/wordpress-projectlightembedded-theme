<?php

wp_footer ();

$categorySlug = false;
if (is_category( )) {
	$cat = get_query_var('cat');
	$yourcat = get_category ($cat);
	$categorySlug = $yourcat->slug;
}

?>

<!-- Wordpress embed end -->
 


