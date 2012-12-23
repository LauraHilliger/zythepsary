<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
			<h1 class="postsby">
						<?php if (is_category()) { ?>
							<span><?php single_cat_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
						<?php } elseif (is_tag()) { ?> 
							<span><?php single_tag_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
						<?php } elseif (is_search()) { ?> 
							<span><?php _e("Search Results for:", "mythemeshop"); ?></span> <?php the_search_query(); ?>
						<?php } elseif (is_author()) { ?>
							<span><?php _e("Author Archive", "mythemeshop"); ?></span> 

						<?php } elseif (is_day()) { ?>
							<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
						<?php } elseif (is_month()) { ?>
							<span><?php _e("Monthly Archive:", "mythemeshop"); ?>:</span> <?php the_time('F Y'); ?>
						<?php } elseif (is_year()) { ?>
							<span><?php _e("Yearly Archive:", "mythemeshop"); ?>:</span> <?php the_time('Y'); ?>
						<?php } ?>
					</h1>
					<?php if (is_author()) { ?>
						<div class="postauthor">
							<h4>Posts By : <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author')); ?>
							<?php echo $curauth->ditopay_name; ?></h4>
							<?php $curauthdes = (get_query_var('user_description')) ? get_user_by('slug', get_query_var('user_description')) : get_userdata(get_query_var('author')); ?>
							<p><?php echo $curauthdes->user_description; ?></p>
							<?php $curauthgname = (get_query_var('googlename')) ? get_user_by('slug', get_query_var('googlename')) : get_userdata(get_query_var('author'));	?>
							<?php $curauthglink = (get_query_var('googlelink')) ? get_user_by('slug', get_query_var('googlelink')) : get_userdata(get_query_var('author')); ?>
							<?php if(get_option('top_google_authorship') == 'false') { ?>
							<?php } else { ?>
							<p>Find me on Google Plus <a href="<?php echo $curauthglink->googlelink; ?>" rel="me">+<?php echo $curauthgname->googlename; ?></a></p>
							<?php } ?>
						</div>
				<?php } ?>
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
								<div class="nav-previous left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> '.'Older posts', 'mythemeshop' ) ); ?></div>
								<div class="nav-next right"><?php previous_posts_link( __( 'Newer posts'.' <span class="meta-nav">&rarr;</span>', 'mythemeshop' ) ); ?></div>
							</div>
			</div>
		</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>