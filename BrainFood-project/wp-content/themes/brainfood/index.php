<?php get_header('content'); ?>

<?php
  $disciplin_id = get_the_ID();
  $disciplin_img_src = get_the_post_thumbnail_url($disciplin_id, 'disciplin');
  $disciplin_teacher_name = carbon_get_post_meta($disciplin_id, 'disciplin_teacher_name');
  $disciplin_categories = get_the_terms($disciplin_id, 'disciplin-categories');
?>


<div class="content">

  <sidebar class="sidebar__nav">

    <div class="sidebar__nav-circleExternal">
      <div class="sidebar__nav-circleInterior">
        <img src="<?php bloginfo('template_url'); ?> /assets/icon/svg/sidebar__nav-button.svg" alt="" class="sidebar__nav-button">
      </div>
    </div>
    <nav class="sidebar__nav-menu">

  <?php

    $home_url = home_url();
    $get_page_uri = get_permalink();

    $string = get_permalink();
    if (stristr($string, 'http://brainfood-project/disciplines/') == true) {
      $disciplin_categories_mass = [];
      foreach ($disciplin_categories as $category) {
        array_push($disciplin_categories_mass, $category->slug);
      }
      $test = $disciplin_categories_mass[0];
    }


    if ($get_page_uri !== $home_url) {
      wp_nav_menu([
        'theme_location'  => 'menu_disciplin',
        'menu'            => $test,
        'container'       => false,
        'container_class' => 'sidebar__nav-menu',
        'menu_class'      => 'sidebar__nav-list',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
      ]);
    }

  ?>

    </nav>


  </sidebar>
     

  <main class="main__content ">
    
      <?php if (have_posts()) : ?>
    <div class="main__content-wrap">
      <h3 class="main__content-title"><?php the_title(); ?></h3>
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
    <div class="question-wrap">
      <h3 class="main__content-titleQuestion">Есть вопросы - задавайте!</h3> 
      <button class="main__content-button">Задать вопрос</button>
    </div>
      
    <?php endif; ?>

  </main>

  <sidebar class="sidebar__menu">

    <div class="sidebar__menu-item">
      <a href="#" class="sidebar__menu-content">
        <img src="<?php bloginfo('template_url'); ?> /assets/icon/svg/content.svg" alt="Контент" class="sidebar__menu-img">
      </a>
    </div>

    <div class="sidebar__menu-item">
      <a href="#" class="sidebar__menu-todo">
        <img src="<?php bloginfo('template_url'); ?> /assets/icon/svg/ToDo list.svg" alt="ToDo лист" class="sidebar__menu-img">
      </a>
    </div>

    <div class="sidebar__menu-item">
      <a href="#" class="sidebar__menu-chat">
        <img src="<?php bloginfo('template_url'); ?> /assets/icon/svg/chat.svg" alt="Чат" class="sidebar__menu-img">
      </a>
    </div>

  </sidebar>

</div>



<?php get_footer('content'); ?>