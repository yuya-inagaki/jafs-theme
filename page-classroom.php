<?php
/*
Template Name: 各教室用テンプレート
*/
get_header(); ?>
    <article>
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
                        <?php if( get_field('class_info') ) { ?>
                            <div class="class_info">
                                <div class="class_info_title"><i class="fas fa-check"></i> <?php the_title(); ?>からのおしらせ</div>
                                <p><?php the_field('class_info'); ?></p>
                            </div>
                        <?php } ?>
                        <!-- //教室インフォメーション -->

                        <!-- 教室の場所 -->
                        <?php if( get_field('class_place') ) { ?>
                            <h2>教室の場所</h2>
                            <p><?php the_field('class_place'); ?></p>
                        <?php } ?>
                        <!-- //教室の場所 -->

                        <?php if( get_field('class_address')=='インタースクール東京校' || get_field('class_address')=='インタースクール大阪校' || get_field('class_address')=='インタースクール名古屋校' ) : ?>

                        <h2>お申込み</h2>
                        <p>お申し込みは<span id="StY">インタースクールHP</span>からお願いします。</p>
                        <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn_apply">お申込みはこちら</a><br>
                        
                        <?php elseif( get_field('class_address')=='日野サイエンスクラブ' || get_field('class_address')=='小笠原学園' ) : ?>
                        
                        <h2>お申込み</h2>
                        <p>お申し込みは<span id="StY"><?php echo(get_field('class_address')); ?>HP</span>からお願いします。</p>
                        <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn_apply">お申込みはこちら</a><br>

                        <?php else: ?>
                        <!-- 開講前・開講中のクラス -->
                        <h2>開講前・開講中のクラス</h2>
                        <div class="row">
                            
                        <?php 
                            $basic_count=0; 
                            $class_count=0;
                            $cs01_name="none";
                            $cs02_name="none";
                            $cs03_name="none";
                            $cs04_name="none";
                            $cs05_name="none";
                            $cs06_name="none";
                            $cs07_name="none";
                            $cs08_name="none";
                            $class_robo=0;
                            $class_sp=0;
                            //本日の日付を取得
                            $today = Date("Ymd");
                            $oneweek = Date("Ymd", strtotime("-1 week"));
                            $week = array("日", "月", "火", "水", "木", "金", "土");
                            $levels = array("Beginner", "Basic", "Advanced 1", "Advanced 2","Super Advanced 1", "Super Advanced 2", "Premiere Applied 1", "Premiere Applied 2", "Premiere Applied 3", "Premiere Applied 4", "Professional Basic(前期)", "Professional Basic(後期)","Professional Advanced1", "Professional Advanced2", "Professional VBA");
                            ?>
                        <?php if( get_field('class_select') ) : ?>
                            <?php $check = get_field('class_select');
                                foreach ( (array)$check as $value ) { ?>
                                <!-- 並び替えアルゴリズム -->
                                <?php
                                    if($value=='class01') {$cs01_name=get_field('class01_name');}
                                    if($value=='class02') {$cs02_name=get_field('class02_name');}
                                    if($value=='class03') {$cs03_name=get_field('class03_name');}
                                    if($value=='class04') {$cs04_name=get_field('class04_name');}
                                    if($value=='class05') {$cs05_name=get_field('class05_name');}
                                    if($value=='class06') {$cs06_name=get_field('class06_name');}
                                    if($value=='class07') {$cs07_name=get_field('class07_name');}
                                    if($value=='class08') {$cs08_name=get_field('class08_name');}
                                    if($value=='classrobo') {$class_robo=1;}
                                    if($value=='classsp') {$class_sp=1;}
                                ?>
                                <!-- //並び替えアルゴリズム -->

                            <?php } ?>
                            <?php foreach( (array)$levels as $level ){
                                if($level==$cs01_name){?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class01_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class01_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class01_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class01_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class01_cost'); ?></p>
                                        <?php if(get_field('class01_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++;  endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs02_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class02_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class02_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class02_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class02_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class02_cost'); ?></p>
                                        <?php if(get_field('class02_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs03_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class03_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class03_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class03_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class03_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class03_cost'); ?></p>
                                        <?php if(get_field('class03_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs04_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class04_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class04_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class04_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class04_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class04_cost'); ?></p>
                                        <?php if(get_field('class04_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs05_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class05_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class05_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class05_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class05_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class05_cost'); ?></p>
                                        <?php if(get_field('class05_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs06_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class06_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class06_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class06_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class06_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class06_cost'); ?></p>
                                        <?php if(get_field('class06_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs07_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class07_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class07_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class07_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class07_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class07_cost'); ?></p>
                                        <?php if(get_field('class07_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php }if($level==$cs08_name){ ?>
                                    <div class="col-sm-6 col-xs-12">
                                    <div class="class_detail">
                                        <div class="class_detail_title"><?php the_field('class08_name'); ?></div>
                                        <?php 
                                        $limit_day=get_field('class08_limit');
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')]; ?>
                                        <?php if(strtotime($oneweek) < strtotime($limit_day)): ?>
                                            <div class="class_detail_limit">お申込み期限：<?php echo($limit_day_format)."(".$limit_day_week.")"; ?></div>
                                        <?php else: ?>
                                            <div class="class_detail_limit class_detail_open">現在開講中</div>
                                        <?php endif; ?>
                                        <p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p>
                                        <p><?php the_field('class08_schedule'); ?></p>
                                        <p class="subtitle"><i class="far fa-clock"></i> 時間</p>
                                        <p><?php the_field('class08_time'); ?></p>
                                        <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                        <p><?php the_field('class08_cost'); ?></p>
                                        <?php if(get_field('class08_name')=='Basic') : $basic_count++; ?>
                                            <div class="text-center"><a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply">初めてのお申込みはこちら</a></div>
                                        <?php else: $class_count++; endif; ?>
                                    </div>
                                    </div>
                                <?php } ?>
                            <?php }?>
                            
                            <!-- ロボット研究室 -->
                            <?php if($class_robo==1) { ?>
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
                                        <a href="<?php the_field('classrobo_apply'); ?>" target="_blank" class="btn_apply btn_apply_robo">お申込みはこちら</a>
                                    </div>
                                </div>
                                </div>
                            <?php } ?>
                            <!-- 特別授業 -->
                            <?php if($class_sp==1) { ?>
                                <div class="col-sm-6 col-xs-12">
                                <div class="class_detail">
                                    <div class="class_detail_title class_detail_sp"><?php the_field('classsp_name'); ?></div>
                                    <p><?php the_field('classsp_explain'); ?></p>
                                    <p class="subtitle"><i class="far fa-calendar-alt"></i> 日程・時間</p>
                                    <p><?php the_field('classsp_schedule'); ?></p>
                                    <p class="subtitle"><i class="far fa-check-square"></i> 参加費</p>
                                    <p><?php the_field('classsp_cost'); ?></p>
                                    <div class="text-center">
                                        <a href="<?php the_field('classsp_apply'); ?>" target="_blank" class="btn_apply btn_apply_sp">お申込みはこちら</a>
                                    </div>
                                </div>
                                </div>
                            <?php } ?>
                            <!-- //特別授業 -->
                        <?php else: ?>
                        <p>現在開講中のクラスはありません</p>
                        <?php endif; ?>
                        </div><!-- END .row -->
                        <!-- //開講前・開講中のクラス -->
                        
                        <!-- 参加費・教材費・カリキュラム -->
                        <div class="text-center">
                            <a href="http://e-kagaku.com/top_general/curriculum/" target="_blank" class="btn_apply btn_apply_cost">参加費・教材・カリキュラムはこちら</a>
                        </div>
                        <!-- //参加費・教材費・カリキュラム -->

                        <!-- お申込み -->
                        <h2>お申込み</h2>
                        <?php if($basic_count==0 && $class_count!=0): ?> 
                        <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn_apply">継続教室お申込みはこちら</a><br>
                        <p>※当日の機材や講義内容の関係上、事前に人数確認を行っているため、<span id="StY">必ず期限内にお申込みください。</span></p>
                        <a href="https://goo.gl/forms/Giep7GXh9EdCGt9I3" target="_blank" class="btn_apply btn_apply_new">会員お申込みはこちら</a>
                        <?php elseif($basic_count!=0 && $class_count==0): ?>
                        <p>Basicコースを始めて受講される方は会員登録をお願い致します。</p>
                        <a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply btn_apply_new">初めて受講の方はこちら</a>
                        <?php else: ?>
                        <p>Basicコースを始めて受講される方は会員登録をお願い致します。</p>
                        <a href="http://e-kagaku.com/top_general/member_apply/" target="_blank" class="btn_apply btn_apply_new">初めて受講の方はこちら</a><br>
                        
                        
                        <a href="<?php the_field('class_apply'); ?>" target="_blank" class="btn_apply">継続教室お申込みはこちら</a><br>
                        <p>※当日の機材や講義内容の関係上、事前に人数確認を行っているため、<span id="StY">必ず期限内にお申込みください。</span></p>
                        
                        <?php endif; ?>
                        <!-- //お申込み -->

                        <!-- 補習・振替 -->
                        <?php if( get_field('class_extra')=='true' ) : ?>
                        <h2>欠席・振替・補習制度</h2>
                        <?php the_field('class_extra_main'); ?>
                        <a href="https://goo.gl/forms/zUYm9IcidqmUrGBJ3" target="_blank" class="btn_apply btn_apply_hoshu">欠席・振替・補習のお申込みはこちら</a>
                        <?php endif; ?>
                        <!-- //補習・振替 -->

                        <?php endif; //英語塾分岐終了?>

                        <?php the_content(); ?>
                        <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
                    </div>
                </div><!-- /post -->
                <?php
            endwhile;
        else:?>
            <p>no page</p>
            <?php
        endif; ?>

    </article>
<?php get_footer(); ?>