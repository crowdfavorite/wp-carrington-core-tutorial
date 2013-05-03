<?php


if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

global $post;

get_header();

if (have_posts()) : while (have_posts()) : the_post();
?>

	<div id="attachment" class="clearfix">

		<div class="attachment-content c6-123456">
			<p><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">&larr; back to &#8220;<?php echo get_the_title($post->post_parent); ?>&#8221;</a></p>
			<?php the_title('<h1>', '</h1>') ?>
			<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>

			<?php
			if (!empty($post->post_excerpt)) {
				echo '<div class="attachment-excerpt">',the_excerpt(),'</div>'; // this is the "caption"
			}
			the_content();
			?>
		</div>

		<div class="attachment-prev c6-123">
		<?php
		if (cfct_get_adjacent_image_link(true) != '') {
			previous_image_link('thumb');
		}
		?>
		</div>
		<div class="attachment-next c6-456">
		<?php
		if (cfct_get_adjacent_image_link(false) != '') {
			next_image_link('thumb');
		}
		?>
		</div>
	</div><!--#attachment-->

<?php endwhile; else: ?>

	<p><?php _e('Sorry, no attachments matched your criteria.', 'carrington-blueprint'); ?></p>

<?php endif; ?>

<?php get_footer(); ?>
