<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _x( 'Search for:', 'label', 'codequoi-theme' ); ?></span>
        <input type="search" class="search-field border border-gray-400 rounded p-2 w-full max-w-md" placeholder="<?php echo esc_attr_x( 'Search Post...', 'placeholder', 'codequoi-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"><?php _x( 'Search', 'submit button', 'codequoi-theme' ); ?></button>
</form>
