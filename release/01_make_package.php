<?php

    $base = '/var/www/mugmox/admin_d/';
    $version = isset($argv[1]) ? $argv[1] : '0.0.0';

    if ( $base == '' ) {
        return;
    }

    $deploy_css_filename    = 'admin_d-' . $version . '.min.css';
    $deploy_js_filename     = 'admin_d-' . $version . '.min.js';
    // $deploy_js_stack        = 'admin_d.stack-' . $version . '.min.js';

    $abs_css_file   = $base . 'release/' . $deploy_css_filename;
    $abs_js_file    = $base . 'release/' . $deploy_js_filename;
    // $abs_js_file2   = $base . 'release/' . $deploy_js_stack;

    $css_list = array(
                    'reset.css',

                    'core/template.css',
                    'core/layout.css',
                    'core/navigation.css',

                    'component/panel.css',
                    'component/panel.tabs.css',
                    'component/table.css',
                    'component/table.filter.css',
                    'component/button.css',
                    'component/input.css',
                    'component/label.css',

                    'helper/align.css',
                    'helper/padding.css',
                    'helper/float.css'
                );

    $js_list = array(
                );


    if ( file_exists( $abs_css_file ) ) {
        unlink($abs_css_file);
    }

    if ( file_exists( $abs_js_file) ) {
        unlink($abs_js_file);
    }

    // if ( file_exists( $abs_js_file2) ) {
        // unlink($abs_js_file2);
    // }


    $myfile = fopen($abs_css_file, "w");
    fclose($myfile);
    chmod($abs_css_file, 0777);

    $myfile = fopen($abs_js_file, "w");
    fclose($myfile);
    chmod($abs_js_file, 0777);

    // $myfile = fopen($abs_js_file2, "w");
    // fclose($myfile);
    // chmod($abs_js_file2, 0777);


    foreach($css_list as $filename) {
        $filename_with_directory = $base . '../css/' . $filename;
        write_to_file( $abs_css_file, $filename_with_directory );
    }

    foreach($js_list as $filename) {
        $filename_with_directory = $base . '../js/' . $filename;
        write_to_file( $abs_js_file, $filename_with_directory );
    }

    // write_to_file( $abs_js_file2, $base . '../js/system.stack.js');




function write_to_file( $output_filname, $input_filename ) {
    $space = '
';

    file_put_contents( $output_filname, $space, FILE_APPEND);

    $fptr = fopen($input_filename, 'r');

    if ( $fptr ) {
        while (($line = fgets($fptr)) !== false) {
            file_put_contents( $output_filname, $line, FILE_APPEND);
        }
        fclose( $fptr );
    }

    file_put_contents( $output_filname, $space, FILE_APPEND);
}
