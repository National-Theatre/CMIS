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
    jQuery('video').mediaelementplayer({
        // if the <video width> is not specified, this is the default
        defaultVideoWidth: 320,
        // if the <video height> is not specified, this is the default
        defaultVideoHeight: 240,
        // if set, overrides <video width>
        videoWidth: -1,
        // if set, overrides <video height>
        videoHeight: -1,
        // width of audio player
        audioWidth: 320,
        // height of audio player
        audioHeight: 240,
        // initial volume when the player starts
        startVolume: 0.8,
        // useful for <audio> player loops
        loop: false,
        // enables Flash and Silverlight to resize to content size
        enableAutosize: true,
        // the order of controls you want on the control bar (and other plugins below)
        features: ['playpause','progress','current','duration','tracks','volume','fullscreen'],
        // Hide controls when playing and mouse is not over the video
        alwaysShowControls: false,
        // force iPad's native controls
        iPadUseNativeControls: false,
        // force iPhone's native controls
        iPhoneUseNativeControls: false, 
        // force Android's native controls
        AndroidUseNativeControls: false,
        // forces the hour marker (##:00:00)
        alwaysShowHours: false,
        // show framecount in timecode (##:00:00:00)
        showTimecodeFrameCount: false,
        // used when showTimecodeFrameCount is set to true
        framesPerSecond: 25,
        // turns keyboard support on and off for this instance
        enableKeyboard: true,
        // when this player starts, it will pause other players
        pauseOtherPlayers: true,
        // array of keyboard commands
        keyActions: []
    });
    jQuery(".video-preview").each(function (i,d) {
        link = jQuery(d).find('a');
        vid = jQuery(d).find('.mejs-container.svg.mejs-video');
        jQuery(link).colorbox({inline:true, href:vid,innerWidth:'340px'});
    });
    
});