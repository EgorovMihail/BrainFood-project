<?php
    remove_action('wp_head',             'print_emoji_detection_script', 7 );
    remove_action('admin_print_scripts', 'print_emoji_detection_script' );
    remove_action('wp_print_styles',     'print_emoji_styles' );
    remove_action('admin_print_styles',  'print_emoji_styles' );

    remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
    remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
    remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
    remove_action('wp_head', 'rsd_link'); // remove EditURI
    remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
    remove_action('wp_head', 'rel_canonical'); //remove canonical
    remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
    remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_script( 'wp-embed' );

    add_action( 'wp_enqueue_scripts', 'brainfood_style' );
    add_action( 'wp_enqueue_scripts', 'brainfood_scripts' );

    /*отключения панели инструментов */
    add_filter('show_admin_bar', '__return_false');
    
    // динамическое подключение стилей
    function brainfood_style() {
        wp_enqueue_style( 'fontsStyle-style',  get_template_directory_uri() . '/assets/css/fontsStyle.css', array());
    	wp_enqueue_style( 'main-style', get_stylesheet_uri(), array('fontsStyle-style'));
    }

    //динамическое подключение скриптов 
    function brainfood_scripts() {
        //переопределение jquery
        wp_deregister_script( 'jquery' );
	    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.js', array(), null, true );
	    wp_enqueue_script( 'jquery' );

        //подключение моих скриптов
        if (is_page(10)) {
            wp_enqueue_script( 'vide-script', get_template_directory_uri() . '/assets/js/jquery.vide.min.js', array(jquery), null, true );
            wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array(jquery), null, true );
        }
        if (!is_page(10) && !is_page(95) && !is_page(96)) {
            wp_enqueue_script( 'mainContent-script', get_template_directory_uri() . '/assets/js/mainContent.js', array(jquery), null, true );
        } 
        if ( is_page(10) || (!is_page(95) && !is_page(96)) ) {
            wp_enqueue_script( 'teacherName-script', get_template_directory_uri() . '/assets/js/teacherName.js', array(jquery), null, true ); 
        }
        if (is_page(95) || is_page(96)) {
            wp_enqueue_script( 'mainAuthorization-script', get_template_directory_uri() . '/assets/js/mainAuthorization.js', array(jquery), null, true );
        } 
    }

    add_action( 'after_setup_theme', 'theme_support');
    function theme_support(){
        register_nav_menu('menu_disciplin','Меню дисциплин');
        register_nav_menu('menu_header_authorization','Меню авторизации в шапке');
        add_theme_support('post-thumbnails');
        add_image_size('disciplin', 320, 225, true);
    }


    add_action( 'after_setup_theme', 'crb_load' );
    function crb_load() {
        require_once(  'includes/carbon-fields/vendor/autoload.php' );
        \Carbon_Fields\Carbon_Fields::boot();
    }


    add_action('carbon_fields_register_fields', 'register_carbon_fields');
    function register_carbon_fields(){
        require_once(  'includes/carbon-fields-options/theme-options.php' );
        require_once(  'includes/carbon-fields-options/post-meta.php' );
    }

    add_action('init', 'create_global_var');
    function create_global_var(){

        global $brainfood;
        $brainfood = [
            'youtube_url' => carbon_get_theme_option('site_youtube_url'),
            'vk_url' => carbon_get_theme_option('site_vk_url'),
            'telegram_url' => carbon_get_theme_option('site_telegram_url'),
        ];
    }

    add_action( 'init', 'register_post_types' );
    function register_post_types() {
        register_post_type('disciplin', [
            'labels' => [
              'name'               => 'Дисциплины', // основное название для типа записи
              'singular_name'      => 'Дисциплина', // название для одной записи этого типа
              'add_new'            => 'Добавить дисциплину', // для добавления новой записи
              'add_new_item'       => 'Добавление дисциплины', // заголовка у вновь создаваемой записи в админ-панели.
              'edit_item'          => 'Редактирование дисциплины', // для редактирования типа записи
              'new_item'           => 'Новая дисциплина', // текст новой записи
              'view_item'          => 'Смотреть дисциплину', // для просмотра записи этого типа.
              'search_items'       => 'Искать дисципоину', // для поиска по этим типам записи
              'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
              'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
              'menu_name'          => 'Дисциплины', // название меню
            ],
            'menu_icon'          => 'dashicons-cart',
            'public'             => true,
            'menu_position'      => 5,
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],//для добавления своих полей на карточки с дисциплинами
            'rewrite'            => ['slug' => 'disciplines']
        ] );
        /*disciplin-categories - как будет называться таксономия */
        register_taxonomy('disciplin-categories', 'disciplin', [
            'labels'        => [
              'name'                        => 'Категории дисциплин',
              'singular_name'               => 'Категория дисциплины',
              'search_items'                => 'Искать дисциплину',
              'popular_items'               => 'Популярные дисциплины',
              'all_items'                   => 'Все категории',
              'edit_item'                   => 'Изменить категорию',
              'update_item'                 => 'Обновить категорию',
              'add_new_item'                => 'Добавить новую категорию',
              'new_item_name'               => 'Новое название категории',
              'separate_items_with_commas'  => 'Отделить категории запятыми',
              'add_or_remove_items'         => 'Добавить или удалить категорию',
              'choose_from_most_used'       => 'Выбрать самую популярную категорию',
              'menu_name'                   => 'Категории',
            ],
            'hierarchical'  => true,//наследование категорий
        ]);
    }
?>
