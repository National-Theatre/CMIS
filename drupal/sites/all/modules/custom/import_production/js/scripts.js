/* 
 * @copyright The Royal National Theatre
 * @author John-Paul Drawneek <jdrawneek@nationaltheatre.org.uk>
 */
jQuery(document).ready(function() {
    jQuery('#page-content').masonry({
        // options
        itemSelector : '.grid-wrapper',
        columnWidth : 345
    });
});