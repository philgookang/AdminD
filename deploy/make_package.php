<?php

    $base = '/var/www/opensource/admin_d/';
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
                    'vendor/alertify.css',
                    'vendor/alertify.default.css',
                    'vendor/jquery-ui.css',
                    'vendor/bootstrap/select2.css',

                    'font/glyphicons-filetypes.css',
                    'font/glyphicons-halflings.css',
                    'font/glyphicons-social.css',
                    'font/glyphicons.css',

                    'reset.css',

                    'core/animation.glyphicon.css',
                    'core/layout.css',
                    'core/navigation.css',
                    'core/template.css',

                    'component/button.css',
                    'component/category.manager.css',
                    'component/checkbox.css',
                    'component/input.css',
                    'component/input.segmented.css',
                    'component/label.css',
                    'component/list.compile.css',
                    'component/pagination.css',
                    'component/panel.css',
                    'component/panel.tabs.css',
                    'component/select.nextbox.css',
                    'component/table.css',
                    'component/table.filter.css',

                    'helper/align.css',
                    'helper/float.css',
                    'helper/decoration.css',
                    'helper/style.css',
                    'helper/padding.css'
                );

    $js_list = array(
                    'vendor/jquery.js',
                    'vendor/jquery-ui.js',
                    'vendor/jquery.plugin/iframe-transport.js',
                    'vendor/jquery.plugin/fileupload.js',
                    'vendor/bootstrap/select2.js',
                    'vendor/bootstrap/typeahead.js',
                    'vendor/alertify.js',

                    'helper/format.js',

                    'component/MutiFileUploaderComponent.js',
                    'component/SelectNextBox.js'
                );


    if ( file_exists( $abs_css_file ) ) {
        unlink($abs_css_file);
    }

    if ( file_exists( $abs_js_file) ) {
        unlink($abs_js_file);
    }


    $myfile = fopen($abs_css_file, "w");
    fclose($myfile);
    chmod($abs_css_file, 0777);

    $myfile = fopen($abs_js_file, "w");
    fclose($myfile);
    chmod($abs_js_file, 0777);


    foreach($css_list as $filename) {
        $filename_with_directory = $base . 'css/' . $filename;
        write_to_file( $abs_css_file, $filename_with_directory );
    }

    foreach($js_list as $filename) {
        $filename_with_directory = $base . 'js/' . $filename;
        write_to_file( $abs_js_file, $filename_with_directory );
    }

    // write_to_file( $abs_js_file2, $base . '../js/system.stack.js');
    $s2 = $version;

    $s1 = $deploy_css_filename;
    shell_exec( 'sh /var/www/opensource/admin_d/deploy/minify_css.sh  "' . $s1 . '"  "' . $s2 . '"  ');

    $s1 = $deploy_js_filename;
    shell_exec( 'sh /var/www/opensource/admin_d/deploy/minify_js.sh  "' . $s1 . '"  "' . $s2 . '"  ');

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
