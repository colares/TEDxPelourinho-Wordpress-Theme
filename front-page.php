				<?php get_header(); ?>
				
				<section class="flexslider row">
					<ul class="slides">
						<li>
							<a href="/event-details" title="Watch the livestream on may 25th"><img src="http://placehold.it/932x300/000000" alt="Watch the livestream on may 25th" width="932" height="300" /></a>
						</li>	
						<li>
							<a href="/event-details" title="Watch the livestream on may 25th"><img src="http://placehold.it/932x300/ffcc00" alt="Watch the livestream on may 25th" width="932" height="300" /></a>
						</li>
						<li>
							<a href="/event-details" title="Watch the livestream on may 25th"><img src="http://placehold.it/932x300/00ff00" alt="Watch the livestream on may 25th" width="932" height="300" /></a>
						</li>			
					</ul>
				</section>
				
				<section class="featuredSpeakers row">
				
					<div class="row">
						<div class="four columns">
							<h2>Palestrantes</h2>
						</div>
						<div class="eight columns">
							<p>Our 2012 committee has been hard at work curating a list of speakers that we think will educate, inspire, and motivate. Take a peek at our 2012 speaker lineup to date. <a href="/speakers" class="readMore">Veja nosso histórico de palestrantes.</a></p>
						</div>
					</div>
					<?php
						$args = array(			  		
			  				'post_type' => 'speakers',
			  				'taxonomy' => 'tedxyycYear',
			  				'term' => $roots_options['tedx_event_main_term'],
			  				'posts_per_page' => -1,
			  				'orderby' => 'title',
			  				'order' => 'ASC'
							);
						query_posts($args);
					?>

					<?php /* Start loop */ ?>
					<ul class="row clearfix">
					<?php while (have_posts()) : the_post(); ?>
						<li class="four columns">
							<a href="<?php the_permalink(); ?>" class="speakerLink">
								<?php the_post_thumbnail('wide_thumb', array(
									'alt' => ''.get_the_title().'',
									'title' => ''.get_the_title().'' 
								)); ?>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
					<?php endwhile; // End the loop ?>
					</ul>
					<?php wp_reset_query(); ?>
					
					<a href="/speakers" class="sectionCTA row">veja todos os palestrandes do <span class="tedx">TEDx</span><span class="yyc"><?php print $roots_options['tedx_event_name'];?></span></a>
				
				</section>
									
				<section class="recentNews row">
				
					<h2>Blog</h2>
					
					<?php
						$args = array(
			  				'posts_per_page' => 3
//                      ,
//			  				'year' => '2012'
							);
						query_posts($args);
					?>
					
					<div class="row">
						<?php while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" class="four columns">
							<header>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p>Posted on: <?php the_time('F jS, Y') ?></p>
							</header>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="readMore">Read More</a>
						</article>
						<?php endwhile; // End the loop ?>
						<?php wp_reset_query(); ?>
					</div>
					
					<a href="/news" class="sectionCTA row">leia as novidades do <span class="tedx">TEDx</span><span class="yyc"><?php print $roots_options['tedx_event_name'];?></span></a>
					
				</section>
				
				<section class="videoPicks row">
					
					<div class="row">
				
						<div class="three columns">
							<h2>Grandes vídeos do TED</h2>
							<p>We are big supporters of sharing and collaboration, and want to know where you get your inspiration. <a href="mailto:info@tedxyyc.com?subject=TED Video Pick Suggestion&body=Here's my TED Video Pick suggestion and why…" class="readMore">Submit your favourite TED talk.</a></p>
						</div>
						
						<?php
						$args = array(
							'post_type' => 'videopick',
			  				'posts_per_page' => 3
							);
						query_posts($args);
						?>
						<?php while (have_posts()) : the_post(); ?>
						<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="videoPick three columns">
							<?php the_post_thumbnail('video_thumb', array(
									'alt' => ''.get_the_title().'',
									'title' => ''.get_the_title().'' 
								)); ?>
							<h3><?php the_title(); ?></h3>
						</a>
						<?php endwhile; // End the loop ?>
						<?php wp_reset_query(); ?>
					
					</div>
					
					<a href="/ted-video-picks/" class="sectionCTA row">veja todas as palestras favoritvas do<span class="tedx">TED</span></a>
					
				</section>
				
				<section class="whatisTED row">
				
					<h2>What is TEDx?</h2>
					<p>In the spirit of ideas worth spreading, TED has created a program called TEDx. TEDx is a program of local, self-organized events that bring people together to share a TED-like experience. Our event is called TEDx<?php print $roots_options['tedx_event_name'];?>, where x = independently organized TED event. At our TEDx<?php print $roots_options['tedx_event_name'];?> event, TEDTalks video and live speakers will combine to spark deep discussion and connection in a small group. The TED Conference provides general guidance for the TEDx program, but individual TEDx events, including ours, are self-organized. <a href="/about" class="readMore">Leia mais sobre TEDx<?php print $roots_options['tedx_event_name'];?>.</a></p>
					
					<a href="http://www.ted.com/tedx" class="sectionCTA row">leia mais sobre o programa <span class="tedx">TEDx</span></a>
					
				</section>

				<?php get_footer(); ?>