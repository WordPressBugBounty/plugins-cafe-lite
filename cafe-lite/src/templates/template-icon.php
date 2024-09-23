<?php
/**
 * View template for Clever Icon widget
 *
 * @package CAFE\Templates
 * @copyright 2018 CleverSoft. All rights reserved.
 */

$open_link = '';
$close_link = '';
$url = '#';
$target = '';
$follow = '';
if ($settings['icon'] != '') {
    $allow_html = array(
        'i' => array(
            'class' => array(),
        )
    );
    $icon = '<i class="' . $settings['icon'] . '"></i>';

    if ($settings['link']['url'] != '') {
        $url = $settings['link']['url'];
        $target = $settings['link']['is_external'] == 'on' ? 'target="_blank"' : '';
        $follow = $settings['link']['nofollow'] == 'on' ? 'rel="nofollow"' : '';
        printf('<a href="%s" %s %s>', esc_url($url), wp_kses_post($target), wp_kses_post($follow));
    }
    if ($icon) {
        printf('<span class="cafe-icon">%s</span>', wp_kses($icon, $allow_html));
    }
    if ($settings['title']) {
        printf('<h3 %s>%s</h3>', wp_kses_post($this->get_render_attribute_string('title')), esc_html($settings['title']));
    }
    if ($settings['des']) {
        printf('<p %s>%s</p>', wp_kses_post($this->get_render_attribute_string('des')), esc_html($settings['des']));
    }
    if ($settings['link']['url'] != '') {
        ?>
        </a>
        <?php
    }
}
