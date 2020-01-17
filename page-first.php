<?php
/*
Template Name: 初めて受講の方へ
*/
get_header(); ?>
</div> <!-- container解除用 --> 

<div id="first-apply">
    <div class="container">
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
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <div class="post-content first_main">
                            
                            <h2>現在Basicコース募集中教室一覧</h2>
                            <div class="row">
                            <?php
                            $basic_count=0;//Basicの数
                            //本日の日付を取得
                            $today = Date("Ymd");
                            $oneweek = Date("Ymd", strtotime("-1 week"));
                            $week = array("日", "月", "火", "水", "木", "金", "土");
                                //echo ('今日：'.$today.'<br>');
                                //echo ('1週間前：'.$oneweek);

                            // 子ページ出力のための関数
                            $children = get_children(array(
                                "post_parent"   => 4415, // ローカル20, 本番4415
                                "post_type"     => "page",
                                "post_status"   => "publish",
                                "order"         => "ASC"
                            ));
                                
                            foreach($children as $child){
                                $check = get_post_meta($child->ID, "class_select", true);
                                foreach ( (array)$check as $value ) {
                                    if($value=='class01' && get_post_meta($child->ID, "class01_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class01_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class01_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class01_time", true).'</p></div></a></div>');
                                        }
                                        
                                    }elseif($value=='class02' && get_post_meta($child->ID, "class02_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class02_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class02_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class02_time", true).'</p></div></a></div>');
                                        }
                                    }elseif($value=='class03' && get_post_meta($child->ID, "class03_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class03_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class03_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class03_time", true).'</p></div></a></div>');
                                        }
                                    }elseif($value=='class04' && get_post_meta($child->ID, "class04_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class04_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class04_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class04_time", true).'</p></div></a></div>');
                                        }
                                    }elseif($value=='class05' && get_post_meta($child->ID, "class05_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class05_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class05_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class05_time", true).'</p></div></a></div>');
                                        }
                                    }elseif($value=='class06' && get_post_meta($child->ID, "class06_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class06_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class06_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class06_time", true).'</p></div></a></div>');
                                        }
                                    }elseif($value=='class07' && get_post_meta($child->ID, "class07_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class07_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class07_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class07_time", true).'</p></div></a></div>');
                                        }
                                    }elseif($value=='class08' && get_post_meta($child->ID, "class08_name", true)=='Basic') {
                                        $limit_day=get_post_meta($child->ID, "class08_limit", true);
                                        $limit_day_format=date_format(date_create($limit_day),'Y年m月d日');
                                        $limit_day_week=$week[(int)date_format(date_create($limit_day),'w')];
                                        if(strtotime($oneweek)<strtotime($limit_day)){
                                            $basic_count++;
                                            $url=get_permalink( $child->ID );
                                            $address=get_post_meta($child->ID, "class_address", true);
                                            echo ('<div class="col-sm-4"><a href="'.$url.'"><div class="class_detail"><div class="place_detail_title">'.$child->post_title.'</div><div class="class_detail_limit">お申込み期限：'.$limit_day_format.'('.$limit_day_week.')');
                                            echo('</div><p>'.$address.'</p><p class="subtitle"><i class="far fa-calendar-alt"></i> スケジュール</p><p>'.nl2br(get_post_meta($child->ID, "class08_schedule", true)).'</p><p class="subtitle"><i class="far fa-clock"></i> 時間</p><p>'.get_post_meta($child->ID, "class08_time", true).'</p></div></a></div>');
                                        }
                                    }
                                }
                                    
                            }
                            if($basic_count==0){
                                echo('<p>現在Basicコース（初級コース）募集中の教室はありません。</p><div class="text-center" style="width:100%;"><a href="http://e-kagaku.com/top_general/classroom/" class="btn_apply">教室一覧はこちら</a></div>');
                            }else{
                                echo('<p>上記教室のBasicコースに参加する為には<span id="StY">当会の会員登録が必須</span>となります。会員登録兼お申込みフォームは以下のボタンからアクセス出来ます。</p><div class="text-center" style="width:100%;"><a href="https://goo.gl/forms/2SDryIZ85tC5amBV2" target="_blank" class="btn_apply btn_apply_cost">会員登録・お申込みはこちら</a></div>');
                            }
                            ?>
                        </div>
                        <div style="width:100%; height:5px; box-sizing:border-box;"></div>
                        
                        <?php the_content(); ?>
                            
                        <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
                        
                        </div><!--post-content-->
                    </div><!-- /post -->
                    <?php
                endwhile;
                else:?>
                    <p>no page</p>
                    <?php
                endif; ?>
    </article>
    </div>
</div>
<div class="container"> <!-- container解除用 -->
<?php get_footer(); ?>