<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'techkoningin-base' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'techkoningin-base' ); ?>">
    </label>
    <button type="submit" class="search-submit btn btn-primary">
        <i class="fa fa-search"></i>
    </button>
</form>



