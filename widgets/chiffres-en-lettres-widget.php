<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Ensure the functions file is included only once
require_once plugin_dir_path( __FILE__ ) . '../includes/functions.php';

class Elementor_Chiffres_En_Lettres_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'chiffres_en_lettres';
    }

    public function get_title() {
        return __( 'Chiffres en Lettres', 'chiffres-en-lettres' );
    }

    public function get_icon() {
        return 'eicon-text-editor';
    }

    public function get_categories() {
        return [ 'general' ];
    }

   protected function _register_controls() {
        // Add all the new controls for the content, input, button, and result styling.
        // Start with the content section and add placeholder and button text controls
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'chiffres-en-lettres' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label' => __( 'Input Placeholder', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Entrez un nombre...', 'chiffres-en-lettres' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Convertir', 'chiffres-en-lettres' ),
            ]
        );

        // Add input width control
          $this->add_control(
        'input_width',
        [
            'label' => __( 'Input Width', 'chiffres-en-lettres' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em' ],
            'range' => [
                'px' => [
                    'min' => 100,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 5,
                    'max' => 50,
                    'step' => 0.1,
                ],
            ],
            'devices' => [
                'desktop' => [
                    'min' => 100,
                    'max' => 1000,
                    'step' => 1,
                ],
                'tablet' => [
                    'min' => 100,
                    'max' => 800,
                    'step' => 1,
                ],
                'mobile' => [
                    'min' => 100,
                    'max' => 600,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} input' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

        $this->end_controls_section();

        // Input Style Section
        $this->start_controls_section(
            'input_style_section',
            [
                'label' => __( 'Input Field', 'chiffres-en-lettres' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Input Typography, Color, Background, Border, Padding
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'input_typography',
                'label' => __( 'Typography', 'chiffres-en-lettres' ),
                'selector' => '{{WRAPPER}} input',
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label' => __( 'Text Color', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_background_color',
            [
                'label' => __( 'Background Color', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'input_border',
                'label' => __( 'Border', 'chiffres-en-lettres' ),
                'selector' => '{{WRAPPER}} input',
            ]
        );

        $this->add_responsive_control(
            'input_padding',
            [
                'label' => __( 'Padding', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input' => 'padding: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __( 'Button', 'chiffres-en-lettres' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Typography', 'chiffres-en-lettres' ),
                'selector' => '{{WRAPPER}} button',
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => __( 'Background Color', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __( 'Border', 'chiffres-en-lettres' ),
                'selector' => '{{WRAPPER}} button',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'padding: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};',
                ],
            ]
        );

        $this->add_control(
            'button_margin',
            [
                'label' => __( 'Margin', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'margin-left: {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'left' => '20',
                ],
            ]
        );

        $this->end_controls_section();

        // Result Style Section
        $this->start_controls_section(
            'result_style_section',
            [
                'label' => __( 'Result Text', 'chiffres-en-lettres' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'result_typography',
                'label' => __( 'Typography', 'chiffres-en-lettres' ),
                'selector' => '{{WRAPPER}} .chiffres-en-lettres-result',
            ]
        );

        $this->add_control(
            'result_text_color',
            [
                'label' => __( 'Text Color', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .chiffres-en-lettres-result' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'result_background_color',
            [
                'label' => __( 'Background Color', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .chiffres-en-lettres-result' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'result_border',
                'label' => __( 'Border', 'chiffres-en-lettres' ),
                'selector' => '{{WRAPPER}} .chiffres-en-lettres-result',
            ]
        );

        $this->add_responsive_control(
            'result_padding',
            [
                'label' => __( 'Padding', 'chiffres-en-lettres' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .chiffres-en-lettres-result' => 'padding: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>
        <div class="chiffres-en-lettres-widget">
            <input type="text" id="number-input" placeholder="<?php echo esc_attr( $settings['placeholder'] ); ?>">
            <button id="convert-button"><?php echo esc_html( $settings['button_text'] ); ?></button>
            <div class="chiffres-en-lettres-result"></div>
        </div>
    
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const inputField = document.getElementById('number-input');
                const button = document.getElementById('convert-button');
                const resultDiv = document.querySelector('.chiffres-en-lettres-result');
    
                // Function to convert the number to words
                function convertNumber() {
                    const number = inputField.value;
                    if (!isNaN(number) && number !== '') {
                        fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=convert_number_to_words&number=${number}`)
                            .then(response => response.json())
                            .then(data => {
                                const wordRepresentation = data.words.replace(/\s+/g, '-'); // Replace spaces with hyphens
    
                                // Create the result strings
                                const mainResult = data.words;  // Main conversion result (correct case)
                                const recommendation = wordRepresentation; // Recommendation with hyphens
                                const eurosResult = `${data.words} euros`; // Result with 'euros'
    
                                // Display the results
                                resultDiv.innerHTML = `
                                    <div>${mainResult}</div>
                                    <div class="title-1990">
                                    <p class="rec">Recommandation de 1990 :</p>${recommendation}</div>
                                    <div class="title-euros">
                                    <p class="rec">En euros :</p>${eurosResult}</div>
                                `;
                                // Update URL with the result
                                history.pushState({}, '', `/?ecrire-nombre-${number}-${encodeURIComponent(wordRepresentation)}`);
                            });
                    } else {
                        resultDiv.textContent = 'Veuillez entrer un nombre valide.';
                    }
                }
    
                // Click event for the button
                button.addEventListener('click', convertNumber);
    
                // Keydown event for the input field
                inputField.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter') {
                        convertNumber(); // Call the convert function on Enter key
                        event.preventDefault(); // Prevent the default form submission
                    }
                });
    
                // Capture the query string and parse it manually
                const search = window.location.search;
                console.log('Search string:', search);  // Log the search string
                const match = search.match(/\?ecrire-nombre-(\d+)-(.+)/);
                if (match) {
                    const number = match[1];
                    const words = decodeURIComponent(match[2]);
                    console.log('Number from URL:', number);  // Log number from URL
                    console.log('Words from URL:', words);  // Log words from URL
                    inputField.value = number;
                    resultDiv.innerHTML = `
                        <div>${words.charAt(0).toUpperCase() + words.slice(1)}</div> <!-- Capitalize first letter -->
                        <div><p class="rec">Recommandation de 1990 :</p> ${words.replace(/\s+/g, '-')}</div>
                        <div><p class="rec">En euros :</p> ${words} euros</div>
                    `;  // Show the converted words and additional lines
                }
            });
        </script>
        
        <?php
    }
      
}    
