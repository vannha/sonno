<?php
    //Translation Theme Option
    $spyropress_translate['search-placeholder'] = get_setting( 'translate' ) ? get_setting( 'search-placeholder', 'Search..' ) : esc_html__( 'Search..', 'sonno' );
?>
<form  method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <fieldset class="search-wrapper">
        <input type="text" name="s" class="search" placeholder="<?php echo esc_attr( $spyropress_translate['search-placeholder'] ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
    	<button type="submit" ><img src="<?php echo esc_url( assets_img( 'search.png' ) ); ?>"  /></button>
	</fieldset>
</form>
