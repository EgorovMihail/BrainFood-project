<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="/favicon.ico" />

  <title>BrainFood__new</title>

  <?php wp_head(); ?>
</head>

<body>


  <header class="header__content">
    <div class="header__inner">

      <a class="logo" href="<?php echo get_home_url(); ?>">
        <picture class="logo__img">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site_logo'), 'full') ?>" alt="BrainFood" />
        </picture>
      </a>
      <nav class="menu">
        <ul class="menu__list">
          <li class="menu__list-item">
            <a data-goto=".main" class="menu__list-link active" href="<?php echo get_home_url(null, '#main'); ?>">
              на главную
            </a>
          </li>
          <li class="menu__list-item">
            <a data-goto=".section__advantages" class="menu__list-link" href="<?php echo get_home_url(null, '#section__advantages'); ?>">
              преимущества
            </a>
          </li>
          <li class="menu__list-item">
            <a data-goto=".section__education" class="menu__list-link" href="<?php echo get_home_url(null, '#section__education'); ?>">обучение</a>
          </li>
          <li class="menu__list-item">
            <a data-goto=".section__courses" class="menu__list-link" href="<?php echo get_home_url(null, '#section__courses'); ?>">каталог курсов</a>
          </li>
        </ul>

      </nav>

      
      <div class="header__user__registration">
        <nav class="nav-header__user__registration">
          <?php     
            wp_nav_menu( [
	            'theme_location'  => 'menu_header_authorization',
	            'menu'            => 'Меню авторизации в шапке', 
	            'container'       => null, 
	            'menu_class'      => 'nav-header__user__registration', 
            ] );
          ?>
        </nav>
      </div>

      <div class="header__btn-wrap">
        <div class="header__btn-burger">
          <span></span>
        </div>
      </div>

    </div>
  </header>