<?php

    $base = '/var/www/mugmox/admin_d/';
    $version = isset($argv[2]) ? $argv[2] : '0.0.0';

    if ( $base == '' ) {
        return;
    }

    $deploy_css_filename    = 'admin_d-' . $version . '.min.css';
    $deploy_js_filename     = 'admin_d-' . $version . '.min.js';
    $deploy_js_stack        = 'admin_d.stack-' . $version . '.min.js';

    $abs_css_file   = $base . 'release/' . $deploy_css_filename;
    $abs_js_file    = $base . 'release/' . $deploy_js_filename;
    $abs_js_file2   = $base . 'release/' . $deploy_js_stack;

    $css_list = array(
                    'vendor.slick.css',

                    'component.bookmark.css',
                    'component.bookmark.group.css',
                    'component.notiy.css',

                    'ggumim.reset.css',
                    'ggumim.navigationbar.css',
                    'ggumim.star.list.css',
                    'ggumim.star.view.css',
                    'ggumim.star.gather.css',
                    'ggumim.picture.view.css',
                    'ggumim.comment.css',
                    'ggumim.furniture.item.css',
                    'ggumim.furniture.view.css',
                    'ggumim.story.listing.css',
                    'ggumim.sidemenu.css',
                    'ggumim.login.css',
                    'ggumim.member.view.css',
                    'ggumim.search.css',
                    'ggumim.search.results.css',
                    'ggumim.furniture.home.css',
                    'ggumim.picture.home.css',
                    'ggumim.bottom.menu.css',
                    'ggumim.member.bookmark.view.css',
                    'ggumim.setting.css',
                    'ggumim.setting.profile.css',
                    'ggumim.monday.design.1.css'
                );

    $js_list = array(
                    'vendor.jquery.js',
                    'vendor.slick.js',

                    'core.session.js',
                    'core.util.js',
                    'core.transit.js',
                    'core.scrollwatch.js',

                    'ggumim.star.js',
                    'ggumim.star.list.js',
                    'ggumim.comment.js',
                    'ggumim.monday.js',
                    'ggumim.furniture.view.js',
                    'ggumim.story.listing.js',
                    'ggumim.sidemenu.js',
                    'ggumim.login.js',
                    'ggumim.search.results.js',
                    'ggumim.picture.view.js',
                    'ggumim.furniture.home.js',
                    'ggumim.furniture.trend.js',
                    'ggumim.picture.home.js',
                    'ggumim.member.profile.js',
                    'ggumim.member.password.js',
                    'ggumim.lost.js',
                    'ggumim.member.bookmark.js',
                    'ggumim.signup.js',

                    'component.app.js',
                    'component.bookmark.js',
                    'component.bookmark.group.js',
                    'component.notiy.js'
                );


    if ( file_exists( $abs_css_file ) ) {
        unlink($abs_css_file);
    }

    if ( file_exists( $abs_js_file) ) {
        unlink($abs_js_file);
    }

    if ( file_exists( $abs_js_file2) ) {
        unlink($abs_js_file2);
    }


    $myfile = fopen($abs_css_file, "w");
    fclose($myfile);
    chmod($abs_css_file, 0777);

    $myfile = fopen($abs_js_file, "w");
    fclose($myfile);
    chmod($abs_js_file, 0777);

    $myfile = fopen($abs_js_file2, "w");
    fclose($myfile);
    chmod($abs_js_file2, 0777);


    foreach($css_list as $filename) {
        $filename_with_directory = $base . '../assets/css/' . $filename;
        write_to_file( $abs_css_file, $filename_with_directory );
    }

    foreach($js_list as $filename) {
        $filename_with_directory = $base . '../assets/js/' . $filename;
        write_to_file( $abs_js_file, $filename_with_directory );
    }

    write_to_file( $abs_js_file2, $base . '../assets/js/system.stack.js');




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
