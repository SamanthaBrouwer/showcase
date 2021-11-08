<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="search-field">Zoeken</label>
  <input type="search" id="search-field" class="search-field form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'techkoningin-base' ); ?>">
  <button type="submit" class="search-submit btn btn-primary">
    <i class="fa fa-search"></i>
  </button>
</form>