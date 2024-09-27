<?php
/**
 * Template search forms Parts
 *
 */

?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php echo esc_attr_x('Search for: ', 'label', 'movaone'); ?></label>
        <input type="text" placeholder="<?php echo esc_attr_x('Search &hellip;','placeholder', 'movaone'); ?>"
            value="<?php the_search_query(); ?>" name="s" id="s" />
        <input type="submit" id="searchSubmit"
            value="<?php echo esc_attr_x('Search', 'submit button', 'movaone'); ?>" />
    </div>
</form>