
    <div class="columns five">
    	<form action="<?php echo home_url( '/' ); ?>" method="get">
	      <div class="eight mobile-three columns">
	        <input type="text" id="search" placeholder="Search" name="s" value="<?php the_search_query(); ?>" />
	      </div>
	      <div class="four mobile-one columns">
	        <button type="submit" id="search-button" class="postfix button">Search</a>
	      </div>
  		</form>
    </div>
