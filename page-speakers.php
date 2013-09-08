<?php
/*
Template Name: Speakers
*/
?>

<?php get_header(); ?>

	<div class="row">
		<div class="twelve columns">
		
		<?php get_template_part('loop', 'page'); ?>
		
      <?php
    
        function getCategories($post = null) {
            $ID = ($post == null) ? get_the_ID() : $post->ID; 
            $post_categories = wp_get_post_categories( $ID );
            $cats = array();

            foreach($post_categories as $c){
                $cat = get_category( $c );
                $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
            }
            
            return $cats;
        }
      

        
        function getTerms($post = null) {
            $ID = ($post == null) ? get_the_ID() : $post->ID; 
            $post_terms = wp_get_post_terms( $ID );
            $terms = array();

            foreach($post_terms as $c){
                $cat = get_term( $c );
                $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
            }
            
            return $terms;   
        }
        
        function getTags($post = null) {
            $ID = ($post == null) ? get_the_ID() : $post->ID; 
            $post_tags = wp_get_post_tags( $ID );
            $tags = array();

            foreach($post_tags as $c){
                $cat = get_tag( $c );
                $tags[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
            }
            
            return $tags;   
        }
        
        
        
        function checkSpeaker($post) {
            $postCategories = getTags($post);
//            print "***";
//            print_r($postCategories);
            //$pageCategories = getCategories();
            //if(!empty($categories) && 
        }
        
        /**
        * How many years will be listed
        * (current year included)
        */
       getCategories();
        $yearRange = 3;
        

        $date = new DateTime;
        
        $terms = get_terms("tedxyycYear");
                
        foreach($terms as $term) {
            
      ?>
          

        <?php
            $newspeaker_args = array(			  		
                'post_type' => 'speakers',
                'taxonomy' => 'tedxyycYear',
                'term' => $term->slug,
                'orderby' => 'title',
                'order' => 'ASC',
                );
            $newspeaker_query = new WP_Query($newspeaker_args);
            
            /**
             * Check if there are posts! 
             */
            if($newspeaker_query->post_count > 0) {
                
        ?>
          
                <h2><?php print $term->name;?> Speakers</h2>


                <?php $i = 0; ?>
                <?php while ($newspeaker_query->have_posts()) : $newspeaker_query->the_post(); ?>
                <?php checkSpeaker($post);
                
                
                ?>
                <?php if ($i%3 == 0 && $i != 0) { echo '</ul>'; } ?>
                <?php if ($i%3 == 0) { echo '<ul class="row clearfix new">'; } ?>
                    <li class="four columns speaker">
                        <a href="<?php the_permalink(); ?>" class="speakerLink">
                        <?php the_post_thumbnail('wide_thumb', array(
                            'alt' => ''.get_the_title().'',
                            'title' => ''.get_the_title().'' 
                        )); ?>
                        </a>
                        <p><strong><?php the_title(); ?></strong><br/>
                            
                        <span><?php echo get_post_meta($post->ID, '_tedxyyc_speaker_jobposition_value', true) ?><br /> <em><?php echo get_post_meta($post->ID, '_tedxyyc_speaker_employer_value', true) ?></em></span></p>

                        <p><?php new_excerpt(300); ?></p>

                        <p><a href="<?php the_permalink(); ?>" class="readMore" >Read <?php echo get_post_meta($post->ID, '_tedxyyc_speaker_firstname_value', true) ?>'s Bio</a></p>

                    </li>
                <?php
                    $i++;
                    endwhile; // End the loop
                    echo '</ul>';
                ?>
                    
          
      <?php
            } // END OF ID post_count
            $date->sub(new DateInterval("P1Y"));
        } // END OF FOREACH
      ?>

		
		</div>
		
	</div>
	
<?php get_footer(); ?>
