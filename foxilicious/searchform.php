<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="row mb-3 search-row">
        <div class="form-select col-auto"><?php echo create_dropdown( 'wprm_course', 'course', __( 'Gang', 'techkoningin-child' ) ); ?></div>
        <div class="form-select col-auto"><?php echo create_dropdown( 'wprm_cuisine', 'cuisine', __( 'Keuken', 'techkoningin-child' ) ); ?></div>
    </div>
    <div class="row">
        <div class="col-auto d-flex w-100">
            <label class="w-100">
                <input type="search" class="search-field form-control"
                       placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'techkoningin-base' ); ?>"
                       value="<?php echo esc_attr( get_search_query() ); ?>" name="s"
                       title="<?php _ex( 'Search for:', 'label', 'techkoningin-base' ); ?>">
            </label>
            <button type="submit" class="search-submit btn btn-primary">
				<?php echo __( 'Zoek', 'techkoningin-child' ) ?>
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>
