<!-- 404.php -->
<?php get_header(); ?>
<article>
    <div id="post">
        <div class="post-header">
            <div class="text-center">
                <h1>指定されたページは存在しませんでした。</h1>
                <img src="<?php bloginfo('template_url'); ?>/img/404error.jpg" alt="ページが存在しません" style="width:100%; max-width:700px;">
                <p>ご覧のページは現在存在しません。申し訳ありませんがトップページよりアクセスお願いします。<br>教室申込や教材購入などは上部メニューまたはトップページから移動できます。</p>
                <p><a href="<?php echo home_url(); ?>">トップページへ戻る</a></p>
            </div>
        </div>
    </div>
</article>
<?php get_footer(); ?>