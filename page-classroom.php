<?php
/*
Template Name: 各教室用テンプレート
*/
get_header(); ?>
<article>
  <div class="container">
    <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
    ?>
        <div id="post">
          <div class="post-header">
            <?php if (function_exists('rdfa_breadcrumb')) {
              rdfa_breadcrumb();
            } ?>
            <h1><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </div>

          <div class="post-content classroom_main">
            <!-- 教室インフォメーション -->
            <?php if (get_field('class_info')) { ?>
              <div class="class_info">
                <div class="class_info_title"><i class="fas fa-check"></i> <?php the_title(); ?>からのおしらせ</div>
                <p><?php the_field('class_info'); ?></p>
              </div>
            <?php } ?>
            <!-- //教室インフォメーション -->

            <!-- 教室の場所 -->
            <?php if (get_field('class_place')) { ?>
              <h2>教室の場所</h2>
              <p><?php the_field('class_place'); ?></p>
            <?php } ?>
            <!-- //教室の場所 -->

            <?php if (get_field('class_address') == 'インタースクール東京校' || get_field('class_address') == 'インタースクール大阪校' || get_field('class_address') == 'インタースクール名古屋校') : ?>

              <h2>お申込み</h2>
              <p>お申し込みは<span id="StY">インタースクールHP</span>からお願いします。</p>
              <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn">お申込みはこちら</a><br>

            <?php elseif (get_field('class_address') == '日野サイエンスクラブ' || get_field('class_address') == '小笠原学園') : ?>

              <h2>お申込み</h2>
              <p>お申し込みは<span id="StY"><?php echo (get_field('class_address')); ?>HP</span>からお願いします。</p>
              <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn">お申込みはこちら</a><br>

            <?php else : ?>
              <!-- 開講前・開講中のクラス -->
              <h2>開講前・開講中のクラス</h2>
              <div class="row">

                <?php
                $basic_count = 0;
                $class_count = 0;
                $class_robo = 0;
                $class_sp = 0;

                $classes = [];
                if (get_field('class_select')) {
                  $check = get_field('class_select');
                  for ($i = 1; $i <= 8; $i++) {
                    if (in_array("class0${i}", $check)) {
                      $cs = array(
                        "name" => get_field("class0${i}_name"),
                        "schedule" => get_field("class0${i}_schedule"),
                        "time" => get_field("class0${i}_time"),
                        "cost" => get_field("class0${i}_cost"),
                        "limit" => get_field("class0${i}_limit")
                      );
                      array_push(
                        $classes,
                        $cs
                      );
                    }
                  }
                  if (in_array("classrobo", $check)) {
                    $class_robo = 1;
                  }
                  if (in_array("classsp", $check)) {
                    $class_sp = 1;
                  }
                }
                #var_dump($classes);

                //本日の日付を取得
                $today = Date("Ymd");
                $oneweek = Date("Ymd", strtotime("-1 week"));
                $week = array("日", "月", "火", "水", "木", "金", "土");
                $levels = array("Beginner", "Basic", "Advanced 1", "Advanced 2", "Super Advanced 1", "Super Advanced 2", "Premiere Applied 1", "Premiere Applied 2", "Premiere Applied 3", "Premiere Applied 4", "Professional Basic(前期)", "Professional Basic(後期)", "Professional Advanced1", "Professional Advanced2", "Professional VBA");

                if (get_field('class_select')) {
                  foreach ($levels as $level) {
                    for ($i = 0; $i <= 8; $i++) {
                      #echo $classes[$i]["name"];
                      if ($level == $classes[$i]["name"]) { ?>
                        <div class="col-sm-6 col-xs-12">
                          <div class="class_detail">
                            <div class="class_detail_title"><?php echo $classes[$i]["name"]; ?></div>
                            <?php
                            $limit_day = $classes[$i]["limit"];
                            $limit_day_format = date_format(date_create($limit_day), 'Y年m月d日');
                            $limit_day_week = $week[(int) date_format(date_create($limit_day), 'w')]; ?>
                            <?php if (strtotime($oneweek) < strtotime($limit_day)) : ?>
                              <div class="class_detail_limit">お申込み期限：<?php echo ($limit_day_format) . "(" . $limit_day_week . ")"; ?></div>
                            <?php else : ?>
                              <div class="class_detail_limit class_detail_open">現在開講中</div>
                            <?php endif; ?>
                            <p class="subtitle"><i class="fas fa-calendar-alt"></i> スケジュール</p>
                            <p><?php echo $classes[$i]["schedule"]; ?></p>
                            <p class="subtitle"><i class="fas fa-clock"></i> 時間</p>
                            <p><?php echo $classes[$i]["time"]; ?></p>
                            <p class="subtitle"><i class="fas fa-yen-sign"></i> 参加費</p>
                            <p><?php echo $classes[$i]["cost"]; ?></p>
                            <?php if ($classes[$i]["name"] == 'Basic' || $classes[$i]["name"] == 'Beginner') : $basic_count++; ?>
                              <?php if ($classes[$i]["name"] == 'Basic') : ?>
                                <div class="text-center"><a href="https://goo.gl/forms/2SDryIZ85tC5amBV2" target="_blank" class="btn">初めてのお申込みはこちら</a></div>
                              <?php else : ?>
                                <div class="text-center"><a href="https://forms.gle/8c9dhrS3k9zuYPAD6" target="_blank" class="btn">初めてのお申込みはこちら</a></div>
                              <?php endif; ?>
                            <?php else : $class_count++;
                            endif; ?>
                          </div>
                        </div><?php
                            }
                          }
                        }

                        // ロボット研究室 -->
                        if ($class_robo == 1) { ?>
                    <div class="col-sm-6 col-xs-12">
                      <div class="class_detail">
                        <div class="class_detail_title class_detail_robo">ロボット研究室</div>
                        <p>*こちらの講座は，各回ごとの参加が可能です．</p>
                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                        <p><?php the_field('classrobo_schedule'); ?></p>
                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                        <p><?php the_field('classrobo_time'); ?></p>
                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                        <p><?php the_field('classrobo_cost'); ?></p>
                        <div class="text-center">
                          <a href="<?php the_field('classrobo_apply'); ?>" target="_blank" class="btn green">お申込みはこちら</a>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <!-- 特別授業 -->
                  <?php if ($class_sp == 1) { ?>
                    <div class="col-sm-6 col-xs-12">
                      <div class="class_detail">
                        <div class="class_detail_title class_detail_sp"><?php the_field('classsp_name'); ?></div>
                        <p><?php the_field('classsp_explain'); ?></p>
                        <p class="subtitle"><i class="far fa-calendar-alt"></i> 日程・時間</p>
                        <p><?php the_field('classsp_schedule'); ?></p>
                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                        <p><?php the_field('classsp_cost'); ?></p>
                        <div class="text-center">
                          <a href="<?php the_field('classsp_apply'); ?>" target="_blank" class="btn pink">お申込みはこちら</a>
                        </div>
                      </div>
                    </div><?php
                        }
                        //特別授業
                      } else {
                        echo "<p>現在開講中のクラスはありません</p>";
                      } ?>
              </div><!-- END .row -->
              <!-- //開講前・開講中のクラス -->

              <!-- 参加費・教材費・カリキュラム -->
              <div class="text-center">
                <a href="http://e-kagaku.com/academy/curriculum/" target="_blank" class="btn pink">参加費・教材・カリキュラムはこちら</a>
              </div>
              <!-- //参加費・教材費・カリキュラム -->

              <!-- お申込み -->
              <h2>お申込み</h2>
              <?php if ($basic_count == 0 && $class_count != 0) : ?>
                <p><b>継続教室をすでに受講されている方</b>のお申し込みはこちらからお願い致します。</p>
                <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn">継続教室お申込みはこちら</a><br>
                <p>※当日の機材や講義内容の関係上、事前に人数確認を行っているため、<span id="StY">必ず期限内にお申込みください。</span></p>
              <?php elseif ($basic_count != 0 && $class_count == 0) : ?>
                <p><b>始めて受講される方</b>はこちらからお申し込みをお願い致します。</p>
                <a href="https://forms.gle/8c9dhrS3k9zuYPAD6" target="_blank" class="btn pink">初めて受講の方はこちら</a>
              <?php else : ?>
                <p><b>始めて受講される方</b>はこちらからお申し込みをお願い致します。</p>
                <a href="https://forms.gle/8c9dhrS3k9zuYPAD6" target="_blank" class="btn pink">初めて受講の方はこちら</a><br><br>
                <p><b>継続教室をすでに受講されている方</b>のお申し込みはこちらからお願い致します。</p>
                <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn">継続教室お申込みはこちら</a><br>
                <p>※当日の機材や講義内容の関係上、事前に人数確認を行っているため、<span id="StY">必ず期限内にお申込みください。</span></p>

              <?php endif; ?>
              <!-- //お申込み -->

              <!-- 補習・振替 -->
              <?php if (get_field('class_extra') == 'true') : ?>
                <h2>欠席・振替・補習制度</h2>
                <?php the_field('class_extra_main'); ?>
                <div>
                  <a href="https://goo.gl/forms/zUYm9IcidqmUrGBJ3" target="_blank" class="btn orange">欠席・振替・補習のお申込みはこちら</a>
                </div>
              <?php endif; ?>
              <!-- //補習・振替 -->

            <?php endif; //英語塾分岐終了
            ?>

            <?php the_content(); ?>
            <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
          </div>
        </div><!-- /post -->
      <?php
      endwhile;
    else : ?>
      <p>no page</p>
    <?php
    endif; ?>
  </div>
</article>
<?php get_footer(); ?>