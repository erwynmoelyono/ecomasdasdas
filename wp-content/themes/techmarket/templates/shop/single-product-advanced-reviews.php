<?php
/**
 * Display single product advanced reviews (comments)
 *
 */
global $product;

$product_id 		= $product->get_id();
$review_count 		= $product->get_review_count();
$avg_rating_number 	= number_format( $product->get_average_rating(), 1 );
$rating_counts 		= Techmarket_WC_Helper::get_ratings_counts( $product );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="techmarket-advanced-reviews">
	<div class="advanced-review row">
		<div class="advanced-review-rating">
			<h2 class="based-title"><?php echo esc_html( sprintf( _n( 'Review (%s)', 'Reviews (%s)', $review_count, 'techmarket' ), $review_count ) ); ?></h2>
			<div class="avg-rating">
				<span class="avg-rating-number"><?php echo esc_html( $avg_rating_number ); ?></span>
				<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'techmarket' ), $avg_rating_number ); ?>">
					<span style="width:<?php echo ( ( $avg_rating_number / 5 ) * 100 ); ?>%"></span>
				</div>
			</div>
			<div class="rating-histogram">
				<?php for( $rating = 5; $rating > 0; $rating-- ) : ?>
				<div class="rating-bar">
					<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'techmarket' ), $rating ); ?>">
						<span style="width:<?php echo ( ( $rating / 5 ) * 100 ); ?>%"></span>
					</div>
					<?php if ( isset( $rating_counts[$rating] ) ) : ?>
					<div class="rating-count"><?php echo esc_html( $rating_counts[$rating] ); ?></div>
					<?php else : ?>
					<div class="rating-count zero">0</div>
					<?php endif; ?>
					<?php 
						$rating_percentage = 0;
						if ( isset( $rating_counts[$rating] ) && $review_count > 0 ) {
							$rating_percentage = (round( $rating_counts[$rating] / $review_count, 2 ) * 100 );
						}
					?>
					<div class="rating-percentage-bar">
						<span style="width:<?php echo esc_attr( $rating_percentage ); ?>%" class="rating-percentage"></span>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
		<div class="advanced-review-comment">
			
			<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product_id ) ) : ?>

				<div id="review_form_wrapper">
					<div id="review_form">
						<?php
							$commenter = wp_get_current_commenter();

							$comment_form = array(
								'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'techmarket' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'techmarket' ), get_the_title() ),
								'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'techmarket' ),
								'comment_notes_before' => '',
								'comment_notes_after'  => '',
								'fields'               => array(
									'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'techmarket' ) . ' <span class="required">*</span></label> ' .
									            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
									'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'techmarket' ) . ' <span class="required">*</span></label> ' .
									            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
								),
								'label_submit'  => esc_html__( 'Add Review', 'techmarket' ),
								'logged_in_as'  => '',
								'comment_field' => ''
							);

							if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
								$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'techmarket' ), esc_url( $account_page_url ) ) . '</p>';
							}

							if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
								$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'techmarket' ) .'</label><select name="rating" id="rating">
									<option value="">' . esc_html__( 'Rate&hellip;', 'techmarket' ) . '</option>
									<option value="5">' . esc_html__( 'Perfect', 'techmarket' ) . '</option>
									<option value="4">' . esc_html__( 'Good', 'techmarket' ) . '</option>
									<option value="3">' . esc_html__( 'Average', 'techmarket' ) . '</option>
									<option value="2">' . esc_html__( 'Not that bad', 'techmarket' ) . '</option>
									<option value="1">' . esc_html__( 'Very Poor', 'techmarket' ) . '</option>
								</select></p>';
							}

							$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your Review', 'techmarket' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

							comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
						?>
					</div>
				</div>

			<?php else : ?>

				<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'techmarket' ); ?></p>

			<?php endif; ?>
		</div>
	</div>
	
	<div id="comments">
		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'techmarket' ); ?></p>

		<?php endif; ?>
	</div>

	<div class="clear"></div>
</div>