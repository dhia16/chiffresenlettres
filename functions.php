<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Function to convert numbers to words
function chiffreEcritEnLettres($number) {
    $words = [
        '0' => 'zéro', '1' => 'un', '2' => 'deux', '3' => 'trois', '4' => 'quatre', '5' => 'cinq',
        '6' => 'six', '7' => 'sept', '8' => 'huit', '9' => 'neuf', '10' => 'dix', '11' => 'onze',
        '12' => 'douze', '13' => 'treize', '14' => 'quatorze', '15' => 'quinze', '16' => 'seize',
        '17' => 'dix-sept', '18' => 'dix-huit', '19' => 'dix-neuf', '20' => 'vingt', '30' => 'trente',
        '40' => 'quarante', '50' => 'cinquante', '60' => 'soixante', '70' => 'soixante-dix',
        '80' => 'quatre-vingt', '90' => 'quatre-vingt-dix'
    ];
    
    if ($number < 0) return 'moins ' . chiffreEcritEnLettres(abs($number));
    if ($number <= 20) return $words[$number];
    if ($number < 100) {
        $units = $number % 10;
        $tens = $number - $units;
        if ($units == 0) return $words[$tens];
        if ($tens == 70 || $tens == 90) return $words[$tens - 10] . '-' . $words[10 + $units];
        return $words[$tens] . '-' . $words[$units];
    }
    if ($number < 1000) {
        $hundreds = intdiv($number, 100);
        $remainder = $number % 100;
        $hundredText = $hundreds == 1 ? 'cent' : $words[$hundreds] . ' cent';
        return $remainder == 0 ? $hundredText : $hundredText . ' ' . chiffreEcritEnLettres($remainder);
    }
    if ($number < 1000000) {
        $thousands = intdiv($number, 1000);
        $remainder = $number % 1000;
        $thousandText = $thousands == 1 ? 'mille' : chiffreEcritEnLettres($thousands) . ' mille';
        return $remainder == 0 ? $thousandText : $thousandText . ' ' . chiffreEcritEnLettres($remainder);
    }
    if ($number < 1000000000) {
        $millions = intdiv($number, 1000000);
        $remainder = $number % 1000000;
        $millionText = $millions == 1 ? 'un million' : chiffreEcritEnLettres($millions) . ' millions';
        return $remainder == 0 ? $millionText : $millionText . ' ' . chiffreEcritEnLettres($remainder);
    }
    return 'Nombre trop grand';
}

add_action('wp_ajax_convert_number_to_words', 'convert_number_to_words_callback');
add_action('wp_ajax_nopriv_convert_number_to_words', 'convert_number_to_words_callback');

function convert_number_to_words_callback() {
    $number = intval($_GET['number']);
    $words = chiffreEcritEnLettres($number);
    echo json_encode(['words' => $words]);
    wp_die();
}

