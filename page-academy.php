<?php
/*
Template Name: e-kagakuアカデミーTOP
*/
get_header(); ?>
<div id="academy">
  <div class="slider-wrapper">
    <div class="slider-box">
      <carousel
      :autoplay="true"
      :autoplay-timeout="5000"
      :loop="true"
      :per-page="1"
      :speed="1000"
      >
        <slide>
          <div class="slider slider01"></div>
        </slide>
        <slide>
          <div class="slider slider02"></div>
        </slide>
        <slide>
          <div class="slider slider03"></div>
        </slide>
        <slide>
          <div class="slider slider04"></div>
        </slide>
      </carousel>
    </div>
    <div class="sidebanner-box">
      <a class="taiken" href="https://global-science.or.jp/robo/" target="_blank">体験教室<br>のお申込</a>
      <a class="apply" href="https://e-kagaku.com/academy/member_apply/">会員登録<br>はこちら</a>
    </div>
    <img class="point" src="<?php bloginfo('template_url'); ?>/img/academy/icon-learn-real.png" alt="本物で学ぶ">
  </div>
</div>

<script type="text/javascript">
  var app = new Vue({
    el: "#academy",
    components: {
      'carousel': VueCarousel.Carousel,
      'slide': VueCarousel.Slide
    }
  })
</script>

<div class="container">
  <h1>e-kagaku アカデミーとは</h1>
  <?php
    if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
          <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>