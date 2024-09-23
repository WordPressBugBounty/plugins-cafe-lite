<?php

/**
 * View template for Testimonial widget
 *
 * @package CAFE\Templates
 * @copyright 2018 CleverSoft. All rights reserved.
 */

if ($settings['content'] != ''):
    $layout = $settings['layout'];
    $css_class = 'cafe-testimonial';
    $css_class .= ' ' . $layout . '-layout';
    $css_class .= ' ' . $settings['style'];
    $data_config = '';
    $autoplay_speed = $settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
    $cafe_json_config = '';
    if ($layout == 'grid') {
        $columns = isset($settings['columns']['size']) ? $settings['columns']['size'] : 1;
        $columns_tablet = isset($settings['columns_tablet']['size']) ? $settings['columns_tablet']['size'] : $columns;
        $columns_mobile = isset($settings['columns_mobile']['size']) ? $settings['columns_mobile']['size'] : $columns;
        $css_class .= '  cafe-grid-lg-' . $columns . '-cols cafe-grid-md-' . $columns_tablet . '-cols cafe-grid-' . $columns_mobile . '-cols';
    } else {
        $slides_to_show = isset($settings['slides_to_show']['size']) ? $settings['slides_to_show']['size'] : 1;
        $slides_to_show_tablet = isset($settings['slides_to_show_tablet']['size']) ? $settings['slides_to_show_tablet']['size'] : $slides_to_show;
        $slides_to_show_mobile = isset($settings['slides_to_show_mobile']['size']) ? $settings['slides_to_show_mobile']['size'] : $slides_to_show;

        $css_class .= '  cafe-grid-lg-' . $slides_to_show . '-cols cafe-grid-md-' . $slides_to_show_tablet . '-cols cafe-grid-' . $slides_to_show_mobile . '-cols';
        $settings['autoplay'] = isset($settings['autoplay']) ? $settings['autoplay'] : 'false';
        $settings['autoplay_tablet'] = isset($settings['autoplay_tablet']) ? $settings['autoplay_tablet'] : $settings['autoplay'];
        $settings['autoplay_mobile'] = isset($settings['autoplay_mobile']) ? $settings['autoplay_mobile'] : $settings['autoplay'];

        $settings['show_pag'] = isset($settings['show_pag']) ? $settings['show_pag'] : 'false';
        $settings['show_pag_tablet'] = isset($settings['show_pag_tablet']) ? $settings['show_pag_tablet'] : $settings['show_pag'];
        $settings['show_pag_mobile'] = isset($settings['show_pag_mobile']) ? $settings['show_pag_mobile'] : $settings['show_pag'];

        $settings['show_nav'] = isset($settings['show_nav']) ? $settings['show_nav'] : 'false';
        $settings['show_nav_tablet'] = isset($settings['show_nav_tablet']) ? $settings['show_nav_tablet'] : $settings['show_nav'];
        $settings['show_nav_mobile'] = isset($settings['show_nav_mobile']) ? $settings['show_nav_mobile'] : $settings['show_nav'];
        $settings['speed'] = isset($settings['speed']) ? $settings['speed'] : 3000;


        $cafe_json_config = '{
            "slides_to_show" : ' . $slides_to_show . ',
            "slides_to_show_tablet" : ' . $slides_to_show_tablet . ',
            "slides_to_show_mobile" : ' . $slides_to_show_mobile . ',
            "speed": ' . $settings['speed'] . ',
            "scroll": ' . $settings['scroll'] . ',
            "autoplay": ' . $settings['autoplay'] . ',
            "autoplay_tablet": ' . $settings['autoplay_tablet'] . ',
            "autoplay_mobile": ' . $settings['autoplay_mobile'] . ',
            "show_pag": ' . $settings['show_pag'] . ',
            "show_pag_tablet": ' . $settings['show_pag_tablet'] . ',
            "show_pag_mobile": ' . $settings['show_pag_mobile'] . ',
            "show_nav": ' . $settings['show_nav'] . ',
            "show_nav_tablet": ' . $settings['show_nav_tablet'] . ',
            "show_nav_mobile": ' . $settings['show_nav_mobile'] . ',
            "wrap": ".cafe-row"
        }';
        $css_class .= ' cafe-carousel';
        $css_class .= ' nav-position-' . $settings['slider_nav_pos'];
    }
    $css_class .= ' ' . $settings['css_class'];
    $quote = '';
    if ($settings['show_quotation'] == 'true') {
        $quote = '<span class="cafe-quotation"><i class="cs-font clever-icon-quote-1"></i></span>';
    }
    ?>
    <div class="<?php echo esc_attr($css_class) ?>" <?php if ($cafe_json_config != '') { ?>data-cafe-config='<?php echo esc_attr($cafe_json_config); ?>' <?php } ?>>
        <div class="cafe-row">
            <?php
            if ($settings['style'] == 'default' || $settings['style'] == 'style-2') {

                foreach ($settings['content'] as $content):
                    ?>
                    <article class="cafe-testimonial-item cafe-col <?php echo esc_attr('cafe-testimonial-' . $content['_id']) ?>">
                        <div class="cafe-wrap-content">
                            <?php
                            // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                            echo $quote; ?>
                            <div class="cafe-testimonial-content">
                                <?php echo wp_kses_post($content['testimonial_content']);
                                if ($settings['show_star'] == 'true') {
                                    ?>
                                    <div class="cafe-testimonial-rate">
                                        <span class="cafe-rate-star stars-<?php echo esc_attr($content['star']['size']) ?>"></span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="cafe-wrap-testimonial-info">
                                <?php
                                $ava = $content['author_avatar'];
                                if ($ava['url'] != '' && $settings['show_avatar'] == 'true') {
                                    ?>
                                    <div class="cafe-wrap-avatar">
                                        <img src="<?php echo esc_url($ava['url']); ?>" alt="<?php $content['author']; ?>"
                                            class="cafe-testimonial-avatar" />
                                    </div>
                                <?php } ?>
                                <div class="cafe-wrap-author-info">
                                    <?php
                                    if ($content['author'] != '') { ?>
                                        <h4 class="cafe-testimonial-author"><?php
                                        echo esc_html($content['author']); ?>
                                        </h4>
                                    <?php } ?>
                                    <?php
                                    if ($content['author_des'] != '' && $settings['show_des'] == 'true') { ?>
                                        <div class="cafe-testimonial-des"><?php
                                        echo esc_html($content['author_des']); ?>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                endforeach;
            }
            if ($settings['style'] == 'style-1') {
                foreach ($settings['content'] as $content):
                    ?>
                    <article class="cafe-testimonial-item cafe-col <?php echo esc_attr('cafe-testimonial-' . $content['_id']) ?>">
                        <div class="cafe-wrap-content">
                            <div class="cafe-testimonial-content">
                                <?php echo wp_kses_post($content['testimonial_content']);
                                if ($settings['show_star'] == 'true') {
                                    ?>
                                    <div class="cafe-testimonial-rate">
                                        <span class="cafe-rate-star stars-<?php echo esc_attr($content['star']['size']) ?>"></span>
                                    </div>
                                    <?php
                                }
                                // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                                echo $quote;
                                ?>
                            </div>
                            <div class="cafe-wrap-testimonial-info">
                                <?php
                                $ava = $content['author_avatar'];
                                if ($ava['url'] != '' && $settings['show_avatar'] == 'true') {
                                    ?>
                                    <div class="cafe-wrap-avatar">
                                        <img src="<?php echo esc_url($ava['url']); ?>" alt="<?php $content['author']; ?>"
                                            class="cafe-testimonial-avatar" />
                                    </div>
                                <?php } ?>
                                <div class="cafe-wrap-author-info">
                                    <?php
                                    if ($content['author'] != '') { ?>
                                        <h4 class="cafe-testimonial-author"><?php
                                        echo esc_html($content['author']); ?>
                                        </h4>
                                    <?php } ?>
                                    <?php
                                    if ($content['author_des'] != '' && $settings['show_des'] == 'true') { ?>
                                        <div class="cafe-testimonial-des"><?php
                                        echo esc_html($content['author_des']); ?>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                endforeach;
            }
            if ($settings['style'] == 'style-3') {
                foreach ($settings['content'] as $content):
                    ?>
                    <article class="cafe-testimonial-item cafe-col <?php echo esc_attr('cafe-testimonial-' . $content['_id']) ?>">
                        <div class="cafe-wrap-content">
                            <div class="cafe-wrap-testimonial-info">
                                <?php
                                $ava = $content['author_avatar'];
                                if ($ava['url'] != '' && $settings['show_avatar'] == 'true') {
                                    ?>
                                    <div class="cafe-wrap-avatar">
                                        <img src="<?php echo esc_url($ava['url']); ?>" alt="<?php $content['author']; ?>"
                                            class="cafe-testimonial-avatar" />
                                    </div>
                                <?php } ?>
                                <div class="cafe-wrap-author-info">
                                    <?php
                                    if ($content['author'] != '') { ?>
                                        <h4 class="cafe-testimonial-author"><?php
                                        echo esc_html($content['author']); ?>
                                        </h4>
                                    <?php } ?>
                                    <?php
                                    if ($content['author_des'] != '' && $settings['show_des'] == 'true') { ?>
                                        <div class="cafe-testimonial-des"><?php
                                        echo esc_html($content['author_des']); ?>
                                        </div>
                                        <?php
                                    } ?>
                                    <?php if ($settings['show_star'] == 'true') { ?>
                                        <div class="cafe-testimonial-rate">
                                            <span class="cafe-rate-star stars-<?php echo esc_attr($content['star']['size']) ?>"></span>
                                        </div>
                                        <?php
                                    }
                                    // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                                    echo $quote; ?>
                                </div>
                            </div>
                            <div class="cafe-testimonial-content">
                                <?php echo wp_kses_post($content['testimonial_content']); ?>
                            </div>

                        </div>
                    </article>
                    <?php
                endforeach;
            }
            ?>
        </div>
    </div>
    <?php
endif;
