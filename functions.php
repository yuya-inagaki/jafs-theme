<?php
//head整理
// remove_action( ‘wp_head’, ‘feed_links’, 2 );
// remove_action( ‘wp_head’, ‘feed_links_extra’, 3 );
// remove_action( ‘wp_head’, ‘rsd_link’ );
// remove_action( ‘wp_head’, ‘wlwmanifest_link’ );
// remove_action( ‘wp_head’, ‘index_rel_link’ );
// remove_action( ‘wp_head’, ‘wp_generator’ );
// remove_action( ‘wp_head’, ‘rel_canonical’ );

//CSS読み込み
function jafs_enqueue_styles() {
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'jafs_enqueue_styles' );

//ダッシュボードでメニューをサポートする
add_theme_support('menus');

//ダッシュボードでカスタムヘッダーをサポートする
add_theme_support('custom-header');

//
add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);

//
function description_in_nav_menu($countertem_output, $countertem)
{
	return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br /><span>{$countertem->attr_title}</span><", $countertem_output);
}
//アイキャッチ画像の追加を有効
add_theme_support('post-thumbnails');
// ユーザープロフィールの項目のカスタマイズ
function my_user_meta($wb) {
	//項目の追加
	$wb['member_code'] = '会員番号';
	// delete
	unset($wb['aim']);
	unset($wb['yim']);
	unset($wb['jabber']);
	return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);

//////////////////////////////////////////////////
//カスタム投稿タイプの追加
//////////////////////////////////////////////////
function create_post_type() {
	register_post_type( 'pickup', // 投稿タイプ名の定義
		array(
			'labels' => array(
				'name' => __( 'Top Pickup' ), // 表示する投稿タイプ名
				'singular_name' => __( 'Top Pickup' )
			),
			'public' => true,
			'menu_position' =>5,
			'supports' => [
				'title',
				'thumbnail',
				'revisions'
			]
		)
	);
}
add_action( 'init', 'create_post_type' );

//////////////////////////////////////////////////
//カスタムフィールドの追加
//////////////////////////////////////////////////
add_action( 'admin_menu', 'add_custom_field' );
function add_custom_field() {
	add_meta_box( 'custom-pickup_howto', '操作方法', 'create_pickup_howto', 'pickup', 'normal' );
    add_meta_box( 'custom-pickup_title', 'タイトル', 'create_pickup_title', 'pickup', 'normal' );
    add_meta_box( 'custom-pickup_description', '説明文', 'create_pickup_description', 'pickup', 'normal' );
    add_meta_box( 'custom-pickup_link', 'リンク先URL', 'create_pickup_link', 'pickup', 'normal' );
    add_meta_box( 'custom-pickup_memo', 'メモ', 'create_pickup_memo', 'pickup', 'normal' );
}
 
// カスタムフィールドのHTMLを追加する時の処理
function create_pickup_howto() {
	// HTMLの出力
	echo '
		e-kagakuトップページに表示するスライダーの作成・編集を行う画面です。<br>
		トップページのスライダーの表示には「タイトル」と「説明文」と「リンク先URL」と「アイキャッチ画像」の合計4つの指定が必須となります。<br><br>
		<b>1. タイトル</b><br>
		スライダーの太文字部分です<br><br>
		<b>2. 説明文</b><br>
		タイトルの下に表示される説明文です。20文字程度で入力してください<br><br>
		<b>3. リンク先URL</b><br>
		画像をクリックした際に移動したいページのURLをここで指定してください（https:// or http:// で始まるもの）<br><br>
		<b>4. メモ</b><br>
		このスライダーが何のために存在するのか、今後どう変えたいかなどメモをするための物で管理者のみ閲覧可能です。一般ユーザーは閲覧不可能です。<br><br>
		制作者：稲垣 有哉（yuya.ina56@gmail.com）
	';
}
function create_pickup_title() {
    $keyname = 'pickup_title';
    global $post;
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta( $post->ID, $keyname, true );
 
    // nonceの追加
    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
 
	// HTMLの出力
	echo '入力例： e-kagakuカリキュラム<br><br>';
    echo '<input style="width:100%" name="' . $keyname . '" value="' . $get_value . '">';
}
function create_pickup_description() {
    $keyname = 'pickup_description';
    global $post;
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta( $post->ID, $keyname, true );
 
    // nonceの追加
    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
 
	// HTMLの出力
	echo '入力例： ステップアップ型のカリキュラムでしっかり学習<br><br>';
    echo '<input style="width:100%" name="' . $keyname . '" value="' . $get_value . '">';
}
function create_pickup_link() {
    $keyname = 'pickup_link';
    global $post;
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta( $post->ID, $keyname, true );
 
    // nonceの追加
    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
 
	// HTMLの出力
	echo '入力例： https://google.com<br><br>';
    echo '<input style="width:100%" name="' . $keyname . '" value="' . $get_value . '">';
}
function create_pickup_memo() {
    $keyname = 'pickup_memo';
    global $post;
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta( $post->ID, $keyname, true );
 
    // nonceの追加
	wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	
	echo 'ここに入力した内容はHPには表示されません。メモなどにご活用ください。<br><br>';
 
    // HTMLの出力
    wp_editor( $get_value, $keyname . '-box', ['textarea_name' => $keyname] );
}
 
// カスタムフィールドの保存
add_action( 'save_post', 'save_custom_field' );
function save_custom_field( $post_id ) {
    $custom_fields = ['pickup_title', 'pickup_description', 'pickup_link', 'pickup_memo'];
 
    foreach( $custom_fields as $d ) {
        if ( isset( $_POST['nonce-' . $d] ) && $_POST['nonce-' . $d] ) {
            if( check_admin_referer( 'action-' . $d, 'nonce-' . $d ) ) {
 
                if( isset( $_POST[$d] ) && $_POST[$d] ) {
                    update_post_meta( $post_id, $d, $_POST[$d] );
                } else {
                    delete_post_meta( $post_id, $d, get_post_meta( $post_id, $d, true ) );
                }
            }
        }
 
    }
}

//3.my func
//4.
//5.
//6.
//
//カスタムヘッダーの有効化
define('HEADER_IMAGE_WIDTH', apply_filters('rikakai', 400));
$defaults = array(
	'default-image' => get_bloginfo('template_url') . '/img/JAFS-see.png',
	'random-default' => false,
	'width' => '',
	'height' => '',
	'flex-height' => false,
	'flex-width' => '300',
	'default-text-color' => '',
	'header-text' => false,
	'uploads' => true,
	'wp-head-callback' => '',
	'admin-head-callback' => '',
	'admin-preview-callback' => '',
);
add_theme_support('custom-header', $defaults);
//メニューの追加
register_nav_menus(array(
	'global-menu' => __('global-menu', 'rikakai'), // グローバルメニュー
	'top-menu' => __('top-menu', 'rikakai'), // トップメニュー
	'academy-menu' => __('academy-menu', 'rikakai'), // アカデミーメニュー
));
//idからナビバーを決定する
function decide_navbar()
{
	if (in_array(141, get_post_ancestors($post->ID)) or is_page(141)) {
		//教室，体験希望
		wp_nav_menu(array('theme_location' => 'class_exp-menu'));
	} elseif (in_array(719, get_post_ancestors($post->ID)) or is_page(719)) {
		//
		wp_nav_menu(array('theme_location' => 'education-menu'));
	} elseif (in_array(971, get_post_ancestors($post->ID)) or is_page(971)) {
		//公、私立小中高などの学校関係者の方
		wp_nav_menu(array('theme_location' => 'school-menu'));
	} elseif (in_array(723, get_post_ancestors($post->ID)) or is_page(723)) {
		//人事人材育成担当の方へ
		wp_nav_menu(array('theme_location' => 'corporation-menu'));
	} elseif (in_array(970, get_post_ancestors($post->ID)) or is_page(970)) {
		//自治体，
		wp_nav_menu(array('theme_location' => 'government-menu'));
	} elseif (in_array(978, get_post_ancestors($post->ID)) or is_page(978)) {
		//後援，協力
		wp_nav_menu(array('theme_location' => 'sponsor-menu'));
	} else {
		//echo 'sore igai';
	}
}
//固定ページ一覧のスラグ列を追加
function add_page_columns_name($columns)
{
	$columns['slug'] = "スラッグ";
	return $columns;
}
//
function add_page_column($column_name, $post_id)
{
	if ($column_name == 'slug') {
		$post = get_post($post_id);
		$slug = $post->post_name;
		echo attribute_escape($slug);
	}
}
//
add_filter('manage_pages_columns', 'add_page_columns_name');
add_action('manage_pages_custom_column', 'add_page_column', 10, 2);
// register widget as a home image widget
register_sidebar(
	[
		// register widget as a home sidebar
		'name' => __('home-widget'),
		'id' => 'home-widget',
		'before_widget' => '<div class="home-widget-frame">',
		'after_widget' => '</div>',
		'before_title' => '<span style="display:none">',
		'after_title' => '</span>',
	]
); 
register_sidebar(
	[
		'name' => 'サイドバー',
		'id' => 'sidebar',
		'before_title' => '<div class="panel-heading rectangle">',
		'after_title' => '</div>',
		'class' => ''
	]
);
//子ページを表示するショートコード
function childpages($atts) {
	extract(shortcode_atts(array('parent' => null), $atts));
	if (empty($parent)) { // 指定なしなら自分の子
		$top_post = get_post($post->ID);
	} else if ($parent=="parent") { // 自分の親ページを親とする parent="parent"
		$top_post = get_post($post->ID);
		$top_post = get_post($top_post->post_parent);
	} else { // スラッグ指定ページを親とする parent="(slug)"
		$top_post = get_page_by_path($parent);
	}
	$children = wp_list_pages("title_li=&child_of=".$top_post->ID."&echo=0");
	//title_li =>見出しを表示しない
	return '<ul class="child-page">'.$children.'</ul>';
}
add_shortcode("childpages", "childpages");
//URLを追加する.
function url_add($atts)
{
	return '当会の会員の方は<a href="https://docs.google.com/forms/d/1rfTW29ACd6TujL2yNrC_R0Dm01qunU-76VbWqIV8wmc/viewform">こちら</a>から<br>非会員の方は<a href="https://docs.google.com/forms/d/1YIwglBUuTyPHJrFRIgWNECYTNLIfIsSNG0ZPgpZCV3k/viewform">こちら</a>から';
}
add_shortcode("url_add", "url_add");
//URLを追加する.
function apply_template($atts)
{
	return '<p>この講座は、自律型ロボット教材を使いながら、論理思考力・問題解決力・グローバルコミュニケーション力を継続的に育成することを目的としています。
	<br>3回目受講時に判定課題があり、合格すれば修了証書を得られます。次のステップアップコースに進級へできます。</p>
	<ul>
	 <li>進学校で行っている講座を同じクオリティで受講できます。（インセンティブが得られる場合があります）</li>
	 <li>海外のトップジュニアや企業も関心を持つコンテストや発表の機会に何回もチャレンジできます。</li>
	 <li>PCだけでなく、あらゆる実験機材が一人に一台（最初は二人に一台）用意されます。</li>
	 <li>発表は学会のジュニアセクションや国際科学技術コンテストなど各研究発表会の場（海外を含む）で他者の評価を受けていきます。</li>
 </ul>
 <p>なお、初回はロボット教材費が入りますのでご負担をおかけしますが、その後は少なくなってまいります。<br>試行
	錯誤のためには、自分の教材が必要ですので、なにとぞご理解を賜りたく存じます。</p>
	<br>基礎課程として、下記のコースを約１年半かけて学んでゆきます。<br>
	<strong><a href="http://e-kagaku.com/index/academy">*講座のカリキュラムや詳細な内容は，こちらから</a></strong></p>
	';
}
add_shortcode("apply_template", "apply_template");
//基本講習費
function basic_fare($atts)
{
	return '会員の方：　17,900　円<br>
	それ以外の方：　19,900　円<br>
	<h5>会員について</h5>
	年会費：　10,000　円<br>
	会員特典：講座・合宿・ロボットパーツなどの割引、講座・合宿などの優先申込など<br>
	本講座に申し込みされる方で、事前に会員登録された場合にも割引が適用されます。<br>
	*子どもの理科離れをなくす会 会員の申し込みは、<a href="http://e-kagaku.com/index/academy/member_apply">こちら</a>から可能です。<br>
	';
}
add_shortcode("basic_fare", "basic_fare");
function getClassContentById($atts) {
	$a = get_headers("https://script.google.com/macros/s/AKfycbxnliaP4UwAg9LP2rOyQHsV8iPTmUQHmOu6bh-Hk_2C1QtGkCKg/exec?ID=".$atts[0]);
	return $a;
}
add_shortcode("getClassContentById", "getClassContentById");
// test
function getSpreadSheetData()
{
	$url = "https://docs.google.com/spreadsheets/d/1x7ki4ifHtO2HmK4L5jVc_rUgRBe80l1rSAB4Vlk6Jr0/pub?gid=189192499&single=true&output=csv";
	$curl = curl_init($url); // 初期化！
	$options = array(           // オプション配列
		//HEADER
		CURLOPT_HTTPHEADER => array(),
		//Method
		CURLOPT_HTTPGET => true,//GET
		CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($curl, $options); /// オプション値を設定
	$result = curl_exec($curl); // リクエスト実行
	curl_close($curl); //終了
	$Data = str_getcsv(str_replace(array("\r\n", "\n", "\r"), ',', $result), ",");
	return convArrayToAssocArray(convCsvToArray($Data));
}
function convCsvToArray($Data) {
	$array = array();
	$counter = 0;
	$j = 0;
	foreach ($Data as $d) {
		if ($d == "end") {
			$j = 0;
			$counter++;
			continue;
		}
		$array[$counter][$j] = $d;
		$j++;
	}
	return $array;
}
function convArrayToAssocArray($Data)
{
	$keys = $Data[0];
	unset($Data[0]);
	$assoc = array();
	$j = 0;
	foreach ($Data as $d) {
		$counter = 0;
		foreach ($d as $v) {
			$assoc[$j][$keys[$counter]] = $v;
			$counter++;
		}
		$j++;
	}
	return $assoc;
}
function getSpreadSheetDataById($Data, $counterd)
{
	foreach ($Data as $k => $v) {
		if ($v['ID'] == $counterd) {
			return $v;
		}
	}
	return 0;
}
function getHTMLContent($data)
{
	foreach ($data as $key => $value) {
		str_replace(',', array("\r\n", "\n", "\r"), $data[$key]);
	}
	$content = "<h2>" . $data["courseName"] . "<h2>";
	$content .= "<h2>日程・会場</h2>";
	$content .= $data["dateAndPlace"];
	$content .= "<h2>時間</h2>";
	$content .= $data["time"];
	$content .= "<h2>補講制度</h2>";
	$content .= $data["support"];
	$content .= "<h2>受付期間</h2>";
	$content .= $data["reception"];
	$content .= "<h2>補講制度</h2>";
	$content .= $data["support"];
	$content .= "<h2>対象</h2>";
	$content .= $data["target"];
	$content .= "<h2>募集人員</h2>";
	$content .= $data["limit"];
	return $content;
}
function getClassData()
{
	$data = getSpreadSheetDataById(getSpreadSheetData(), 1);
	return nl2br(getHTMLContent($data));
}
add_shortcode("getClassData", "getClassData");
//
//
//
function get_latest_posts($atts) {
	wp_reset_postdata();
	extract(
		shortcode_atts(
			[
				'numberposts' => 3,
				'category_name' => ''
			], $atts
		)
	);
	$args = [
		'numberposts' => $numberposts,
		'orderby' => 'date', 
		'category_name' => $category_name 
	];
	$postslist = get_posts( $args );
	$results = '';
	foreach( $postslist as $post ){
		$results .= sprintf("<a href='%s'>%s｜%s</a><br>", $post->guid, date('Y-m-d', strtotime($post->post_date)), $post->post_title);
	}
	return $results;
}
add_shortcode("get_latest_posts", "get_latest_posts");

function register_my_widgets() {
	register_widget( 'My_Text_Widget' );
}

add_filter('widget_text', 'do_shortcode');
add_filter('widget_footer', 'do_shortcode');
class My_Text_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname' => 'widget_mytext',
			'description' => __( 'サイドバーのコンテンツを作成・更新することができます．' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'mytext', __( 'JAFSサイドバーコンテンツ' ), $widget_ops, $control_ops );
	}
	
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '',
			'title_link' => '',
			'text' => '',
			'footer' => '',
			'color' => 'panel-school2company'
			) 
		);
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$title = sanitize_text_field( $instance['title'] );
		$title_link = sanitize_text_field( $instance['title_link'] );
		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('title_link'); ?>"><?php _e('Title link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="text" value="<?php echo esc_attr($title_link); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id( 'footer' ); ?>"><?php _e( 'Footer:' ); ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"><?php echo esc_textarea( $instance['footer'] ); ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" value="<?php echo esc_attr( $instance['color'] ); ?>"></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		// return $new_instance;
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['title_link'] = sanitize_text_field( $new_instance['title_link'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
			$instance['footer'] = $new_instance['footer'];
			$instance['color'] = $new_instance['color'];
		} else {
			$instance['text'] = wp_kses_post( $new_instance['text'] );
			$instance['footer'] = wp_kses_post( $new_instance['footer'] );
			$instance['color'] = wp_kses_post( $new_instance['color'] );
		}
		$instance['filter'] = ! empty( $new_instance['filter'] );
		return $instance;
	}

	function widget( $args, $counternstance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $counternstance['title'] ) ? '' : $counternstance['title'], $counternstance, $this->id_base );
		$title_link = apply_filters( 'widget_title_link', empty( $counternstance['title_link'] ) ? '' : $counternstance['title_link'], $counternstance );
		$text = apply_filters( 'widget_text', empty( $counternstance['text'] ) ? '' : $counternstance['text'], $counternstance );
		$footer = apply_filters( 'widget_footer', empty( $counternstance['footer'] ) ? '' : $counternstance['footer'], $counternstance );
		$color = apply_filters( 'widget_color', empty( $counternstance['color'] ) ? '' : $counternstance['color'], $counternstance );

		// echo $before_widget;
		echo "<div class=\"panel panel-primary rectangle $color\">";
		
		if ( !empty( $title ) ) { 
			if ( !empty( $title_link) ) {
				echo $before_title . "<a href=\"$title_link\" style=\"display: block\">" . $title . "</a>". $after_title; 	
			} else {
				echo $before_title . $title . $after_title; 
			}
		}
		
		echo '<div class="panel-body">';
		echo !empty( $counternstance['filter'] ) ? wpautop( $text ) : $text;
		echo '</div>';

		if (!empty( $footer)) {
			echo '<div class="panel-footer">';
			echo $footer;
			echo '</div>';
		}

		echo '</div>';
		// echo $after_widget;
	}
}

add_action( 'widgets_init', 'register_my_widgets' );


//////////////////////////////////////////////////
//カスタムメニュー追加
//////////////////////////////////////////////////
// admin_menu にフック
add_action('admin_menu', 'register_custom_menu_page');
function register_custom_menu_page() {
    // add_menu_page でカスタムメニューを追加
    add_menu_page('追加設定', '追加設定', 0, 'add_settings', 'create_custom_menu_page', '', 3);
}
function create_custom_menu_page() {
    // カスタムメニューページを読み込む
    require TEMPLATEPATH.'/admin/add_settings.php';
}

// 親ページに指定されたスラッグが含まれているかを調査する関数
function page_is_ancestor_of($slug) {
  global $post;
  $page = get_page_by_path($slug);
  $result = false;
  if( isset($page) ) {
    foreach ($post->ancestors as $ancestor) {
      if($ancestor == $page->ID) $result = true;
    }
  }
  return $result;
}