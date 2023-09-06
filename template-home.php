<?php
/*
Template Name:Home Page
*/

get_header(); ?>

		<div class="content-area">
			<main>
				
				<?php 
					 /*----------------------------------------------------------------------------------------------*/
					// We'll only show these sections if WooCommerce is ative
				
				if(class_exists('WooCommerce')):?>
				<section class="popular-products">
					<?php
					$popular_limit =get_theme_mod('set_popular_max_num',4);
					$popular_col 		= get_theme_mod( 'set_popular_max_col', 4 );
					$arrivals_limit		= get_theme_mod( 'set_new_arrivals_max_num', 4 );
					$arrivals_col		= get_theme_mod( 'set_new_arrivals_max_col', 4 );
					?>
					<div class="container">
						<div class="section-title">
						<h2><?php echo esc_html(get_theme_mod( 'set_popular_title', __('Popular products','boom-festive'))); ?></h2>
						</div>
						<?php echo do_shortcode( '[products limit=" ' .esc_attr($popular_limit) . ' " columns=" ' .esc_attr( $popular_col) . ' " orderby="popularity"]' ); ?>
					</div>
				</section>
				<section class="new-arrivals">
					<div class="container">
					<div class="section-title">
						<h2><?php echo esc_html(get_theme_mod( 'set_new_arrivals_title', __('New Arrivals','boom-festive'))); ?></h2>
					</div>
						<?php echo do_shortcode( '[products limit=" ' . esc_attr($arrivals_limit) . ' " columns=" ' . esc_attr($arrivals_col) . ' " orderby="date"]' ); ?>
		
					</div>
				</section>
				
				
				<?php endif; ?>
				
			<!---------------------------------------------------------------------------------------------->
				<!-- End class_exists for WooCommerce -->

				<section class="lab-blog">
					<div class="container">
						<div class="section-title">
							<h2><?php echo esc_html(get_theme_mod( 'set_blog_title', __('News From Our Blog','boom-festive'))); ?></h2>
						</div>						
						<div class="row">
							<?php 

							$args = array(
								'post_type'			=> 'post',
								'posts_per_page'	=> 2,
								'ignore_sticky_posts' => true,
							);

							$blog_posts = new WP_Query( $args );

								// If there are any posts
								if( $blog_posts->have_posts() ):

									// Load posts loop
									while( $blog_posts->have_posts() ): $blog_posts->the_post();
										?>
											<article class="col-12 col-md-6">
												<a href="<?php the_permalink(); ?>">
													<?php 
														if( has_post_thumbnail() ):
															the_post_thumbnail( 'ibsf_blog', array( 'class' => 'img-fluid' ) );
														endif;
													?>
												</a>
												<h3>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												<span class="pub-date">
													<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
												</span>
												<div class="excerpt"><?php the_excerpt(); ?></div>
											</article>
										<?php
									endwhile;
									wp_reset_postdata();
								else:
							?>
								<p><?php esc_html_e('Nothing to display.','boom-festive');?></p>
							<?php endif; ?>
						</div>
					</div>
				</section>
			</main>
		</div>
<?php get_footer(); ?>
