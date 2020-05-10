<?php
	get_header();
?>
    
		<article class="content px-3 py-5 p-md-5">
	    
		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part('parts/content', 'archive');
				}
			}

		?>
		<?php the_posts_pagination(
			array(
				'screen_reader_text' => ' ',
				'aria_label'         => ''
			)
		); ?>
		
		<!-- <div class="nav-previous alignleft"><?php //next_posts_link( 'Older posts' ); ?></div>
		<div class="nav-next alignright"><?php //previous_posts_link( 'Newer posts' ); ?></div> -->
 
	    </article>
	   
    
<?php
	get_footer();
?>