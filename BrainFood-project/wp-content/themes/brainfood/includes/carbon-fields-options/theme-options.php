<?php

    if (!defined('ABSPATH')) {
       exit;
    }

    use Carbon_Fields\Container;
    use Carbon_Fields\Field;

    Container::make( 'theme_options', 'Настройки сайта' )

        ->add_tab( 'Общие настройки', [
            Field::make( 'image', 'site_logo', 'Логотип' ),
        ] )

        ->add_tab( 'Контакты', [
            Field::make( 'text', 'site_youtube_url', 'Ютуб' ),
            Field::make( 'text', 'site_vk_url', 'Вконтакте' ),
            Field::make( 'text', 'site_telegram_url', 'Телеграмм' ),
        ] );

?>