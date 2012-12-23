<?php get_header(); ?>
<?php $options = get_option('accentbox'); ?>
<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
					<?php if ($options['mts_breadcrumb'] == '1') { ?>
						<div class="breadcrumb"><?php the_breadcrumb(); ?></div>
					<?php } ?>
						<header>
							<h1 class="title"><?php the_title(); ?></h1>
							<div class="post-info">
									<span class="theauthor"><?php the_author_posts_link(); ?></span>
									<time><?php the_time('F j, Y'); ?></time>
									<span class="thecategory"><?php the_category(', ') ?></span>
									<span class="thecomment"><a href="<?php comments_link(); ?>"><?php comments_number(' No comments',' 1 Comment',' % Comments'); ?></a></span>
							</div>
						</header><!--.headline_area-->
						<div class="post-content box mark-links">
							<?php the_content(); ?>
							<?php wp_link_pages('before=<div class="pagination2">&after=</div>'); ?>
							<?php if($options['mts_tags'] == '1') { ?>
							<div class="tags"><?php the_tags('<span class="tagtext">Tags:</span>','') ?> </div>
						<?php } ?>
						</div><!--.post-content box mark-links-->
<?php if($options['mts_social_buttons'] == '1') { ?>
						<div class="social">
  <div id="social-icons">
<span class="shareit">Share it!&nbsp&nbsp</span>
  <a title="Tweet this post" href="http://twitter.com/home/?status=<?php the_title(); ?>+-+<?php the_permalink(); ?>" rel="external nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" width="32" height="32" alt="Twitter" /></a>
  <a title="Digg this post" href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="external nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/digg.png" width="32" height="32" alt="RSS" /></a>
  <a title="Stumble this post" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="external nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/stumbleupon.png" width="32" height="32" alt="LinkedIn" /></a>
  <a title="Bookmark this post at Delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="external nofollow" ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/delicious.png" width="32" height="32" alt="Facebook" /></a>
  </div>
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=193109300735690&amp;xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" send="false" show_faces="false" width="320" style="margin: 1.3em 0 0 1.2em;"></fb:like>
</div>
<?php }?>
<?php if($options['mts_author_box'] == '1') { ?>
						<div class="postauthor">
<?php echo get_avatar( get_the_author_id() , 90 ); ?>
<h4>Article by <a href="<?php the_author_url(); ?>"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a></h4>
<p><?php the_author_description(); ?></p>
</div>
<?php }?>
<?php if($options['mts_related_posts'] == '1') { ?>
								<?php
								$categories = get_the_category($post->ID);
								if ($categories) {
								$category_ids = array();
								foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

								$args=array(
								'category__in' => $category_ids,
								'post__not_in' => array($post->ID),
								'showposts'=>4, // Number of related posts that will be shown.
								'caller_get_posts'=>1
								);

								$my_query = new wp_query( $args );
								if( $my_query->have_posts() ) {
								echo '<div class="related-posts"><h3>'.__('Related Posts','mythemeshop').'</h3><ul>';
								while( $my_query->have_posts() ) {
								++$counter;
								if($counter == 2) {
								$postclass = 'last';
								$counter = 0;
								} else { $postclass = ''; }
								$my_query->the_post();?>

								<li class="<?php echo $postclass; ?>">
									<a rel="nofollow" class="relatedthumb" href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
									<span class="rthumb">
										<?php if(has_post_thumbnail()): ?>
											<?php the_post_thumbnail('related', 'title='); ?>
										<?php else: ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/relthumb.png" alt="<?php the_title(); ?>"  width='180' height='120' class="wp-post-image" />
										<?php endif; ?>
									</span>
									<?php if (strlen($post->post_title) > 52) {
										echo substr(the_title($before = '', $after = '', FALSE), 0, 52) . '...'; } else {
										the_title();
									} ?>
									</a>
								</li>
								<?php
								}
								echo '</ul></div>';
								}
								}
								wp_reset_query();
								?>
							<!-- .related-posts -->
<?php }?>
					</div><!--.g post-->
					<?php comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>