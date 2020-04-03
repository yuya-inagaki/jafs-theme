<?php
// add_option
add_option('topnews_title');
add_option('topnews_url');
add_option('voice01');
add_option('voice02');
add_option('voice03');
add_option('voice04');
add_option('voice05');
add_option('voice_teacher01');
add_option('voice_teacher02');
add_option('voice_teacher03');
add_option('voice_teacher04');
add_option('voice_teacher05');
add_option('voice_zoom01');
add_option('voice_zoom02');
add_option('voice_zoom03');
add_option('voice_zoom04');
add_option('voice_zoom05');

// update_option
if ($_REQUEST['topnews_title']) update_option('topnews_title', $_REQUEST['topnews_title']);
if ($_REQUEST['topnews_url']) update_option('topnews_url', $_REQUEST['topnews_url']);
if ($_REQUEST['voice01']) update_option('voice01', $_REQUEST['voice01']);
if ($_REQUEST['voice02']) update_option('voice02', $_REQUEST['voice02']);
if ($_REQUEST['voice03']) update_option('voice03', $_REQUEST['voice03']);
if ($_REQUEST['voice04']) update_option('voice04', $_REQUEST['voice04']);
if ($_REQUEST['voice05']) update_option('voice05', $_REQUEST['voice05']);
if ($_REQUEST['voice_teacher01']) update_option('voice_teacher01', $_REQUEST['voice_teacher01']);
if ($_REQUEST['voice_teacher02']) update_option('voice_teacher02', $_REQUEST['voice_teacher02']);
if ($_REQUEST['voice_teacher03']) update_option('voice_teacher03', $_REQUEST['voice_teacher03']);
if ($_REQUEST['voice_teacher04']) update_option('voice_teacher04', $_REQUEST['voice_teacher04']);
if ($_REQUEST['voice_teacher05']) update_option('voice_teacher05', $_REQUEST['voice_teacher05']);
if ($_REQUEST['voice_zoom01']) update_option('voice_zoom01', $_REQUEST['voice_zoom01']);
if ($_REQUEST['voice_zoom02']) update_option('voice_zoom02', $_REQUEST['voice_zoom02']);
if ($_REQUEST['voice_zoom03']) update_option('voice_zoom03', $_REQUEST['voice_zoom03']);
if ($_REQUEST['voice_zoom04']) update_option('voice_zoom04', $_REQUEST['voice_zoom04']);
if ($_REQUEST['voice_zoom05']) update_option('voice_zoom05', $_REQUEST['voice_zoom05']);
?>

<div id="icon-options-general" class="icon32"></div>

<h1>追加設定</h1>


<h2>1. トップページ最重要ニュース</h2>
<p>トップページに表示する最重要ニュースの設定をできます。</p>
<form method="post" action="admin.php?page=add_settings">
  <table class="form-table">
    <tr valign="top">
      <th scope="row"><label for="topnews_title">最重要ニュースの内容</label></th>
      <td><input name="topnews_title" type="text" style="width:100%; max-width:600px;" value="<?php echo get_option('topnews_title'); ?>" class="regular-text">
    </tr>
    <tr valign="top">
      <th scope="row"><label for="topnews_url">最重要ニュースのリンク</label></th>
      <td><input name="topnews_url" type="text" value="<?php echo get_option('topnews_url'); ?>" class="regular-text">
    </tr>
  </table>

  <p class="submit">
    <input type="submit" name="submit" id="submit" class="button-primary" value="最重要ニュースの変更を保存">
  </p>

</form>

<hr>

<h2>2. 保護者の意見</h2>
<p>保護者の意見の設定をできます。</p>

<form method="post" action="admin.php?page=add_settings">
  <table class="form-table">
    <tr valign="top">
      <th scope="row"><label for="voice01">保護者の意見01</label></th>
      <td><textarea name="voice01" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice01')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice02">保護者の意見02</label></th>
      <td><textarea name="voice02" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice02')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice03">保護者の意見03</label></th>
      <td><textarea name="voice03" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice03')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice04">保護者の意見04</label></th>
      <td><textarea name="voice04" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice04')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice05">保護者の意見05</label></th>
      <td><textarea name="voice05" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice05')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_teacher01">先生の意見01</label></th>
      <td><textarea name="voice_teacher01" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_teacher01')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_teacher02">先生の意見02</label></th>
      <td><textarea name="voice_teacher02" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_teacher02')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_teacher03">先生の意見03</label></th>
      <td><textarea name="voice_teacher03" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_teacher03')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_teacher04">先生の意見04</label></th>
      <td><textarea name="voice_teacher04" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_teacher04')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_teacher05">先生の意見05</label></th>
      <td><textarea name="voice_teacher05" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_teacher05')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_zoom01">遠隔講座意見01</label></th>
      <td><textarea name="voice_zoom01" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_zoom01')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_zoom02">遠隔講座意見02</label></th>
      <td><textarea name="voice_zoom02" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_zoom02')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_zoom03">遠隔講座意見03</label></th>
      <td><textarea name="voice_zoom03" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_zoom03')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_zoom04">遠隔講座意見04</label></th>
      <td><textarea name="voice_zoom04" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_zoom04')); ?></textarea>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="voice_zoom05">遠隔講座意見05</label></th>
      <td><textarea name="voice_zoom05" style="width:100%; max-width:600px;"><?php echo esc_textarea(get_option('voice_zoom05')); ?></textarea>
    </tr>
  </table>

  <p class="submit">
    <input type="submit" name="submit" id="submit" class="button-primary" value="保護者の意見の変更を保存">
  </p>

</form>


<hr>

<p>管理者：稲垣有哉<br>問い合わせ先：yuya1756@live.jp</p>