<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fervor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php $counter = 1; ?>
			<?php
			while ( have_posts() ) : the_post(); ?>

			<?php if ( have_rows( 'subpage_content_modules' ) ): ?>
				<?php while ( have_rows( 'subpage_content_modules' ) ) : the_row(); ?>
					<?php if ( get_row_layout() == 'opening' ) : ?>
						<section id="section<?php echo $counter ?>" class="opening container-fluid">
							
							<?php $background_image = get_sub_field( 'background_image' ); ?>
							<?php if ( $background_image ) { ?>
								<?php fervor_background_image($background_image,'#section'.$counter); ?>
							<?php } ?>

							<div class="row">
								<div class="typography col-xs-6 col-sm-5 col-sm-offset-1">
									<h1><?php wpautop(the_sub_field( 'typography' ),true); ?></h1>
								</div>
								<div class="icon col-xs-5 col-sm-4 col-md-3 col-sm-offset-1">
									<?php $icon = get_sub_field( 'icon' ); ?>
									<?php if ( $icon ) { ?>
										<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
									<?php } ?>
								</div>
							</div>
							<div class="scroll-arrow-indicator">&rang;</div>
						</section>
						<?php $counter++; ?>
					<?php elseif ( get_row_layout() == 'video' ) : ?>

						<section id="section<?php echo $counter ?>" class="video container-fluid">
							<div class="embed-container"><?php the_sub_field( 'video_link' ); ?></div>
						</section>
						<?php $counter++; ?>
					<?php elseif ( get_row_layout() == 'call_to_action' ) : ?>
						
						<?php if (get_sub_field('line_number') === 'multiple lines') { ?>
							<section id="section<?php echo $counter ?>" class="call-to-action container-fluid text-left">
							<div class="row">
								<div class="col-xs-12 col-sm-10 col-sm-offset-1">
								<p><?php the_sub_field( 'intro_text' ); ?></p><a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field( 'button_text' ); ?></a>
								</div>
								</div>
							</section>
						<?php } else { ?>
							<section id="section<?php echo $counter ?>" class="call-to-action container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-10 col-sm-offset-1">
								<?php the_sub_field( 'intro_text' ); ?><a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field( 'button_text' ); ?></a>
								</div>
								</div>
							</section>
						<?php } ?>
					
						<?php $counter++; ?>
					<?php elseif ( get_row_layout() == 'email_subscription_box' ) : ?>
						<section id="section<?php echo $counter ?>" class="email_subscription container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<p>Get the latest from Fervor</p>
									<?php 
									    $form_object = get_sub_field('form');
									    echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
									?>
								</div>
							</div>
						</section>
						<?php $counter++; ?>
					<?php elseif ( get_row_layout() == 'text_content' ) : ?>
						<section id="section<?php echo $counter ?>" class="text_content container-fluid <?php if (get_sub_field('layout') == 'full') { echo 'gradient-bkgd'; } ?>">
						

							<?php if (get_sub_field('layout') == 'full') {
								//no background
							} else { ?>
								<?php $background_image = get_sub_field( 'background_image' ); ?>
								<?php if ( $background_image ) { ?>
									<?php fervor_background_image($background_image,'#section'.$counter); ?>
								<?php } ?>
							<?php } ?>
							

							<?php if (get_sub_field('layout') == 'right') { ?>
									<div class="row">
										<div class="col-xs-12 col-sm-4 col-sm-push-6 col-sm-offset-1">
											<h1><?php the_sub_field( 'heading' ); ?></h1>
											<h2><?php the_sub_field( 'subheading' ); ?></h2>
											
												
												
												<?php if ( get_sub_field( 'event_optional' ) == 1 ) { 
												 	$event = get_sub_field('event'); ?>
												 	<div class="event-box">
												 	<p class="large">Join us at our next event:</p>
												 	<h3><?php echo $event->post_title; ?></h3>
												 	<small><?php echo tribe_get_start_date($event->ID); ?></small>
												 	<p><?php echo wpautop($event->post_content); ?></p>
												 	<a href="<?php echo tribe_get_event_website_url($event->ID); ?>" target="_blank">Let us know you're coming</a>
												 	</div>

												 	
											
													
												<?php } else { 
												 // do nothing; 
												} ?>

												<?php if (is_page('contact')) { ?>
														<div class="contact-details">
													 		<?php the_field('contact_details'); ?>
												 		</div>
												 	<?php } else { ?>
												 		
												 	<?php } ?>
											
										</div>
										<div class="col-xs-12 col-sm-6  col-sm-pull-4">
											<?php wpautop(the_sub_field( 'content' )); ?>
										</div>
										
									</div>
							<?php } elseif (get_sub_field('layout') == 'full') { ?>
									<div class="row">
										<div class="col-xs-12 col-sm-10 col-sm-offset-1">
											<h1><?php the_sub_field( 'heading' ); ?></h1>
											<h2><?php the_sub_field( 'subheading' ); ?></h2>
											<?php the_sub_field( 'content' ); ?>
										</div>
										
									</div>
								<?php } else { ?>
									<div class="row">
										<div class="col-xs-12 col-sm-4 col-sm-offset-1">
											<h1><?php the_sub_field( 'heading' ); ?></h1>
											<h2><?php the_sub_field( 'subheading' ); ?></h2>

											<?php if ( get_sub_field( 'event_optional' ) == 1 ) { 
												 	$event = get_sub_field('event'); ?>
												 	<div class="event-box">
												 	<p class="large">Join us at our next event:</p>
												 	<h3><?php echo $event->post_title; ?></h3>
												 	<small><?php echo tribe_get_start_date($event->ID); ?></small>
												 	<p><?php echo wpautop($event->post_content); ?></p>
												 	<a href="<?php echo tribe_get_event_website_url($event->ID); ?>" target="_blank">Let us know you're coming</a>
												 	</div>
											
													
												<?php } else { 
												 // do nothing; 
												} ?>

												<?php if (is_page('contact')) { ?>
														<div class="contact-details">
													 		<?php the_field('contact_details'); ?>
												 		</div>
												 	<?php } else { ?>
												 		
												 	<?php } ?>

										</div>
										<div class="col-xs-12 col-sm-6">
											<?php the_sub_field( 'content' ); ?>
											<?php if ( get_sub_field( 'event_optional' ) == 1 ) { 
											 // echo 'true'; 
											} else { 
											 // echo 'false'; 
											} ?>
										</div>
									</div>
								<?php } ?>
								<div class="scroll-arrow-indicator">&rang;</div>
						</section>
						<?php $counter++; ?>
					<?php elseif ( get_row_layout() == 'grid' ) : ?>
						<section id="section<?php echo $counter ?>" class="grid container-fluid">
						
							<div class="row">
								<?php $gridtype = get_sub_field( 'grid_type' );
								// Photo Gallery Grid
								if ($gridtype === 'Photo Gallery') { ?>
								
									<?php $image_gallery_images = get_sub_field( 'photo_gallery' ); ?>
									<?php if ( $image_gallery_images ) :  ?>
										
										<?php 
											$image_count = count($image_gallery_images); 
											$i = 0;
										?>
										<?php foreach ( $image_gallery_images as $image_gallery_image ): ?>
											
											<?php
												$image_array = $image_gallery_image;
												$type = $counter.'-gallery-image';
												$i++;
												$content = $image_gallery_image['caption'];
												$link_url = $image_gallery_image['url'];
												$link_text = '>>';
												fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text); ?>
										
										<?php endforeach; ?>
										<?php if ($image_count % 3 == 0) {
											//do nothing
										} elseif ($image_count % 3 == 1) { ?>
											<div class="grid__box spacer spacer--one"></div>
											<div class="grid__box spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
										<?php } elseif ($image_count % 3 == 2) { ?>
											<div class="grid__box spacer spacer--one"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
											
										<?php } ?>
										
									<?php endif; ?>
								<?php } 
								// Post type grid ?>

								<?php if ($gridtype === 'Posts, Pages or Custom Post Types') { ?>
								
								<?php $post_objects = get_sub_field( 'posts_or_pages' ); ?>
								<?php $i = 0; ?>
								
								<?php if ( $post_objects ): ?>
									<?php foreach ( $post_objects as $post ):  ?>
										<?php 
											setup_postdata( $post );
											$page = get_page_by_path( get_page_uri( $post->ID ), OBJECT, $post->post_type ); 
											$image_array = get_field('featured_image',$page->ID);
											$type = $page->post_type;
											$i++;
											if ($type === 'team_member') {
												
												$content = $post->post_content;

											} else {
												$content = $page->post_title;
											}
											
											//print_r($page);
											$link_url = $page->post_name;
											//echo $link_url;
											$link_text = $page->post_title;
											if ($type === 'team_member') {
												$meta = get_post_meta( $page->ID, 'role', true );
												$link_text .= '<br/><span class="role">'.$meta.'</span>';
											}
											fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text); ?>
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
									<?php if ($i % 3 == 0) {
											//do nothing
										} elseif ($i % 3 == 1) { ?>
											<div class="grid__box spacer spacer--one"></div>
											<div class="grid__box spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
										<?php } elseif ($i % 3 == 2) { ?>
											<div class="grid__box spacer spacer--one"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
											
										<?php } ?>

										<?php if (is_page('our-work')) { 
											$logos_count = $i - 3;
											if ($logos_count % 5 == 0) {
											//do nothing
										} elseif ($logos_count % 5 == 1) { ?>
											<div class="grid__box grid-post-client spacer spacer--one"></div>
											<div class="grid__box grid-post-client spacer spacer--one"></div>
											<div class="grid__box grid-post-client spacer spacer--one"></div>
											<div class="grid__box grid-post-client spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
										<?php } elseif ($logos_count % 5 == 2) { ?>
											<div class="grid__box grid-post-client spacer spacer--one"></div>
											<div class="grid__box grid-post-client spacer spacer--one"></div>
											<div class="grid__box grid-post-client spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
										<?php } elseif ($logos_count % 5 == 3) { ?>
											<div class="grid__box grid-post-client spacer spacer--one"></div>
											<div class="grid__box grid-post-client spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
										<?php } elseif ($logos_count % 5 == 4) { ?>
											<div class="grid__box grid-post-client spacer spacer--one"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
											
										<?php } 
										} ?>
								<?php endif; ?>

								<?php } 
								// Custom combo grid ?>

								<?php if ($gridtype === 'Custom Combination') { ?>
									
									<?php if ( have_rows( 'custom_combination_item' ) ) : ?>
										<?php while ( have_rows( 'custom_combination_item' ) ) : the_row(); ?>
											<?php
											
												$item_type = get_sub_field('item_type');
												if ($item_type === 'Image') { ?>
													
														<?php $image = get_sub_field('image'); ?>
														<?php 
														$image_array = get_sub_field('image');
														$type = 'image'.get_row_index().'-'.$counter;
														$i = get_row_index();
														$content = $image_array['caption'];
											
											
											
											$link_url = '';

											$link_text = '';
										
											fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text); ?>
													
												<?php } elseif ($item_type === 'Typography') { ?>
													<div class="grid__box grid-post-typography grid-post-typography<?php echo get_row_index(); ?>">
													<h1>
														<?php if ( have_rows( 'typography' ) ): ?>
															
															<?php while ( have_rows( 'typography' ) ) : the_row(); ?>
																
																<?php if ( get_row_layout() == 'small_text' ) : ?>
																	<?php the_sub_field( 'small_text_line' ); ?><br/>
																<?php elseif ( get_row_layout() == 'large_text' ) : ?>
																	<span data-shadow-text="<?php the_sub_field( 'large_text_line' ); ?>"><?php the_sub_field( 'large_text_line' ); ?></span><br/>

																<?php endif; ?>
															
															<?php endwhile; ?>
														<?php else: ?>
															<?php // no layouts found ?>
														<?php endif; ?>
														</h1>
													</div>
												<?php } elseif ($item_type === 'Page, Post or Custom Post Type') {
													
													$post_object = get_sub_field( 'page_post_or_custom_post_type' ); ?>
													<?php if ( $post_object ): ?>
														<?php $post = $post_object; ?>
														<?php setup_postdata( $post );  
															$page = get_page_by_path( get_page_uri( $post->ID ), OBJECT, $post->post_type ); 
															$image_array = get_field('featured_image',$page->ID);
															$type = $page->post_type;
															$i = get_row_index();
															if ($type === 'team_member') {
																
																$content = $post->post_content;

															} else {
																$content = $page->post_title;
															}
															
															//print_r($page);
															$link_url = $page->post_name;
															//echo $link_url;
															$link_text = $page->post_title;
															if ($type === 'team_member') {
																$meta = get_post_meta( $page->ID, 'role', true );
																$link_text .= '<br/><span class="role">'.$meta.'</span>';
															}
															fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text);
														wp_reset_postdata(); ?>
													<?php endif; 
												} ?>
											
										<?php endwhile; ?>

									<?php else : ?>
										<?php // no rows found ?>
									<?php endif; ?>
									<?php $i = count( get_sub_field('custom_combination_item') ); ?>
										<?php if ($i % 3 == 0) {
											//do nothing
										} elseif ($i % 3 == 1) { ?>
											<div class="grid__box spacer spacer--one"></div>
											<div class="grid__box spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
										<?php } elseif ($i % 3 == 2) { ?>
											<div class="grid__box spacer spacer--one"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
											
										<?php } ?>


								<?php } ?>	
							</div>
						</section>
						<?php $counter++; ?>
					<?php elseif ( get_row_layout() == '4_column_image_list' ) : ?>
						<section id="section<?php echo $counter ?>" class="columns-4 container-fluid">
							<div class="row">
						<?php if ( have_rows( 'column' ) ) : ?>
							<?php while ( have_rows( 'column' ) ) : the_row(); ?>
								<?php $row_index = get_row_index(); ?>
								<div class="col-xs-12 col-sm-3">
								
								<?php $image = get_sub_field( 'image' ); ?>
								<?php if ( $image ) { ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php } ?>
								<h2><?php the_sub_field( 'title' ); ?></h2>
								<?php $services_list_terms = get_sub_field( 'services_list' ); ?>
								<?php if ( $services_list_terms ): ?>
									<ul>
									<?php foreach ( $services_list_terms as $services_list_term ): ?>
										<li><?php echo $services_list_term->name; ?></li>
									<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // no rows found ?>
						<?php endif; ?>
							</div>
						</section>
					<?php $counter++; ?>
				
					<?php elseif ( get_row_layout() == '5_column_image_list' ) : ?>
						<section id="section<?php echo $counter ?>" class="columns-4 container-fluid">
							<div class="row">
						<?php if ( have_rows( 'column' ) ) : ?>
							<?php while ( have_rows( 'column' ) ) : the_row(); ?>
								<?php $row_index = get_row_index(); ?>
								<div class="col-xs-12 col-sm-3">
								
								<?php $image = get_sub_field( 'image' ); ?>
								<?php if ( $image ) { ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php } ?>
								<h2><?php the_sub_field( 'title' ); ?></h2>
								<?php $services_list_terms = get_sub_field( 'services_list' ); ?>
								<?php if ( $services_list_terms ): ?>
									<ul>
									<?php foreach ( $services_list_terms as $services_list_term ): ?>
										<li><?php echo $services_list_term->name; ?></li>
									<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // no rows found ?>
						<?php endif; ?>
							</div>
						</section>
					<?php $counter++; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php // no layouts found ?>
			<?php endif; ?>
			<?php if (is_page('contact')) { ?>
			<section id="map" class="map container-fluid">
		 		<?php 

				$location = get_field('map');

				if( !empty($location) ):
				?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
				<?php endif; ?>
	 		</section>
	 		<script>
	 		jQuery('.map').click(function(){
			  jQuery('.acf-map').css({pointerEvents:'all'});
			});
	 		</script>
		 	<?php } else { ?>
		 		
		 	<?php } ?>
				

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
