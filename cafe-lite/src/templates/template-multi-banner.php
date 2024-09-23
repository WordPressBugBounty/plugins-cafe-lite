<?php

/**
 * View template for Clever Banner widget
 *
 * @package CAFE\Templates
 * @copyright 2018 CleverSoft. All rights reserved.
 */

use Elementor\Utils;

$cafe_wrap_class = '';
$cafe_json_config = '';
$columns = isset($settings['columns']['size']) ? $settings['columns']['size'] : 1;
$columns_tablet = isset($settings['columns_tablet']['size']) ? $settings['columns_tablet']['size'] : $columns;
$columns_mobile = isset($settings['columns_mobile']['size']) ? $settings['columns_mobile']['size'] : $columns;
if ($settings['layout'] == 'grid') {
    $grid_class = 'grid-layout';
    $grid_class .= ' cafe-wrap  cafe-grid-lg-' . $columns . '-cols cafe-grid-md-' . $columns_tablet . '-cols cafe-grid-' . $columns_mobile . '-cols';
    $cafe_wrap_class .= $grid_class;
}
if ($settings['layout'] == 'masonry') {
    wp_enqueue_script('isotope');
    $grid_class = 'masonry-layout';
    $grid_class .= ' cafe-wrap  cafe-grid-lg-' . $columns . '-cols cafe-grid-md-' . $columns_tablet . '-cols cafe-grid-' . $columns_mobile . '-cols';
    $cafe_wrap_class .= $grid_class;
}
if ($settings['layout'] == 'carousel') {
    $cafe_wrap_class .= 'grid-layout carousel';
    $cafe_wrap_class .= ' ' . $settings['nav_position'];
    $cafe_wrap_class .= ' cafe-carousel cafe-wrap';

    $slides_to_show = isset($settings['slides_to_show']['size']) ? $settings['slides_to_show']['size'] : 'false';
    $slides_to_show_tablet = isset($settings['slides_to_show_tablet']['size']) ? $settings['slides_to_show_tablet']['size'] : $slides_to_show;
    $slides_to_show_mobile = isset($settings['slides_to_show_mobile']['size']) ? $settings['slides_to_show_mobile']['size'] : $slides_to_show;


    $autoplay = isset($settings['autoplay']) ? $settings['autoplay'] : 'false';
    $autoplay_tablet = isset($settings['autoplay_tablet']) ? $settings['autoplay_tablet'] : $autoplay;
    $autoplay_mobile = isset($settings['autoplay_mobile']) ? $settings['autoplay_mobile'] : $autoplay;

    $show_pag = isset($settings['show_pag']) ? $settings['show_pag'] : 'false';
    $show_pag_tablet = isset($settings['show_pag_tablet']) ? $settings['show_pag_tablet'] :  $show_pag;
    $show_pag_mobile = isset($settings['show_pag_mobile']) ? $settings['show_pag_mobile'] :  $show_pag;

    $show_nav = isset($settings['show_nav']) ? $settings['show_nav'] : 'false';
    $show_nav_tablet = isset($settings['show_nav_tablet']) ? $settings['show_nav_tablet'] : 'false';
    $show_nav_mobile = isset($settings['show_nav_mobile']) ? $settings['show_nav_mobile'] : 'false';
    $speed = isset($settings['speed']) ? $settings['speed'] : 3000;
    $cafe_json_config = '{
        "slides_to_show" : ' . $slides_to_show . ',
        "slides_to_show_tablet" : ' . $slides_to_show_tablet . ',
        "slides_to_show_mobile" : ' . $slides_to_show_mobile . ',


        "speed": ' . $speed . ',
        "scroll": ' . $settings['scroll'] . ',

        "autoplay": ' . $autoplay . ',
        "autoplay_tablet": ' . $autoplay_tablet . ',
        "autoplay_mobile": ' . $autoplay_mobile . ',

        "show_pag": ' . $show_pag . ',
        "show_pag_tablet": ' . $show_pag_tablet . ',
        "show_pag_mobile": ' . $show_pag_mobile . ',

        "show_nav": ' . $show_nav . ',
        "show_nav_tablet": ' . $show_nav_tablet . ',
        "show_nav_mobile": ' . $show_nav_mobile . ',
        "arrow_left": "' . $settings['arrow_left_icon'] . '",
        "arrow_right": "' . $settings['arrow_right_icon'] . '",

        "wrap": ".cafe-row"
    }';
};
$allow_html = array(
    'a' => array(
        'class' => array(),
        'href' => array(),
        'rel' => array(),
        'target' => array(),
    ),
    'i' => array(
        'class' => array(),
    )
); 

?>
<div class="<?php echo esc_attr($cafe_wrap_class) ?> " data-cafe-config='<?php echo esc_attr($cafe_json_config) ?>'>
    <div class="cafe-row">
        <?php
        $css_class = 'cafe-banner cafe-col ';
        if ($settings['overlay_banner'] == 'true') {
            $css_class .= $settings['effect'] . ' cafe-overlay-content cafe-col';
        }
        $css_class .= $settings['css_class'];

        $repeater = $settings['repeater'];

        if ($repeater && is_array($repeater)) {
            foreach ($repeater as $value) { ?>
                <?php
                $open_link = '';
                $close_link = '';
                if ($value['link']['url'] != '') {
                    $open_link = '<a href="' . esc_url($value['link']['url']) . '"';
                    $open_link .= $value['link']['is_external'] == 'on' ? 'target="_blank"' : '';
                    $open_link .= $value['link']['nofollow'] == 'on' ? 'rel="nofollow"' : '';
                    $open_link .= '>';
                    $close_link = '</a>';
                }
                ?>
                <div class="<?php echo esc_attr($css_class) ?>">
                    <?php
                    echo wp_kses($open_link, $allow_html);
                    ?>
                    <div class="cafe-wrap-image">
                        <img src="<?php echo esc_url($value['image']['url']) ?>" />
                    </div>
                    <div class="cafe-wrap-content">
                        <div class="cafe-wrap-content-inner">
                            <?php
                            if ($value['title']) {
                                printf('<%s %s>%s</%s>', esc_attr(Utils::validate_html_tag($value['title_tag'])), wp_kses_post($this->get_render_attribute_string('title')), esc_html($value['title']), wp_kses_post(Utils::validate_html_tag($value['title_tag'])));
                            }
                            ?>
                            <div class="cafe-wrap-extend-content">
                                <?php
                                if ($value['des']) {
                                    printf('<div %s>%s</div>', wp_kses_post($this->get_render_attribute_string('des')), wp_kses_post($value['des']));
                                }
                                $icon_left = '';
                                $icon_right = '';
                                if ($value['button_label'] != '') {
                                    if ($value['button_icon'] != '') {
                                        if ($value['button_icon_pos'] == 'before') {
                                            $icon_left = '<i class="' . $value['button_icon'] . '"></i>';
                                        } else {
                                            $icon_right = '<i class="' . $value['button_icon'] . '"></i>';
                                        }
                                    }
                                    if ($value['button_label']) {
                                        printf('<span %s>%s %s %s</span>', wp_kses_post($this->get_render_attribute_string('button_label')), wp_kses($icon_left, $allow_html), esc_html($value['button_label']), wp_kses($icon_right, $allow_html));
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo wp_kses($close_link, $allow_html);
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>