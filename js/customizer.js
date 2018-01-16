/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready( function() {
//Enable Disable Switch Control
    jQuery('body').on('click', '.enable-disable-switch', function () {
        var $this = jQuery(this);
        if ($this.hasClass('switch-enable')) {
            jQuery(this).removeClass('switch-enable');
            $this.next('input').val('disable').trigger('change')
        } else {
            jQuery(this).addClass('switch-enable');
            $this.next('input').val('enable').trigger('change')
        }
    });

});