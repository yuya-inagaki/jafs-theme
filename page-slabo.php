<?php
/*
Template Name: サイエンスラボ
*/
get_header(); ?>
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">

</div> <!-- container解除用 --> 

<div id="voice01">
    <div class="container">
        <img src="<?php echo get_template_directory_uri(); ?>/img/slabo/logo.png">
    </div>
</div>

<div id="slabo02">
    <div class="row text-center" style="width:100%; padding:0; margin:0; background-color:#eaeaea;">
        <div class="col-md-4 work work00">
            <p style="font-size:4.5em;; width:100%; position:absolute; bottom:50%; left:50%; transform: translate(-50%, 50%); color:white;">事業案内</p>
        </div>
        <div class="col-md-4 work work01">
            <p class="num">01</p>
            <p class="t2">継続教室</p>
        </div>
        <div class="col-md-4 work work02">
            <p class="num">02</p>
            <p class="t2">各地の科学教室コンサルティング</p>
        </div>
        <div class="col-md-4 work work03">
            <p class="num">03</p>
            <p class="t2">指導者育成事業</p>
        </div>
        <div class="col-md-4 work work04">
            <p class="num">04</p>
            <p class="t2">教材開発</p>
        </div>
        <div class="col-md-4 work work05">
            <p class="num">05</p>
            <p class="t2">教材販売</p>
        </div>
    </div>
</div>

<div id="slabo03">
    <div class="title">
        <span>実 績</span>
    </div>
    <div style="height:500px;">
        <p style="line-height:500px; text-align:center;">実績記載箇所</p>
    </div>
</div>

    

<div class="container"> <!-- container解除用 -->
<?php get_footer(); ?>
    
    
<style type="text/css">
    #voice01{width:100%; background:linear-gradient(rgba(158, 233, 255, 0.28) 50%, rgba(73, 227, 255, 0.69) 100%),url('<?php echo get_template_directory_uri(); ?>/img/slabo/02.jpg') center/cover; position:relative;}
    #voice01 .container{height:500px;}
    #voice01 img{width:700px; max-width:80%; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%); pointer-events:none;}
    
    
    #slabo02{width:100%; padding:0;}
    #slabo02 .work{height:300px; position:relative;}
    
    #slabo02 .work00{background:linear-gradient(rgba(0, 0, 0) 0%, rgba(0, 0, 0, 0.71) 50%, rgb(0, 0, 0) 100%);}
    #slabo02 .work01{background:linear-gradient(150deg, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 100%),url('<?php echo get_template_directory_uri(); ?>/img/slabo/01.jpg') center / cover;}
    #slabo02 .work02{background:linear-gradient(150deg, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 100%),url('<?php echo get_template_directory_uri(); ?>/img/slabo/02.jpg') center / cover;}
    #slabo02 .work03{background:linear-gradient(150deg, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 100%),url('<?php echo get_template_directory_uri(); ?>/img/slabo/03.jpg') center / cover;}
    #slabo02 .work04{background:linear-gradient(150deg, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 100%),url('<?php echo get_template_directory_uri(); ?>/img/slabo/04.jpg') center / cover;}
    #slabo02 .work05{background:linear-gradient(150deg, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 100%),url('<?php echo get_template_directory_uri(); ?>/img/slabo/05.jpg') center / cover;}
    #slabo02 .num{position:absolute; top:10px; left:10px; color:#ffffff; font-size:2em; background-color:#1d1d1d; width:50px; height;50px; padding:0; line-height:50px; border-radius:50%; box-shadow: 0px 2px 10px #bebebe;}
    
    #slabo03{width:100%;}
    #slabo03 .title{width:100%; height:80px; background-color:black; text-align:center; position:relative;}
    #slabo03 .title span{font-size:2em; color:white; position:absolute; bottom:50%; left:50%; transform: translate(-50%, 50%); }
    
    /* タイトルイメージ用 */
    .t1{width:90%; max-width:600px; margin:0 auto; pointer-events:none;}
    .t2{font-size:1.5em; font-family: "M PLUS Rounded 1c"; font-weight:bold; position:absolute; bottom:0px; right:20px; color:white;}
    
    @media screen and (min-width: 720px) {
        .pc-only{display:block;}
        .sm-only{display:none;}
        #slabo02 .work{border:5px solid white;}
        #slabo02 .work::before{height:100%; content:""; position:absolute; left:0; width:30px; bottom:0px; clip-path: polygon(0 100%, 0% 0%, 100% 100%); background-color:#ffffff; z-index:1; box-shadow: 0px 2px 10px #bebebe;}
        #slabo02 .work::after{height:100%; content:""; position:absolute; right:0; width:30px; bottom:0px; clip-path: polygon(0 0%, 100% 0%, 100% 100%); background-color:#ffffff; z-index:1; box-shadow: 5px 0px 10px #0f0f0f;}
    }
    @media screen and (max-width: 719px) {
        .pc-only{display:none;}
        .sm-only{display:block;}
        #voice01 .container{height:300px; width:100%; padding:0; margin:0;}
        #slabo02 .work{height:200px; position:relative;}
    }
    
    
</style>