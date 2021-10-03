<?php
/*
Template Name: Главная
*/
?>


<?php get_header(''); ?>
<?php
  $page_id = get_the_ID();
?>


<main id="main" class="main scroll__section" data-vide-bg="<?php bloginfo('template_url'); ?>/assets/video/working.webm">

  <div class="main__text">
    <h1 class="main__text-title">
      Платформа для <br />
      обучения студентов <br />
      BrainFood
    </h1>
    <p class="main__text-subtitle">
      Помогает оптимизировать процесс <br />
      самообразования и контролировать <br />
      прогресс.
    </p>
  </div>
  <img class="shading__layer" src="<?php bloginfo('template_url'); ?> /assets/images/background/shading__layer.png" alt="" />
</main>

<section id="section__advantages" class="section section__advantages scroll__section">
  <div class="section__title">
    <h3 class="section__title-text">Наши преимущества</h3>
  </div>

  <div class="advantages__slider">

    <div class="advantages__block">
      <div class="advantages__block-img">
        <img class="img-svg advanteges__icon" src="<?php bloginfo('template_url'); ?> /assets/images/advantages/book.svg" alt="" />
      </div>
      <div class="advantages__block-title">
        <p class="advantages__block-titletext">
          Огромная библиотека материалов
        </p>
      </div>
      <div class="advantages__block-subtitle">
        <span class="advantages__block-subtitletext">На нашем сайте собрано огромное колличество учебных материалов,
          которые доступны Вам совершенно бесплатно</span>
      </div>
    </div>

    <div class="advantages__block">
      <div class="advantages__block-img">
        <img class="img-svg advanteges__icon" src="<?php bloginfo('template_url'); ?> /assets/images/advantages/system_way.svg" alt="" />
      </div>
      <div class="advantages__block-title">
        <p class="advantages__block-titletext">
          Системный подход к образованию
        </p>
      </div>
      <div class="advantages__block-subtitle">
        <span class="advantages__block-subtitletext">Пройденный материал закрепляется с помощью прохождения
          тестирования и выполнения практических задач</span>
      </div>
    </div>

    <div class="advantages__block">
      <div class="advantages__block-img">
        <img class="img-svg advanteges__icon" src="<?php bloginfo('template_url'); ?> /assets/images/advantages/consultation.svg" alt="" />
      </div>
      <div class="advantages__block-title">
        <p class="advantages__block-titletext">
          Консультация преподавателей
        </p>
      </div>
      <div class="advantages__block-subtitle">
        <span class="advantages__block-subtitletext">Если у вас возникли вопросы Вы всегда сможете задать их
          преподавателю</span>
      </div>
    </div>

    <div class="advantages__block">
      <div class="advantages__block-img">
        <img class="img-svg advanteges__icon" src="<?php bloginfo('template_url'); ?> /assets/images/advantages/convenience.svg" alt="" />
      </div>
      <div class="advantages__block-title">
        <p class="advantages__block-titletext">Удобство использования</p>
      </div>
      <div class="advantages__block-subtitle">
        <span class="advantages__block-subtitletext">Изучать материалы можно в любое удобное для Вас время, доступ к
          учебным материалам предоставляется бессрочно.</span>
      </div>
    </div>
  </div>

</section>

<section id="section__education" class="section section__education scroll__section">
  <div class="section__title">
    <h3 class="section__title-text">
      Как проходит обучение
    </h3>
  </div>

  <div class="education__slider">
    <div class="education__block">
      <div class="education__block-number">
        <p class="education__block-numbertext">1</p>
      </div>
      <div class="education__block-title">
        <p class="education__block-titletext">Изучение темы</p>
      </div>
      <div class="education__block-subtitle">
        <p class="education__block-subtitletext">
          Осваивайте материалы в удобное для Вас время
        </p>
      </div>
      <div class="education__block-img">
        <img class="img-svg education__block-img" src="<?php bloginfo('template_url'); ?> /assets/images/education/study__topic.svg" alt="" />
      </div>
    </div>

    <div class="education__block">
      <div class="education__block-number">
        <p class="education__block-numbertext">2</p>
      </div>
      <div class="education__block-title">
        <p class="education__block-titletext">
          Выполнение задания
        </p>
      </div>
      <div class="education__block-subtitle">
        <p class="education__block-subtitletext">
          В удобном для Вас темпе.
        </p>
      </div>
      <div class="education__block-img">
        <img class="img-svg education__block-img" src="<?php bloginfo('template_url'); ?> /assets/images/education/task.svg" alt="" />
      </div>
    </div>

    <div class="education__block">
      <div class="education__block-number">
        <p class="education__block-numbertext">3</p>
      </div>
      <div class="education__block-title">
        <p class="education__block-titletext">
          Прохождение тестирования
        </p>
      </div>
      <div class="education__block-subtitle">
        <p class="education__block-subtitletext">
          Пройдите тестирование для проверки изученного материала.
          Конролируйте свой прогресс.
        </p>
      </div>
      <div class="education__block-img">
        <img class="img-svg education__block-img" src="<?php bloginfo('template_url'); ?> /assets/images/education/final_test.svg" alt="" />
      </div>
    </div>
  </div>

</section>



<section id="section__courses" class="section__courses scroll__section">
  <div class="section__courses-title">
    <h3 class="section__title-text">
      Наши курсы
    </h3>
  </div>

  <?php
  $catalog_nav = carbon_get_post_meta($page_id, 'catalog_nav');
  $catalog_nav_id = wp_list_pluck($catalog_nav, 'id');
  $catalog_nav_items = get_terms([
    'include' => $catalog_nav_id,
  ]);

  ?>

  <nav class="courses__filter">
    <ul>
      <li class="courses__filter-link">
        <button class="courses__filter-text courses__filter-text__active" data-filter="all">
          Все
        </button>
      </li>
      <?php foreach ($catalog_nav_items as $item) : ?>
        <li class="courses__filter-link">
          <button class="courses__filter-text" data-filter="<?php echo $item->slug; ?>">
            <?php echo $item->name; ?>
          </button>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <!-- вывод карточек -->
  <?php
  $catalog_disciplines = carbon_get_post_meta($page_id, 'catalog_disciplines');
  $catalog_disciplines_id = wp_list_pluck($catalog_disciplines, 'id');
  // запрос
  $catalog_disciplines_query_arg = [
    'post_type' => 'disciplin',
    'post_in' => $catalog_disciplines_id,
  ];
  $catalog_disciplines_query = new WP_Query($catalog_disciplines_query_arg);
  ?>

  <div class="course__content">
    <?php if ($catalog_disciplines_query->have_posts()) : ?>
      <?php while ($catalog_disciplines_query->have_posts()) : $catalog_disciplines_query->the_post(); ?>
        <?php echo get_template_part('disciplines-content'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div><!-- /.course__content -->

</section>

<?php get_footer(); ?>