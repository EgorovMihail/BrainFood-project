
<footer class="footer">
  <div class="footer__inner">
    <div class="footer__inner-block">
      <a  class="logo" href="<?php echo get_home_url(); ?>">
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
            <a data-goto=".main" class="footer__inner-linck" href="#">На главную</a>
          </li>
          <li class="footer__inner-item">
            <a data-goto=".section__advantages" class="footer__inner-linck" href="#">Преимущества</a>
          </li>
        </ul>
        <ul class="footer__inner-list">
          <li class="footer__inner-item">
            <a data-goto=".section__education" class="footer__inner-linck" href="#">Обучение</a>
          </li>
          <li class="footer__inner-item">
            <a data-goto=".section__courses" class="footer__inner-linck" href="#">Каталог курсов</a>
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