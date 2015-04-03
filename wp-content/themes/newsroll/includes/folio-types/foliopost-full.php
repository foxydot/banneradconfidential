<?php
					$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
					$large_image = $large_image[0]; 
					$another_image_1 = get_post_meta($post->ID, 'pov_image_1_url', true);
					$video_input = get_post_meta($post->ID, 'pov_video_url', true);
?>
            <li id="post-<?php the_ID(); ?>" class="centerthreecol item_full">
                
                
							<?php if ( has_post_thumbnail()) : ?>
                                 <a href="<?php echo $url; ?>" rel="lightbox[set1 <?php echo $size; ?>]" title="<?php echo $title; ?>">
                                 <?php the_post_thumbnail('folio-thumb'); ?>
                                 </a>
                            <?php endif; ?>
                
                 
                        	<div class="clear"></div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                            <?php
                            echo '<div class="taggs">';
                            $terms_of_post = get_the_term_list( $post->ID, 'specifics', '',' &bull; ', ' ', '' );
                            echo $terms_of_post;
                            echo '</div>';
                            ?>
                            <p><?php echo pov_excerpt( get_the_excerpt(), '115'); ?></p>
                            
                            <?php if($project_url) : ?>
							<a class="mainbutton" href="<?php echo $project_url; ?>"><?php _e('Visit Project','themnific');?> 	&#43;</a>
							<?php endif; ?>
                    
                    
                    
            </li><!-- #post-<?php the_ID(); ?> -->



	