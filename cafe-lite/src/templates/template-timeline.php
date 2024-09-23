<?php

/**
 * View template for TimeLine widget
 *
 * @package CAFE\Templates
 * @copyright 2018 CleverSoft. All rights reserved.
 */

$cafe_content = $settings['timeline'];
$css_class = 'cafe-timeline ' . $settings['layout'];
$date_format = get_option('date_format');
$cafe_json_config = '';
if ($settings['layout'] == 'carousel') {
    wp_enqueue_script('slick');
    $css_class .= ' cafe-carousel';

    $autoplay = isset($settings['autoplay']) ? $settings['autoplay'] : 'false';
    $autoplay_tablet = isset($settings['autoplay_tablet']) ? $settings['autoplay_tablet'] : $autoplay;
    $autoplay_mobile = isset($settings['autoplay_mobile']) ? $settings['autoplay_mobile'] : $autoplay;

    $show_pag = $settings['show_pag'] ? $settings['show_pag'] : 'false';
    $show_pag_tablet = $settings['show_pag_tablet'] ? $settings['show_pag_tablet'] : $show_pag;
    $show_pag_mobile = $settings['show_pag_mobile'] ? $settings['show_pag_mobile'] : $show_pag;

    $show_nav = isset($settings['show_nav']) ? $settings['show_nav'] : 'false';
    $show_nav_tablet = isset($settings['show_nav_tablet']) ? $settings['show_nav_tablet'] : 'false';
    $show_nav_mobile = isset($settings['show_nav_mobile']) ? $settings['show_nav_mobile'] : 'false';

    $pag_arrow_left_icon = isset($settings['pag_arrow_left_icon']) ? $settings['pag_arrow_left_icon'] : 'cs-font clever-icon-arrow-left-1';
    $pag_arrow_right_icon =  isset($settings['pag_arrow_right_icon']) ? $settings['pag_arrow_right_icon'] : 'cs-font clever-icon-arrow-right-1';

    $center_mode = isset($settings['center_mode']) ? $settings['center_mode'] : 'false';
    $speed = isset($settings['speed']) ? $settings['speed'] : 3000;

    $col = isset($settings['cols']['size']) ? $settings['cols']['size'] : 1;
    $cols_tablet = isset($settings['cols_tablet']['size']) ? $settings['cols_tablet']['size'] : $col;
    $cols_mobile = isset($settings['cols_mobile']['size']) ? $settings['cols_mobile']['size'] : $col;

    $cafe_json_config        = '{
        "slides_to_show" : ' .  $col  . ',
        "slides_to_show_tablet" : ' . $cols_tablet . ',
        "slides_to_show_mobile" : ' . $cols_mobile . ',
        "speed": ' . $speed . ',
        "scroll": ' . $scroll . ',

        "autoplay": ' . $autoplay . ',
        "autoplay_tablet": ' . $autoplay_tablet . ',
        "autoplay_mobile": ' . $autoplay_mobile . ',

        "show_pag": ' . $show_pag . ',
        "show_pag_tablet": ' . $show_pag_tablet . ',
        "show_pag_mobile": ' . $show_pag_mobile . ',

        "show_nav": ' . $show_nav . ',
        "show_nav_tablet": ' . $show_nav_tablet . ',
        "show_nav_mobile": ' . $show_nav_mobile . ',
        
        "center_mode": ' . $center_mode . ',
        "arrow_left": "' . $pag_arrow_left_icon . '",
        "arrow_right": "' . $pag_arrow_right_icon . '"
    }';
}
?>
<ul class="<?php echo esc_attr($css_class) ?>" <?php if ($settings['layout'] == 'carousel') { ?> data-cafe-config='<?php echo esc_attr($cafe_json_config) ?>' <?php } ?>>
    <?php
    if ($settings['layout'] == 'carousel') {
        foreach ($cafe_content as $content) {
    ?>
            <li class="cafe-timeline-item">
                <div class="cafe-head-timeline-item">
                    <div class="cafe-timeline-date">
                        <?php
                        echo esc_html($content['date']);
                        ?>
                    </div>
                    <h3 class="cafe-timeline-title">-
                        <?php
                        echo esc_html($content['title']);
                        ?>
                    </h3>
                </div>
                <div class="cafe-timeline-description">
                    <?php
                    echo esc_html($content['des']);
                    ?>
                </div>
            </li>
        <?php
        }
    } else {
        foreach ($cafe_content as $content) {
        ?>
            <li class="cafe-timeline-item">
                <div class="cafe-timeline-date">
                    <?php
                    echo esc_html($content['date']);
                    ?>
                </div>
                <h3 class="cafe-timeline-title">
                    <?php
                    echo esc_html($content['title']);
                    ?>
                </h3>
                <div class="cafe-timeline-description">
                    <?php
                    echo esc_html($content['des']);
                    ?>
                </div>
            </li>
    <?php
        }
    }
    ?>
</ul>