<?php 
  if ( is_user_logged_in() ) { 
      $user_id = get_current_user_id();
      $user_info = get_userdata($user_id);

      $login = $user_info->user_login;
      $user_nicename = $user_info->user_nicename;
      $email =  $user_info->user_email;

  }


?>

<!-- всплывающее окно Задать вопрос-->
<div class="popup">
  <div class="popup__dialog">
    <div class="popup__content">
      <button class="popup__content-close">&times;</button>
      <h3 class="popup__content-title">Хотите задать вопрос?</h3>

      <form action="#" class="popup__form">
        <input type="text" name="name"  placeholder="Введите ваше имя" class="popup__form-input form__input-name _req">
        <input type="text" name="lastName"  placeholder="Введите вашу фамилию" class="popup__form-input form__input-user_nicename _req">
        <input type="email" name="email"  placeholder="Введите ваш email" class="popup__form-input form__input-email _req">
        <input type="text" name="teacherEmail"  class="popup__form-input form__input-teacherEmail _req">
        <input type="text" name="teacherName"  class="popup__form-input form__input-teacherName _req">
        <textarea  name="message" class="popup__form-text _req" placeholder="Введите ваш вопрос" rows="5"></textarea>
        <button class="popup__form-button" type="submit">
          Задать вопрос
        </button>
      </form>

    </div>
  </div>
</div>


<footer class="footer">
  <div class="footer__inner">
    <div class="footer__inner-block">
      <a class="logo" href="<?php echo get_home_url(); ?>">
        <picture class="footer__logo__img">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site_logo'), 'full') ?>" alt="BrainFood" />
        </picture>
      </a>
      <h3 class="footer__title">
        Онлайн платформа для <br> обучения студентов
      </h3>
    </div>
    <div class="footer__inner-block">
      <h3 class="footer__inner-title">
        Информация
      </h3>
      <div class="footer__inner-wrap">

        <ul class="footer__inner-list">
          <li class="footer__inner-item">
            <a data-goto=".main" class="footer__inner-linck" href="<?php echo get_home_url(null, '#main'); ?>">На главную</a>
          </li>
          <li class="footer__inner-item">
            <a data-goto=".section__advantages" class="footer__inner-linck" href="<?php echo get_home_url(null, '#section__advantages'); ?>">Преимущества</a>
          </li>
        </ul>
        <ul class="footer__inner-list">
          <li class="footer__inner-item">
            <a data-goto=".section__education" class="footer__inner-linck" href="<?php echo get_home_url(null, '#section__education'); ?>">Обучение</a>
          </li>
          <li class="footer__inner-item">
            <a data-goto=".section__courses" class="footer__inner-linck" href="<?php echo get_home_url(null, '#section__courses'); ?>">Каталог курсов</a>
          </li>
        </ul>

      </div>
    </div>
    <div class="footer__inner-block">
      <h3 class="footer__inner-title">
        Мы в соц. сетях
      </h3>

      <div class="footer__inner-media">
        <?php if ($GLOBALS['brainfood']['youtube_url']) : ?>
          <a href="<?php echo $GLOBALS['brainfood']['youtube_url'] ?>">
            <img src="<?php bloginfo('template_url'); ?> /assets/icon/youtube.svg" alt="" class="footer__inner-img img-svg">
          </a>
        <?php endif; ?>
        <?php if ($GLOBALS['brainfood']['vk_url']) : ?>
          <a href="<?php echo $GLOBALS['brainfood']['vk_url'] ?>">
            <img src="<?php bloginfo('template_url'); ?> /assets/icon/vk.svg" alt="" class="footer__inner-img img-svg">
          </a>
        <?php endif; ?>
        <?php if ($GLOBALS['brainfood']['telegram_url']) : ?>
          <a href="<?php echo $GLOBALS['brainfood']['telegram_url'] ?>">
            <img src="<?php bloginfo('template_url'); ?> /assets/icon/telegram.svg" alt="" class="footer__inner-img img-svg">
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

</footer>


<?php wp_footer(); ?>
</body>

</html>

<!-- автозаполнение формы -->
<script>

  /*заполнение input  */
  let name = "<?php echo $login; ?>";
  let lastName = "<?php echo $user_nicename; ?>";
  let email = "<?php echo $email; ?>";

  if (formInputName) {
    formInputName.value = name;
    formInputUser_nicename.value = lastName;
    formInputEmail.value = email;
  }
  

</script>

