<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
return;
}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<div id="comments">
<div class="total-comments">
	<h3>
		<?php comments_number('ОТЗЫВЫ', 'ОТЗЫВЫ', 'ОТЗЫВЫ' );?>
	</h3>
</div>
<ol class="commentlist">
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>


<?php
			wp_list_comments( array(
				'style'       => 'ol',
				//'short_ping'  => true,
				'avatar_size' => 32,
			) );
		?>
		

</ol>
</div>
<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"></p>
 
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
	<div id="commentsAdd">
		<div id="respond" class="box m-t-6">
				<?php if ( $user_ID ) { ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
						<p>
							<textarea name="comment" id="comment" rows="10" tabindex="4" style="width: 100%;"></textarea>
						</p>
						<p id="submit-container">
							<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Отправить','Magnificent')?>" />
							<?php comment_id_fields(); ?>
						</p>
						<?php do_action('comment_form', $post->ID); ?>
					</form>
				<?php }else{ ?>
		
					<?php $comments_args = array(
						'title_reply'=>'<h3><span>ОСТАВИТЬ ОТЗЫВ</span></h3>',
						'comment_notes_after' => '',
						'label_submit' => 'Отправить',
						'comment_field' => '<p class="comment-form-comment"><textarea name="comment" id="comment" rows="10" tabindex="4" style="width: 100%;" aria-required="true"></textarea></p>',
					); 
					comment_form($comments_args); ?>
			<?php } ?>		
		</div>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>