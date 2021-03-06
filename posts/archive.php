<?php


if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();
?>

<div id="primary" class="c6-1234">
	<h1 class="archive-title"><?php
		if (is_day()) {
			printf(__('Daily Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date() . '</span>');
		} elseif (is_month()) {
			printf(__('Monthly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'carrington-blueprint')) . '</span>');
		} elseif (is_year()) {
			printf(__('Yearly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'carrington-blueprint')) . '</span>');
		} elseif (is_tag()) {
			printf(__('Tag Archives: %s', 'carrington-blueprint'), '<span>' . single_tag_title('', false ) . '</span>');
		} elseif (is_category()) {
			printf(__('Category Archives: %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		} else {
			_e('Blog Archives', 'carrington-blueprint');
		}
	?></h1>

	<?php
		// Show an optional category description
		if (is_category) {
			$category_description = category_description();
			if ($category_description) {
				echo '<div class="archive-description">' . $category_description . '</div>';
			}
		} elseif (is_tag()) {
			$tag_description = tag_description();
			if ($tag_description) {
				echo '<div class="archive-description">' . $tag_description . '</div>';
			}
		}

		// For the loop used, look in /loops
		cfct_loop();

		// Pagination
		cfct_misc('nav-posts');
	?>

</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>