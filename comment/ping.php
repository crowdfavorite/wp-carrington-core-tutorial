<?php


if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

global $comment;

// Extract data passed in from threaded.php for comment reply link
extract($data);
?>
<div id="comment-<?php comment_ID(); ?>" <?php comment_class('reply ping clearfix'); ?>>
	<div class="reply-header">
		<b class="reply-title"><?php printf(__('%s linked to this.', 'carrington-blueprint'), get_comment_author_link()); ?></b>
	</div>
	<div class="reply-footer">
		<?php
		printf(__('On %s at %s', 'carrington-blueprint'), get_comment_date(), get_comment_time());
		if (get_option('thread_comments')) {
			echo ' &middot; ';
			comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])), $comment, $post);
		}
		edit_comment_link(__('Edit', 'carrington-blueprint'), ' &middot; ', '');
		?>
	</div>
</div><!-- .reply -->