<?php 

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function theme_name_scripts() {

	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css' );

	wp_enqueue_style( 'swipercss', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css' );

	wp_enqueue_style( 'style-main', get_stylesheet_uri() );

	wp_enqueue_style( 'custom-media', get_template_directory_uri() . '/assets/css/custom-media.css' );

	wp_enqueue_script('swiperjs', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '1.0', true);

	wp_enqueue_script('my-custom-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);



} 



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(

		'page_title' 	=> 'Тут вся инфа',

		'menu_title'	=> 'Информация о компании',

		'menu_slug' 	=> 'theme-general-settings',

		'capability'	=> 'edit_posts',

		'redirect'		=> false

	));	

}





add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' ); 

add_theme_support('title-tag');






## отключение дублирование картинок

add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );



function delete_intermediate_image_sizes( $sizes ){



	// размеры которые нужно удалить

	return array_diff( $sizes, [

		'medium_large',

		'large',

		'1536x1536',

		'2048x2048',

	] );

}





// Полное отключение комментариев



// Отключаем поддержку комментариев в типах записей

function disable_comments_post_types() {

    foreach (get_post_types() as $post_type) {

        if (post_type_supports($post_type, 'comments')) {

            remove_post_type_support($post_type, 'comments');

            remove_post_type_support($post_type, 'trackbacks');

        }

    }

}

add_action('init', 'disable_comments_post_types');



// Удаление комментариев из админ-панели

function remove_admin_comments_menu() {

    remove_menu_page('edit-comments.php'); // Убираем меню "Комментарии"

}

add_action('admin_menu', 'remove_admin_comments_menu');



// Перенаправление с экранов управления комментариями

function disable_comments_redirect() {

    global $pagenow;

    if ($pagenow === 'edit-comments.php') {

        wp_redirect(admin_url()); // Перенаправляем на главную админки

        exit;

    }

}

add_action('admin_init', 'disable_comments_redirect');



// Убираем виджет "Последние комментарии" на главной странице админки

function remove_dashboard_comments_widget() {

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

}

add_action('wp_dashboard_setup', 'remove_dashboard_comments_widget');



// Удаление ссылок на комментарии в админбаре

function remove_comments_from_admin_bar() {

    global $wp_admin_bar;

    $wp_admin_bar->remove_node('comments');

}

add_action('wp_before_admin_bar_render', 'remove_comments_from_admin_bar');



// Скрываем все комментарии с фронтенда

function hide_comments_from_frontend($comments) {

    return [];

}

add_filter('comments_array', 'hide_comments_from_frontend', 10, 2);



// Отключаем REST API для комментариев

function disable_comments_rest_api($endpoints) {

    unset($endpoints['/wp/v2/comments']);

    return $endpoints;

}

add_filter('rest_endpoints', 'disable_comments_rest_api');



// Отключаем XML-RPC для комментариев

add_filter('xmlrpc_methods', function ($methods) {

    unset($methods['wp.getComments']);

    return $methods;

});



// Удаляем атрибуты rows и cols из текстовых областей

add_filter('wpcf7_form_elements', function ($content) {

    // Удаляем атрибуты rows и cols из текстовых областей

    $content = preg_replace('/\s(rows|cols)="[^"]*"/i', '', $content);

    return $content;

});



function replace_contact_placeholders($content) {

    // Получаем данные из полей ACF

    $email = get_field('company_mail', 'option'); // Поле email из опций

    $phone = get_field('company_phone', 'option'); // Поле телефон из опций



    // Заменяем текстовые маркеры на данные из ACF

    if ($email) {

        $content = str_replace('[email]', esc_html($email), $content);

    }



    if ($phone) {

        $content = str_replace('[phone]', esc_html($phone), $content);

    }



    return $content;

}



add_filter('the_content', 'replace_contact_placeholders');

