<?php
/**
 * Movaone Recent Posts Widget class.
 *
 * @package movaone
 */

/**
 * Movaone Recent Posts Widget class file.
 */
class Movaone_Recent_Posts extends WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$widget_ops = array(
			'classname'   => 'movaone_recent_posts',
			'description' => __( 'Display Recent Posts with this widget or you can also use movaone Posts widget for more filters.', 'movaone' ),
		);
		parent::__construct( 'movaone_recent_posts', esc_html__( 'movaone Recent Posts Widget', 'movaone' ), $widget_ops );
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args     Display arguments.
	 * @param array $instance Widget settings.
	 */
	public function widget( $args, $instance ) {

		$title     = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$limit     = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		echo wp_kses_post( $args['before_widget'] );
		echo wp_kses_post( $args['before_title'] );
		echo esc_html( $title );
		echo wp_kses_post( $args['after_title'] );

		/**
		 * Widget Content
		 */
		?>
<!-- recent posts -->
<div class="recent-post-widget">
		<?php
				$recent_post_args = array(
					'posts_per_page'      => $limit,
					'post_type'           => 'post',
					'order'               => 'DESC',
					'ignore_sticky_posts' => 1,
				);
				$recent_query     = new WP_Query( $recent_post_args );

				if ( $recent_query->have_posts() ) :
					while ( $recent_query->have_posts() ) :
						$recent_query->the_post();
						?>

						<?php if ( get_the_content() !== '' ) : ?>
	<!-- recent post  -->
	<div class="the-recent-post">
		<!--featured image -->
		<div class="recent-featured-img">
			<a href="<?php the_permalink(); ?>">
							<?php
							if ( get_post_format() !== 'quote' || get_post_format() !== 'aside' || get_post_format() !== 'status' ) {
								echo get_the_post_thumbnail( get_the_ID(), 'movaone_recent_post' );
							}
							?>
			</a>
		</div>
		<!--recent-featured-img -->

		<!-- content -->
		<div class="recent-meta">
			<div class="recent-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
							<?php if ( $show_date ) : ?>
			<div class="recent-post-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
			<?php endif; ?>

		</div><!-- end content -->
	</div><!-- end recent -->

	<?php endif; ?>
						<?php
					endwhile;
				endif;
				wp_reset_postdata();

				?>
</div> <!-- recent posts -->
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * The widget controller.
	 *
	 * @param array $instance Widget settings.
	 */
	public function form( $instance ) {

		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = __( 'Recent Posts', 'movaone' );
		}
		if ( ! isset( $instance['limit'] ) ) {
			$instance['limit'] = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>


<p><label
		for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'movaone' ); ?></label>
	<input type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" id="<?php $this->get_field_id( 'title' ); ?>"
		class="widefat" />
</p>

<p><label
		for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php esc_html_e( 'Limit Posts Number', 'movaone' ); ?></label>

	<input type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>"
		name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" id="<?php $this->get_field_id( 'limit' ); ?>"
		class="widefat" />
</p>
<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?>
		id="<?php esc_attr( $this->get_field_id( 'show_date' ) ); ?>"
		name="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" />
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'movaone' ); ?></label>
</p>
		<?php
	}
}