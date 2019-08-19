(function($) {
    'use strict';
// Portfolio
	$(window).load(function() {
	  "use strict";
	   var $container = $('.masonry');
    	$container.isotope({
    		itemSelector : '.masonry .grid-item',
    		layoutMode: 'masonry',
    		transitionDuration: '0.6s'
    	});
	    var $optionSets = $('.filter-items'),
            $optionLinks = $optionSets.find('a');
        	$optionLinks.click(function(){
        		var $this = $(this);
        		// don't proceed if already selected
        		if ( $this.hasClass('active') ) {
        			return false;
        		}
        		var $optionSet = $this.parents('.filter-items');
        		$optionSet.find('.active').removeClass('active');
        		$this.addClass('active');
        	    // make option object dynamically, i.e. { filter: '.my-filter-class' }
     	        var options = {},
        		key = $optionSet.attr('data-option-key'),
        		value = $this.attr('data-filter');
        		
        	   // parse 'false' as false boolean
        	   value = value === 'false' ? false : value;
        	   options[ key ] = value;
        		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            		changeLayoutMode( $this, options );
            	} else {
            		// otherwise, apply new options
            		$container.isotope( options );
            	}    
            	return false;
        	});
      });

})(jQuery);