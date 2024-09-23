<?php
/**
 * View template for Clever Icon widget
 *
 * @package CAFE\Templates
 * @copyright 2018 CleverSoft. All rights reserved.
 */

if ($settings['target_id'] != '') {
	$allow_html = array(
        'i' => array(
            'class' => array(),
        )
    );
    if ($settings['icon'] != 'font-icon') {
        $icon = '<i class="icon-' . $settings['icon'] . '"></i>';
    } else {
        $icon = '<i class="' . $settings['font_icon'] . '"></i>';
    }
    ?>
    <div class="cafe-wrap-single-scroll-button">
        <?php
        // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
        printf('<a class="cafe-single-scroll-button" href="%s"><span class="bg-box"><i class="edge-left"></i></span><span class="cafe-scroll-icon %s">%s</span></a>', esc_html($settings['target_id']), esc_html($settings['button_animation']), wp_kses($icon, $allow_html));
        ?>
    </div>
    <?php
}