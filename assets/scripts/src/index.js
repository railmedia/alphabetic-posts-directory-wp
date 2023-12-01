import $ from 'jquery';

(function($){
    
    const AlphabeticPostsDir = {
        onLetterClick: letterDiv => {
            
            letterDiv.addClass('active');

            if( ! jQuery('#alphabetic-posts-clear').length ) {
                jQuery('.alphabetic-posts-dir-nav').after('<p id="alphabetic-posts-clear">Clear filter</p>');
            }

            let letter = letterDiv.data('letter');
            
            jQuery('.alphabetic-posts-dir .letter').hide();
            jQuery('.alphabetic-posts-dir .letter[data-letter="' + letter +'"]').show();

        },
        onLettersClear: () => {

            jQuery('.alphabetic-posts-dir-nav .letter').removeClass('active');
            jQuery('.alphabetic-posts-dir .letter').show();
            jQuery('#alphabetic-posts-clear').remove();

        }
    }

    jQuery('document').ready(function(){

        jQuery('.alphabetic-posts-dir-nav .letter').on('click', function(evt){
            evt.preventDefault();
            AlphabeticPostsDir.onLetterClick( jQuery(this) );
        });

        jQuery('body').on('click', '#alphabetic-posts-clear', function(evt){
            evt.preventDefault();
            AlphabeticPostsDir.onLettersClear( jQuery(this) );
        });

    });

})(jQuery);