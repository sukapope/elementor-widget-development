<?php
namespace Elementor;

class MYEW_Project_References_Widget extends Widget_Base {

    public function get_name() {
        return  'myew-References-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Project References', 'my-elementor-widget' );
    }

    public function get_script_depends() {
        return [
            'myew-script'
        ];
    }

    public function get_icon() {
        return 'eicon-single-page';
    }

    public function get_categories() {
        return [ 'myew-for-elementor' ];
    }

    public function _register_controls() {
        // Image Settings
        $this->start_controls_section(
            'image_section',
            [
                'label' => __( 'Images', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Image
            $this->add_control(
                'screenshot_of_project',
                [
                    'label' => __( 'Choose Project Image', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            // Logo Image
            $this->add_control(
                'client_company_logo',
                [
                    'label' => __( 'Choose Logo Image', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );


        $this->end_controls_section();

        // Content Settings
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Title
            $this->add_control(
                'client_company_name',
                [
                    'label' => __( 'Client Company Name', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Default title', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                ]
            );
            
             // Show URL
             $this->add_control(
                'show_url_link',
                [
                    'label' => __( 'Show Project Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            
            // Website URL of Project/Client
            $this->add_control(
                'website_url_of_projectclient',
                [
                    'label' => __( 'Website URL of Project/Client', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'condition' => [
                        'show_url_link' => 'yes'
                    ]
                ]
            );

            // Divider
            $this->add_control(
                'show_divider',
                [
                    'label'        => __( 'Show Divider', 'plugin-domain' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'plugin-domain' ),
                    'label_off'    => __( 'Hide', 'plugin-domain' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            // Content
            $this->add_control(
                'description_of_project',
                [
                    'label' => __( 'Description of Project', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Default description', 'plugin-domain' ),
                    'placeholder' => __( 'Type your description here', 'plugin-domain' ),
                ]
            );


            // Allow search engine indexing?
            $this->add_control(
                'allow_search_engine_indexing',
                [
                    'label' => __( 'Allow search engine indexing?', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'your-plugin' ),
                    'label_off' => __( 'No', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

        $this->end_controls_section();


        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {
        // Image Style Settings
        $this->start_controls_section(
            'image_style_section',
            [
                'label' => __( 'Image', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Width
            $this->add_responsive_control(
                'image_width',
                [
                    'label' => __( 'Width', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 100%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 100,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .image' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Height
            $this->add_responsive_control(
                'image_height',
                [
                    'label' => __( 'Height', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 230px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 230,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .image' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Padding
            $this->add_responsive_control(
                'image_padding',
                [
                    'label' => __( 'Padding', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .image-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'image_border',
                    'label' => __( 'Border', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .image-card .image-wrapper',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'image_border_radius',
                [
                    'label' => __( 'Border Radius', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .image-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .image-card .image-wrapper .image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'image_box_shadow',
                    'label' => __( 'Box Shadow', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .image-card .image-wrapper .image',
                ]
            );

        $this->end_controls_section();

        /**
         * Content Style Settings
         */
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Content', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Padding
            $this->add_responsive_control(
                'content_padding',
                [
                    'label' => __( 'Padding', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => 30,
                        'right' => 30,
                        'bottom' => 30,
                        'left' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'description' => 'Default: 30px',
                ]
            );

             // Background Color
             $this->add_control(
                'image-card-bg',
                [
                    'label' => __( 'Content Background Color', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#707070',
                    'selectors' => [
                        '{{WRAPPER}} .image-card' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            // Title heading
            $this->add_control(
                'content_title_heading',
                [
                    'label' => __( 'Title', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            // Title Bottom Spacing
            $this->add_responsive_control(
                'content_title_bottom_spacing',
                [
                    'label' => __( 'Bottom Spacing', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 15px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Title Color
            $this->add_control(
                'content_title_color',
                [
                    'label' => __( 'Title Color', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .image-card .title h2' => 'color: {{VALUE}}',
                    ],
                    'default' => '#111',
                ]
            );

            // Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_title_typography',
                    'label' => __( 'Typography', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .image-card .title h2',
                ]
            );

            // Description heading
            $this->add_control(
                'content_description_heading',
                [
                    'label' => __( 'Description', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            // Description Bottom Spacing
            $this->add_responsive_control(
                'content_description_bottom_spacing',
                [
                    'label' => __( 'Bottom Spacing', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 30px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Description Color
            $this->add_control(
                'content_description_color',
                [
                    'label' => __( 'Description Color', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .image-card .excerpt' => 'color: {{VALUE}}',
                    ],
                    'default' => '#111',
                ]
            );

            // Description Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_description_typography',
                    'label' => __( 'Typography', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .image-card .excerpt',
                ]
            );


        $this->end_controls_section();

        /**
         * Divider Style Settings
         */
        $this->start_controls_section(
            'divider_style_section',
            [
                'label' => __( 'Divider', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Width
            $this->add_control(
                'divider_width',
                [
                    'label' => __( 'Width', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 100px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 100,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .divider' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Height
            $this->add_control(
                'divider_height',
                [
                    'label' => __( 'Height', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 2px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 2,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .image-card .divider' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Background Color
            $this->add_control(
                'divider_backgorund_color',
                [
                    'label' => __( 'Background Color', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'rgba( 0,0,0,0.05 )',
                    'selectors' => [
                        '{{WRAPPER}} .image-card .divider ' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        /**
         * Top badge Style Settings
         */
        $this->start_controls_section(
            'top_badge_style_section',
            [
                'label' => __( 'Top Badge', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Background Color
            $this->add_control(
                'top_badge_backgorund_color',
                [
                    'label' => __( 'Background Color', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#562dd4',
                    'selectors' => [
                        '{{WRAPPER}} .image-card .image .top-price-badge' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            // Text Color
            $this->add_control(
                'top_badge_text_color',
                [
                    'label' => __( 'Text Color', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .image-card .image .top-price-badge' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'top_badge_typography',
                    'label' => __( 'Typography', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .image-card .image .top-price-badge',
                ]
            );

        $this->end_controls_section();

        /**
         * Buy Button Style Settings
         */
        $this->start_controls_section(
            'buy_button_style_section',
            [
                'label' => __( 'Buy Button', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Button Tabs
            $this->start_controls_tabs(
                'but_button_style_tabs'
            );
                // Normal State
                $this->start_controls_tab(
                    'buy_button_normal_state',
                    [
                        'label' => __( 'Normal', 'plugin-name' ),
                    ]
                );
                    // Background Color
                    $this->add_control(
                        'but_button_normal_bg_color',
                        [
                            'label' => __( 'Background Color', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#562dd4',
                            'selectors' => [
                                '{{WRAPPER}} .image-card .readmore a.button-readmore' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );
                    // Text Color
                    $this->add_control(
                        'but_button_normal_text_color',
                        [
                            'label' => __( 'Text Color', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#fff',
                            'selectors' => [
                                '{{WRAPPER}} .image-card .readmore a.button-readmore' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                $this->end_controls_tab();

                // Hover State
                $this->start_controls_tab(
                    'buy_button_hover_state',
                    [
                        'label' => __( 'Hover', 'plugin-name' ),
                    ]
                );
                    // Background Color
                    $this->add_control(
                        'but_button_hover_bg_color',
                        [
                            'label' => __( 'Background Color', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#707070',
                            'selectors' => [
                                '{{WRAPPER}} .image-card .readmore a.button-readmore:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );
                   
                    // Text Color
                    $this->add_control(
                        'but_button_hover_text_color',
                        [
                            'label' => __( 'Text Color', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#fff',
                            'selectors' => [
                                '{{WRAPPER}} .image-card .readmore a.button-readmore:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                $this->end_controls_tab();

            $this->end_controls_tabs();

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'buy_button_typography',
                    'label' => __( 'Typography', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .image-card .readmore a.button-readmore',
                ]
            );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        // Image
        $image_target = $settings[ 'website_url_of_projectclient' ][ 'is_external' ] ? ' target="_blank"' : '';
        $image_nofollow = $settings[ 'website_url_of_projectclient' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        // Button
        // $button_target = $settings[ 'button_link' ][ 'is_external' ] ? ' target="_blank"' : '';
        // $button_nofollow = $settings[ 'button_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';

        // For Inline Editin
        $this->add_inline_editing_attributes( 'client_company_name', 'none' );
        $this->add_inline_editing_attributes( 'description_of_project', 'advanced' );
        ?>
        <div class="elementor-widget-wrap elementor-element-populated">
        <section
            class="elementor-section elementor-inner-section elementor-element elementor-element-e387da1 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="e387da1" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6965ff3"
                    data-id="6965ff3" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-1cda288 elementor-widget elementor-widget-heading" data-id="1cda288" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <span class="elementor-heading-title elementor-size-default">Online-Marketing: #Google
                                    Ads (AdWords)</span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-bc8eb4b elementor-widget elementor-widget-text-editor" data-id="bc8eb4b" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">                               
                                <a href="<?php echo esc_url( $settings[ 'website_url_of_projectclient' ][ 'url' ] ) ?>"  <?php echo $image_target; ?> <?php echo $image_nofollow; ?> ><i class="eicon-link"></i><?php echo $settings[ 'client_company_name' ]; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-77100b9"
                    data-id="77100b9" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-86db25f elementor-widget elementor-widget-image"
                            data-id="86db25f" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img src="<?php echo esc_url( $settings[ 'client_company_logo' ][ 'url' ] ); ?>" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" width="150" height="150">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-02ebdb0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="02ebdb0" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-14ddda7"
                    data-id="14ddda7" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-94e7657 elementor-widget elementor-widget-image"
                            data-id="94e7657" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"><img src="<?php echo esc_url( $settings[ 'screenshot_of_project' ][ 'url' ] ); ?>" title="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7289de5"
                    data-id="7289de5" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-168fc30 elementor-widget elementor-widget-text-editor" data-id="168fc30" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                            <div <?php echo $this->get_render_attribute_string( 'description_of_project' ); ?> ><?php echo $settings[ 'description_of_project' ]; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    }

    protected function _content_template() {
        ?>
<#  var image_target=settings.website_url_of_projectclient.is_external ? ' target="_blank"' : '' ; 
    var image_nofollow=settings.website_url_of_projectclient.nofollow ? ' rel="nofollow"' : '' ; 
    view.addInlineEditingAttributes( 'client_company_name' , 'none' );
    view.addInlineEditingAttributes( 'description_of_project' , 'none' ); 
    view.addInlineEditingAttributes( 'website_url_of_projectclient' , 'none' ); 
    #>
    <div class="elementor-widget-wrap elementor-element-populated">
        <section
            class="elementor-section elementor-inner-section elementor-element elementor-element-e387da1 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="e387da1" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6965ff3"
                    data-id="6965ff3" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-1cda288 elementor-widget elementor-widget-heading" data-id="1cda288" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <span class="elementor-heading-title elementor-size-default">Online-Marketing: #Google
                                    Ads (AdWords)</span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-bc8eb4b elementor-widget elementor-widget-text-editor" data-id="bc8eb4b" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">    
                            <# if( 'yes' === settings.show_url_link ) { #>
                                <a href="{{ settings.website_url_of_projectclient.url }}" {{ image_target }} {{ image_nofollow }} {{{ view.getRenderAttributeString( 'client_company_name' ) }}}><i class="eicon-link"></i>{{{ settings.client_company_name }}}</a>
                            <# } #>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-77100b9"
                    data-id="77100b9" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-86db25f elementor-widget elementor-widget-image" data-id="86db25f" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img src="{{ settings.client_company_logo.url }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" width="150" height="150">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-02ebdb0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="02ebdb0" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-14ddda7"
                    data-id="14ddda7" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-94e7657 elementor-widget elementor-widget-image" data-id="94e7657" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"><img src="{{ settings.screenshot_of_project.url }}" title="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7289de5"
                    data-id="7289de5" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-168fc30 elementor-widget elementor-widget-text-editor"
                            data-id="168fc30" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                            <div {{{ view.getRenderAttributeString( 'description_of_project' ) }}}>{{{ settings.description_of_project }}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Project_References_Widget() );