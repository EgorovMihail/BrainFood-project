<?php

    if (!defined('ABSPATH')) {
       exit;
    }

    use Carbon_Fields\Container;
    use Carbon_Fields\Field;

    Container::make( 'post_meta', 'Дополнительные поля' )
        ->show_on_page(10)
        
         ->add_tab( 'Каталог', [
            Field::make( 'association', 'catalog_nav', 'Категории дисциплин' )
            ->set_types([
                [
                    'type'      => 'term',
                    'taxonomy'  => 'disciplin-categories',
                ]
            ] ),
            Field::make( 'association', 'catalog_disciplines', 'Дисциплины' )
            ->set_types([
                [
                    'type'      => 'post',
                    'post_type' => 'disciplin',
                ]
            ] ),
        ] );

    Container::make( 'post_meta', 'Информация о дисциплине' )
        ->show_on_post_type('disciplin')

        ->add_tab( 'Информмация о дисциплине', [
            Field::make( 'text', 'disciplin_teacher_name', 'Имя преподавателя дисциплины' ),
        ] );



?>