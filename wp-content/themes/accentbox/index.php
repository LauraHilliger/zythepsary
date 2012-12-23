<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="post excerpt <?php echo (++$j % 3 == 0) ? 'last' : ''; ?>">
							<header>
							<div class="bubble"><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></div>
								<h2 class="title">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h2>
								<div class="post-info">
									<span class="theauthor"><?php the_author_posts_link(); ?></span>
									<time><?php the_time('F j, Y'); ?></time>
									<span class="thecategory"><?php the_category(', ') ?></span>
								</div>
							</header><!--.header-->
							<div class="post-content image-caption-format-1">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
								<?php if ( has_post_thumbnail() ) { ?> 
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
								<?php } ?>
							</a>
								<?php the_excerpt();?>
<p class="more"><a href="<?php the_permalink() ?>">Read More…</a>
							</p>
							</div>
						</div><!--.post excerpt-->
					<?php endwhile; else: ?>
						<div class="post excerpt">
							<div class="no-results">
								<p><strong><?php _e('There has been an error.', 'mythemeshop'); ?></strong></p>
								<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></p>
								<?php get_search_form(); ?>
							</div><!--noResults-->
						</div>
					<?php endif; ?>
							<div class="pnavigation2">
								<div class="nav-previous left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> '.'Older posts', 'twentyten' ) ); ?></div>
								<div class="nav-next right"><?php previous_posts_link( __( 'Newer posts'.' <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
							</div>

			</div>
		</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>