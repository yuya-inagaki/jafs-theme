<?php
/*カスタム投稿タイプ*/

// カスタム投稿タイプを作成する
add_action('init', 'add_websites_post_type');
function add_websites_post_type() {
  //カスタム投稿タイプ（"custom"）
  register_post_type(
    'users', array(
      'label' => 'ライター',  //ラベル名
      'hierarchical' => false,  //falseの場合、階層構造なし
      'public' => true,   //通常はtrue
      'has_archive' => true,    //trueでindexページを生成
      'show_in_rest' => false,  //旧編集画面を有効に
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}

function add_user_info_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	add_meta_box( 'article_user', '<span class="needornot need">必須</span>この記事のライター', 'article_user_fields', 'post', 'side', 'default');
	add_meta_box( 'user_readme', '編集方法（編集者向け）', 'user_readme_fields', 'users', 'side', 'default');
	add_meta_box( 'user_setting', '<span class="needornot not">任意</span>ライターの情報', 'insert_user_fields', 'users', 'normal');
	add_meta_box( 'user_header_image', '<span class="needornot not">任意</span>ヘッダーイメージ', 'insert_header_image_fields', 'users', 'normal');
}
add_action('admin_menu', 'add_user_info_fields');

// カスタムフィールドの入力エリア
function article_user_fields() {
	global $post;
  echo '<input type="text" name="user_id" value="'.get_post_meta($post->ID, 'user_id', true).'" placeholder="ユーザーIDを入力" width="100%" />';
  if ($user_id = get_post_meta($post->ID, 'user_id', true)){
    echo '<div style="display: flex; margin-top: 10px;">
      <div style="max-width: 80px;"><img src="'. get_the_post_thumbnail_url($user_id,'medium') .'"></div>
      <div style="padding: 10px;">'. get_the_title( $user_id ) .'<br><a class="btn small" target="_blank" href="'. esc_url( home_url( '/users' ) ) .'/'. $user_id .'">ユーザーページ</a></div>
    </div>';
  }
}
function insert_user_fields() {
	global $post;
	//下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
	echo '<br><span class="needornot not">任意</span><span class="field_title">Twitter</span>*IDのみ入力してください<br><input type="text" name="twitter_id" value="'.get_post_meta($post->ID, 'twitter_id', true).'" placeholder="QuliiJP" size="50" /><br><br>';
	echo '<span class="needornot not">任意</span><span class="field_title">Facebook</span>*IDのみ入力してください<br><input type="text" name="facebook_id" value="'.get_post_meta($post->ID, 'facebook_id', true).'" placeholder="quliijp" size="50" /><br><br>';
	echo '<span class="needornot not">任意</span><span class="field_title">URL</span>*ウェブサイト等の宣伝したいURLが存在する場合は入力<br><input type="text" name="site_address" value="'.get_post_meta($post->ID, 'site_address', true).'" placeholder="https://qulii.jp" size="50" /><br>';
}
function user_readme_fields() {
  echo '<b><span class="field_title">Step1.</span> ライターのユーザー名を記述</b><br>ラーターの本名もしくはニックネームを最上部のタイトルを追加箇所に入力<br><br>';
  echo '<b><span class="field_title">Step2.</span> ライターの紹介文を記述</b><br>ラーターの紹介文をテキストフィールドに入力<br><br>';
  echo '<b><span class="field_title">Step3.</span> ライターの情報を入力</b><br>SNS等のライターの情報を入力<br><br>';
  echo '<b><span class="field_title">Step4.</span> ライターの画像を設定</b><br>ライターのアイコンがあれば設定、ない場合は未設定で良い';
}
function custom_metabox_edit_form_tag(){
  echo ' enctype="multipart/form-data"';
}
//画像をアップする場合は、multipart/form-dataの設定が必要なので、post_edit_form_tagをフックしてformタグに追加
add_action('post_edit_form_tag', 'custom_metabox_edit_form_tag');

// カスタムフィールドの入力エリア
function insert_header_image_fields(){
  global $post;
  $header_image = get_post_meta($post->ID,'header_image',true);
  echo '画像： <input type="file" name="header_image" accept="image/*" /><br>';
  if(isset($header_image) && strlen($header_image) > 0){
    echo '<img style="width: 200px;display: block;margin: 1em;" src="'.wp_get_attachment_url($header_image).'">';
  }
}

// カスタムフィールドの値を保存
function save_article_fields( $post_id ) {
	if(!empty($_POST['user_id'])){ //題名が入力されている場合
		update_post_meta($post_id, 'user_id', $_POST['user_id'] ); //値を保存
	}else{ //題名未入力の場合
		delete_post_meta($post_id, 'user_id'); //値を削除
	}
}
add_action('save_post', 'save_article_fields');

function save_user_fields( $post_id ) {
	if(!empty($_POST['twitter_id'])){ //題名が入力されている場合
		update_post_meta($post_id, 'twitter_id', $_POST['twitter_id'] ); //値を保存
	}else{ //題名未入力の場合
		delete_post_meta($post_id, 'twitter_id'); //値を削除
	}
	
	if(!empty($_POST['facebook_id'])){
		update_post_meta($post_id, 'facebook_id', $_POST['facebook_id'] );
	}else{
		delete_post_meta($post_id, 'facebook_id');
	}
	
	if(!empty($_POST['site_address'])){
		update_post_meta($post_id, 'site_address', $_POST['site_address'] );
	}else{
		delete_post_meta($post_id, 'site_address');
  }
  
  if(isset($_FILES['header_image']) && $_FILES["header_image"]["size"] !== 0){
    $file_name = basename($_FILES['header_image']['name']);
    $file_name = trim($file_name);
    $file_name = str_replace(" ", "-", $file_name);

    $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
    $upload_file = $_FILES['header_image']['tmp_name'];
    $upload_path = $wp_upload_dir['path'].'/'.$file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
    //画像ファイルをuploadディクレトリに移動させる
    move_uploaded_file($upload_file,$upload_path);

    $file_type = $_FILES['header_image']['type'];
    //正規表現で拡張子なしのスラッグ名を生成
    $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));

    if(file_exists($upload_path)){
      //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
      $attachment = array(
        'guid'           => $wp_upload_dir['url'].'/'.basename($file_name), 
        'post_mime_type' => $file_type, 
        'post_title' => $slug_name, 
        'post_content' => '', 
        'post_status' => 'inherit'
      );
      //添付ファイルを追加
      $attach_id = wp_insert_attachment($attachment,$upload_path,$post_id);
      if(!function_exists('wp_generate_attachment_metadata')){
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
      }
      //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
      $attach_data = wp_generate_attachment_metadata($attach_id,$upload_path);
      wp_update_attachment_metadata($attach_id,$attach_data);
      //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
      update_post_meta($post_id, 'header_image',$attach_id);
    }else{
      //保存失敗
      echo '画像保存に失敗しました';
      exit;
    }
  }
}
add_action('save_post', 'save_user_fields');


// ログイン画面のスタイル変更
function login_logo() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/css/login.css" />';
}
//ロゴ画像のリンク先変更
function custom_login_logo_url() {
	return get_bloginfo('url');
}
//ロゴ画像のリンクタイトル変更
function custom_login_logo_title() {
	return get_option('blogname');
}
add_action('login_head', 'login_logo');
add_filter('login_headerurl', 'custom_login_logo_url' );
add_action('login_head', 'login_logo');

function my_admin_style(){
  wp_enqueue_style( 'my_admin_style', get_template_directory_uri().'/css/admin_style.css' );
}
add_action( 'admin_enqueue_scripts', 'my_admin_style' );

function my_theme_customize_register( $wp_customize ) {
  /* セクション追加 */
  $wp_customize->add_section( 'seo_setting', array(
    'title' =>'SEO関連',
    'priority' => 100,
  ));
  $wp_customize->add_setting('meta_description', array(
    'type' => 'option',
  ));
  $wp_customize->add_control( 'meta_description', array(
    'settings' => 'meta_description',
    'label' => 'サイトディスクリプション',
    'section' => 'seo_setting',
    'type' => 'textarea',
  ));
  /* セクション追加 */
  $wp_customize->add_section( 'ad_setting', array(
    'title' =>'広告設定',
    'priority' => 100,
  ));
  $wp_customize->add_setting('sidebar_ad1', array(
    'type' => 'option',
  ));
  if(class_exists('WP_Customize_Image_Control')):
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sidebar_ad1', array(
      'settings' => 'sidebar_ad1',
      'label' => 'サイドバー広告1',
      'section' => 'ad_setting',
    )));
  endif;
  $wp_customize->add_setting('sidebar_ad1_link', array(
    'type' => 'option',
  ));
  $wp_customize->add_control( 'sidebar_ad1_link', array(
    'settings' => 'sidebar_ad1_link',
    'label' => 'サイドバー広告1 リンク先',
    'section' => 'ad_setting',
    'type' => 'text',
  ));
}
add_action( 'customize_register', 'my_theme_customize_register' );