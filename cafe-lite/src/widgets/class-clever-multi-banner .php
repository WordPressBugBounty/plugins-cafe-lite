<?php

namespace Cafe\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * CleverMultiBanner
 *
 * @author CleverSoft <hello.cleversoft@gmail.com>
 * @package CAFE
 */
final class CleverMultiBanner extends CleverWidgetBase
{
    /**
     * @return string
     */
    function get_name()
    {
        return 'clever-multi-banner';
    }

    /**
     * @return string
     */
    function get_title()
    {
        return __('CAFE Multi Banner', 'cafe-lite');
    }

    /**
     * @return string
     */
    function get_icon()
    {
        return 'cs-font clever-icon-news-grid';
    }

    /**
     * Register controls
     */
    protected function register_controls()
    {


        $this->start_controls_section(
            'content_settings',
            [
                'label' => __('Multi Banners', 'cafe-lite')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('image', [
            'label' => __('Upload Image', 'cafe-lite'),
            'description' => __('Select an image for the banner.', 'cafe-lite'),
            'type' => Controls_Manager::MEDIA,
            'dynamic' => ['active' => true],
            'show_external' => true,
            'default' => [
                'url' => CAFE_URI . '/assets/img/banner-placeholder.png'
            ]
        ]);
        $repeater->add_control('link', [
            'label' => __('Link', 'cafe-lite'),
            'type' => Controls_Manager::URL,
            'description' => __('Redirect link when click to banner.', 'cafe-lite'),
        ]);
        $repeater->add_control('title', [
            'label' => __('Title', 'cafe-lite'),
            'placeholder' => __('What is the title of this banner.', 'cafe-lite'),
            'description' => __('What is the title of this banner.', 'cafe-lite'),
            'type' => Controls_Manager::TEXT,
            'dynamic' => ['active' => true],
            'default' => __('CAFE Multi Banner', 'cafe-lite'),
            'label_block' => false
        ]);
        $repeater->add_control('title_tag', [
            'label' => __('HTML Tag', 'cafe-lite'),
            'description' => __('Select a heading tag for the title. Headings are defined with H1 to H6 tags.', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'h3',
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'p'  => 'P'
            ],
            'label_block' => true,
        ]);
        $repeater->add_control('des', [
            'label' => __('Description', 'cafe-lite'),
            'description' => __('Give a description to this banner.', 'cafe-lite'),
            'type' => Controls_Manager::WYSIWYG,
            'dynamic' => ['active' => true],
            'default' => __('A web banner or banner ad is a form of advertising. It is intended to attract traffic to a website by linking to the website of the advertiser. - Wikipedia', 'cafe-lite'),
            'label_block' => true
        ]);
        $repeater->add_control('button_label', [
            'label' => __('Button Label', 'cafe-lite'),
            'placeholder' => __('Button', 'cafe-lite'),
            'description' => __('Leave it blank if don\'t use it', 'cafe-lite'),
            'type' => Controls_Manager::TEXT,
            'dynamic' => ['active' => true],
            'default' => __('Button', 'cafe-lite'),
            'label_block' => false
        ]);
        $repeater->add_control('button_icon', [
            'label' => __('Icon', 'cafe-lite'),
            'type' => 'clevericon'
        ]);
        $repeater->add_control('button_icon_pos', [
            'label' => __('Icon position', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'after',
            'options' => [
                'before' => __('Before', 'cafe-lite'),
                'after' => __('After', 'cafe-lite'),
            ]
        ]);
        $repeater->add_control('button_style', [
            'label' => __('Button style', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'normal' => __('Normal', 'cafe-lite'),
                'underline' => __('Underline', 'cafe-lite'),
                'outline' => __('Outline', 'cafe-lite'),
            ]
        ]);
        $this->add_control('repeater', [
            'label' => __('Add Banner', 'cafe-lite'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'section_setting',
            [
                'label' => __('Setting', 'cafe-lite')
            ]
        );

        $this->add_control('layout', [
            'label'         => __('Layout', 'cafe-lite'),

            'type'          => Controls_Manager::SELECT,
            'default'       => 'carousel',
            'options' => [
                'carousel' => __('Carousel', 'cafe-lite'),
                'grid'  => __('Grid', 'cafe-lite'),
                'masonry'  => __('Masonry', 'cafe-lite'),
            ],
        ]);
        // Grid
        $this->add_control('columns', [
            'label'         => __('Columns for row', 'cafe-lite'),
            'type'          => Controls_Manager::SLIDER,
            'range' => [
                'col' => [
                    'min' => 1,
                    'max' => 6,
                ]
            ],
            'default' => [
                'size' => 4,
                'unit' => 'col',
            ],
            'condition'     => [
                'layout' => ['grid', 'masonry'],
            ],

        ]);
        $this->add_control('columns_tablet', [
            'label'         => __('Columns for row (Tablet)', 'cafe-lite'),
            'type'          => Controls_Manager::SLIDER,
            'range' => [
                'col' => [
                    'min' => 1,
                    'max' => 6,
                ]
            ],
            'default' => [
                'size' => 3,
                'unit' => 'col',
            ],
            'condition'     => [
                'layout' => ['grid', 'masonry'],
            ],

        ]);
        $this->add_control('columns_mobile', [
            'label'         => __('Columns for row (Mobile)', 'cafe-lite'),
            'type'          => Controls_Manager::SLIDER,
            'range' => [
                'col' => [
                    'min' => 1,
                    'max' => 6,
                ]
            ],
            'default' => [
                'size' => 2,
                'unit' => 'col',
            ],
            'condition'     => [
                'layout' => ['grid', 'masonry'],
            ],

        ]);
        // Carousel
        $this->add_control('slides_to_show', [
            'label'         => __('Slides to Show', 'cafe-lite'),
            'type'          => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 10,
                ]
            ],
            'default' => [
                'size' => 4,
                'unit' => 'px',
            ],
            'condition'     => [
                'layout' => 'carousel',
            ],

        ]);
        $this->add_control('slides_to_show_tablet', [
            'label'         => __('Slides to Show (Tablet)', 'cafe-lite'),
            'type'          => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 10,
                ]
            ],
            'default' => [
                'size' => 3,
                'unit' => 'px',
            ],
            'condition'     => [
                'layout' => 'carousel',
            ],

        ]);
        $this->add_control('slides_to_show_mobile', [
            'label'         => __('Slides to Show (Mobile)', 'cafe-lite'),
            'type'          => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 10,
                ]
            ],
            'default' => [
                'size' => 2,
                'unit' => 'px',
            ],
            'condition'     => [
                'layout' => 'carousel',
            ],

        ]);

        $this->add_control('speed', [
            'label'         => __('Carousel: Speed to Scroll', 'cafe-lite'),

            'type'          => Controls_Manager::NUMBER,
            'default'       => 5000,
            'condition'     => [
                'layout' => 'carousel',
            ],

        ]);
        $this->add_control('scroll', [
            'label'         => __('Carousel: Slide to Scroll', 'cafe-lite'),

            'type'          => Controls_Manager::NUMBER,
            'default'       => 1,
            'condition'     => [
                'layout' => 'carousel',
            ],
        ]);
        $this->add_responsive_control('autoplay', [
            'label'         => __('Carousel: Auto Play', 'cafe-lite'),

            'type'          => Controls_Manager::SWITCHER,
            'label_on' => __('Show', 'cafe-lite'),
            'label_off' => __('Hide', 'cafe-lite'),
            'return_value' => 'true',
            'default' => 'true',
            'condition'     => [
                'layout' => 'carousel',
            ],
        ]);
        $this->add_responsive_control('show_pag', [
            'label'         => __('Carousel: Pagination', 'cafe-lite'),

            'type'          => Controls_Manager::SWITCHER,
            'label_on' => __('Show', 'cafe-lite'),
            'label_off' => __('Hide', 'cafe-lite'),
            'return_value' => 'true',
            'default' => 'true',
            'condition'     => [
                'layout' => 'carousel',
            ],
        ]);
        $this->add_responsive_control('show_nav', [
            'label'         => __('Carousel: Navigation', 'cafe-lite'),

            'type'          => Controls_Manager::SWITCHER,
            'label_on' => __('Show', 'cafe-lite'),
            'label_off' => __('Hide', 'cafe-lite'),
            'return_value' => 'true',
            'default' => 'true',
            'condition'     => [
                'layout' => 'carousel',
            ],
        ]);
        $this->add_control('arrow_left_icon', [
            'label'     => esc_html__('Arrow Left', 'cafe-lite'),
            'type'      => 'clevericon',
            'condition' => [
                'show_nav' => 'true',
            ],
        ]);
        $this->add_control('arrow_right_icon', [
            'label'     => esc_html__('Arrow Right', 'cafe-lite'),
            'type'      => 'clevericon',
            'condition' => [
                'show_nav' => 'true',
            ],
        ]);
        $this->add_control('nav_position', [
            'label'         => __('Carousel: Navigation position', 'cafe-lite'),

            'type'          => Controls_Manager::SELECT,
            'default'       => 'middle-nav',
            'options' => [
                'top-nav'       => __('Top', 'cafe-lite'),
                'middle-nav'    => __('Middle', 'cafe-lite'),
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ],

        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'normal_style_settings',
            [
                'label' => __('Normal', 'cafe-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('overlay_banner', [
            'label' => __('Overlay banner', 'cafe-lite'),
            'type' => Controls_Manager::SWITCHER,
            'description' => __('Content will show up on image banner.', 'cafe-lite'),
            'return_value' => 'true',
            'default' => 'true',
        ]);
        $this->add_control('effect', [
            'label' => __('Hover Effect', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'normal',
            'condition' => [
                'overlay_banner' => 'true'
            ],
            'options' => [
                'normal' => __('Normal', 'cafe-lite'),
                'lily' => __('Lily', 'cafe-lite'),
                'layla' => __('Layla', 'cafe-lite'),
                'sadie' => __('Sadie', 'cafe-lite'),
                'oscar' => __('Oscar', 'cafe-lite'),
                'chico' => __('Chico', 'cafe-lite'),
                'ruby' => __('Ruby', 'cafe-lite'),
                'roxy' => __('Roxy', 'cafe-lite'),
                'marley' => __('Marley', 'cafe-lite'),
                'sarah' => __('Sarah', 'cafe-lite'),
                'milo' => __('Milo', 'cafe-lite'),
            ]
        ]);
        $this->add_control('content_align', [
            'label' => __('Vertical Align', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'flex-start',
            'options' => [
                'flex-start' => __('Top', 'cafe-lite'),
                'center' => __('Middle', 'cafe-lite'),
                'flex-end' => __('Bottom', 'cafe-lite'),
            ],
            'condition' => [
                'overlay_banner' => 'true'
            ],
            'selectors' => [
                '{{WRAPPER}} .cafe-banner, {{WRAPPER}} .cafe-banner.cafe-overlay-content .cafe-wrap-content' => 'justify-content: {{VALUE}};'
            ]
        ]);
        $this->add_control('text_align', [
            'label' => __('Text Align', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
                'left' => __('Left', 'cafe-lite'),
                'center' => __('Center', 'cafe-lite'),
                'right' => __('Right', 'cafe-lite'),
            ],
            'selectors' => [
                '{{WRAPPER}} .cafe-banner, {{WRAPPER}} .cafe-banner.cafe-overlay-content .cafe-wrap-content' => 'text-align: {{VALUE}};'
            ]
        ]);
        $this->add_responsive_control('wrap_margin', [
            'label' => __('Wrap Margin', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-row:not(.slick-slider)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->add_responsive_control('dimensions', [
            'label' => __('Banner Item Padding', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-banner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->add_control(
            'title_color_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control('title_color_heading', [
            'label' => __('Title', 'cafe-lite'),
            'type' => Controls_Manager::HEADING
        ]);
        $this->add_control('title_color', [
            'label' => __('Title Color', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner-title, {{WRAPPER}} .cafe-wrap-content' => 'color: {{VALUE}};'
            ]
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .cafe-banner-title',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
        $this->add_responsive_control('title_padding', [
            'label' => __('Title Padding', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-banner-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control(
            'des_color_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control('des_color_heading', [
            'label' => __('Description', 'cafe-lite'),
            'type' => Controls_Manager::HEADING
        ]);
        $this->add_control('des_color', [
            'label' => __('Description Color', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner .cafe-banner-description' => 'color: {{VALUE}};'
            ]
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'des_typography',
                'selector' => '{{WRAPPER}} .cafe-banner .cafe-banner-description',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
        $this->add_responsive_control('des_padding', [
            'label' => __('Description Padding', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-banner-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_control(
            'button_style_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control('button_style_heading', [
            'label' => __('Button', 'cafe-lite'),
            'type' => Controls_Manager::HEADING
        ]);
        $this->add_control('button_color', [
            'label' => __('Button Color', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner .cafe-button' => 'color: {{VALUE}};'
            ]
        ]);
        $this->add_control('button_bg', [
            'label' => __('Button Background', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner .cafe-button.outline::after,{{WRAPPER}}  .cafe-banner .cafe-button.normal::after' => 'background: {{VALUE}};'
            ]
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .cafe-banner .cafe-button',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
        $this->add_responsive_control('button_margin', [
            'label' => __('Button margin', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->add_responsive_control('button_padding', [
            'label' => __('Button Padding', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->add_control('button_style', [
            'label' => esc_html__('Button style', 'cafe-lite'),
            'type' => Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'normal' => esc_html__('Normal', 'cafe-lite'),
                'underline' => esc_html__('Underline', 'cafe-lite'),
                'outline' => esc_html__('Outline', 'cafe-lite'),
                'flat' => esc_html__('Flat', 'cafe-lite'),
                'slide' => esc_html__('Slide', 'cafe-lite'),
                'slide-up' => esc_html__('Slide Up', 'cafe-lite'),
                'line-through' => esc_html__('Line Through', 'cafe-lite'),
            ]
        ]);
        $this->add_control('overlay_bg_heading', [
            'label' => __('Background Overlay', 'cafe-lite'),
            'type' => Controls_Manager::HEADING
        ]);
        $this->add_control(
            'overlay_bg_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'overlay_bg',
                'label' => __('Background Overlay', 'cafe-lite'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .cafe-wrap-content',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'hover_style_settings',
            [
                'label' => __('Hover', 'cafe-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('title_color_hover', [
            'label' => __('Title Color', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner:hover .cafe-wrap-content,{{WRAPPER}} .cafe-banner.cafe-overlay-content:hover .cafe-banner-title, {{WRAPPER}} .cafe-banner:not(.cafe-overlay-content) .cafe-banner-title:hover' => 'color: {{VALUE}};'
            ]
        ]);
        $this->add_control('des_color_hover', [
            'label' => __('Description Color', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner.cafe-overlay-content:hover .cafe-banner-description,{{WRAPPER}} .cafe-banner:not(.cafe-overlay-content) .cafe-banner-description:hover' => 'color: {{VALUE}};'
            ]
        ]);
        $this->add_control('button_color_hover', [
            'label' => __('Button Color', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner .cafe-button:hover' => 'color: {{VALUE}};'
            ]
        ]);
        $this->add_control('button_bg_hover', [
            'label' => __('Button Background', 'cafe-lite'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-banner .cafe-button.outline:hover:after,{{WRAPPER}}  .cafe-banner .cafe-button.normal:hover:after' => 'background: {{VALUE}};'
            ]
        ]);
        $this->add_control(
            'overlay_bg_hover_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control('overlay_bg_hover_heading', [
            'label' => __('Background Content Overlay', 'cafe-lite'),
            'type' => Controls_Manager::HEADING
        ]);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'overlay_bg_hover',
                'label' => __('Background Content Overlay', 'cafe-lite'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .cafe-banner.cafe-overlay-content:hover .cafe-wrap-content',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'nav_style_settings',
            [
                'label' => __('Navigation', 'cafe-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'show_nav'  => 'true',
                    'layout'    => 'carousel',
                ]
            ]
        );
        $this->add_responsive_control('arrows_icon_size', [
            'label'     => esc_html__('Icon Size', 'cafe-lite'),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_responsive_control('arrows_size', [
            'label'     => esc_html__('Size', 'cafe-lite'),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_control('arrows_color', [
            'label'     => esc_html__('Color', 'cafe-lite'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn' => 'color: {{VALUE}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_control('arrows_hover_color', [
            'label'     => esc_html__('Color Hover', 'cafe-lite'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn:hover' => 'color: {{VALUE}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_control('arrows_bg', [
            'label'     => esc_html__('Background Color', 'cafe-lite'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn' => 'background-color: {{VALUE}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_control('arrows_bg_hover', [
            'label'     => esc_html__('Background Color Hover', 'cafe-lite'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn:hover' => 'background-color: {{VALUE}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_responsive_control('arrows_border_radius', [
            'label' => __('Border radius', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel .cafe-carousel-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->end_controls_section();
        $this->start_controls_section(
            'pag_style_settings',
            [
                'label' => __('Pagination', 'cafe-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'show_pag'  => 'true',
                    'layout'    => 'carousel',
                ]
            ]
        );
        $this->add_responsive_control('pag_size', [
            'label'     => esc_html__('Size', 'cafe-lite'),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel ul.slick-dots li' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_responsive_control('pag_space', [
            'label'     => esc_html__('Space', 'cafe-lite'),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel ul.slick-dots li' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_control('pag_color', [
            'label'     => esc_html__('Color', 'cafe-lite'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ..cafe-carousel ul.slick-dots li' => 'background: {{VALUE}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_control('pag_hover_color', [
            'label'     => esc_html__('Color Hover', 'cafe-lite'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel ul.slick-dots li:hover, {{WRAPPER}} .cafe-carousel ul.slick-dots li.slick-active' => 'background: {{VALUE}};',
            ],
            'condition'     => [
                'show_nav'  => 'true',
                'layout'    => 'carousel',
            ]
        ]);
        $this->add_responsive_control('pag_border_radius', [
            'label' => __('Border radius', 'cafe-lite'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .cafe-carousel ul.slick-dots li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->end_controls_section();
    }
    /**
     * Load style
     */
    public function get_style_depends()
    {
        return ['cafe-style', 'slick'];
    }

    /**
     * Retrieve the list of scripts the image carousel widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.3.0
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['slick', 'cafe-script'];
    }
    /**
     * Render
     */
    protected function render()
    {
        $settings = array_merge([ // default settings
            'image' => CAFE_URI . 'assets/img/banner-placeholder.png',
            'auto_size' => 'true',
            'link' => '',
            'css_class' => '',
            'title' => '',
            'title_tag' => 'h3',
            'des' => '',
            'button_label' => '',
            'button_icon' => '',
            'button_icon_pos' => 'after',
            'button_style' => 'normal',
            'overlay_banner' => 'true',
            'effect' => 'normal',

            'columns'               => '',
            'slides_to_show'        => 4,
            'speed'                 => 5000,
            'scroll'                => 1,
            'autoplay'              => 'true',
            'show_pag'              => 'true',
            'show_nav'              => 'true',
            'nav_position'          => 'middle-nav',

        ], $this->get_settings_for_display());

        $this->add_inline_editing_attributes('title');
        $this->add_inline_editing_attributes('description');
        $this->add_inline_editing_attributes('button_label');

        $this->add_render_attribute('title', 'class', 'cafe-banner-title');
        $this->add_render_attribute('des', 'class', 'cafe-banner-description');
        $button_class = 'cafe-button ' . $settings['button_style'];
        $this->add_render_attribute('button_label', 'class', $button_class);

        $this->getViewTemplate('template', 'multi-banner', $settings);
    }
}
