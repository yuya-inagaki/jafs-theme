<?php get_header(); ?>
<?php /* Template Name: FP, 教室申し込み| */ ?>
    <section id="main" class="container">
        <div id="posts">

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>

                    <div id="post">
                        <div class="post-header">
                            <h1><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        </div>
                        <div class="post-content">
                            <h1>教室申込</h1>
                            <p>先着順で受付いたします。万一、定員に達した場合は恐れ入りますが、参加をお断りすることがあります。 <br>
                                あらかじめご了承ください。<br>
                                連絡がない場合は、ご参加いただけます</p>

                            <?php the_content(); ?>
                            <!--日時、場所、料金はcontent()より-->

                            <h2>申し込み方法</h2>
                            <h3>フォーム</h3>
                            以下のフォームから<br>
                            会員の方は<a href="https://docs.google.com/forms/d/1rfTW29ACd6TujL2yNrC_R0Dm01qunU-76VbWqIV8wmc/viewform">こちらのフォーム</a>から<br>
                            会員でない方は<a
                                    href="https://docs.google.com/forms/d/1YIwglBUuTyPHJrFRIgWNECYTNLIfIsSNG0ZPgpZCV3k/viewform">こちらのフォーム</a>から
                            <h3>FAX</h3>
                            0749-27-5258
                            <h3>電話</h3>
                            077-546-6034
                            <h3>E-mail</h3>
                            iseki[あっと]e-kagaku.com
                            <h2>料金精算方法</h2>
                            郵便振替口座<br>
                            お申込み後、下記の口座に参加費をご納入ください。当日現地でもお支払いいただけます。<br>
                            口座名<br>
                            子どもの理科離れをなくす会<br>
                            口座番号<br>
                            ００９００－２－２５８９７４
                            <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>

                        </div><!-- /post content -->
                    </div><!-- /post -->

                    <?php
                endwhile;
            else:
                ?>

                <p>no page</p>

                <?php
            endif;
            ?>

        </div>
        <?php get_sidebar(); ?>
    </section>
<?php get_footer(); ?>