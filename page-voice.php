<?php
/*
Template Name: 受講者の声
*/
get_header(); ?>
</div> <!-- container解除用 --> 

<div id="voice01">
    <div class="container">
        <div style="position:relative; width:100%; height:100%;">
        <div style="position:absolute; bottom:0; width:100%;">
            <img class="pc-only" width="100%" style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-header.png">
            <img class="sm-only" style="pointer-events:none; margin:0; padding:0; width:100%;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-header-sm.png">
        </div>
        </div>
    </div>
</div>

<div id="voice02">
    <div class="container">
        <div class="text-center">
            <img class="t1" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-parents.png">
        </div>
        
        <!--吹き出しはじまり-->
        <?php if($voice01=get_option('voice01')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-people01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice01; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice02=get_option('voice02')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-people02.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice02; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice03=get_option('voice03')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-people01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice03; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice04=get_option('voice04')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-people02.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice04; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice05=get_option('voice05')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-people01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice05; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
    </div>
</div>

<div id="voice03">
    <div class="container">
        <div class="text-center">
            <img class="t1" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-teachers.png">
        </div>
        
        
        <!--吹き出しはじまり-->
        <?php if($voice_teacher01=get_option('voice_teacher01')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-teacher01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice_teacher01; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice_teacher02=get_option('voice_teacher02')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-teacher01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice_teacher02; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice_teacher03=get_option('voice_teacher03')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-teacher01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice_teacher03; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice_teacher04=get_option('voice_teacher04')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-teacher01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice_teacher04; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
        <!--吹き出しはじまり-->
        <?php if($voice_teacher05=get_option('voice_teacher05')): ?>
        <br>
        <div class="balloon5">
            <div class="faceicon">
                <img style="pointer-events:none;" src="<?php echo get_template_directory_uri(); ?>/img/voice/voice-teacher01.jpg">
            </div>
            <div class="chatting">
                <div class="says">
                    <p><?php echo $voice_teacher05; ?></p>
                </div>
            </div>
            </div>
        <?php endif; ?>
        <!--吹き出し終わり-->
        
    </div>
</div>

<div class="container"> <!-- container解除用 -->
<?php get_footer(); ?>
    
    
<style type="text/css">
    #voice01{width:100%; background:linear-gradient(rgba(158, 233, 255, 0.28) 50%, rgba(73, 227, 255, 0.69) 100%),url('<?php echo get_template_directory_uri(); ?>/img/voice/header-back.jpg') bottom/cover; position:relative;}
    #voice01 .container{height:500px;}
    #voice01::before{height:40px; content:""; position:absolute; left:0; width:100%; bottom:0px; background:linear-gradient(45deg, #ffffff 20px, transparent 0), linear-gradient(315deg, #ffffff 20px, transparent 0); background-size: 40px 40px; z-index:1;}
    
    #voice02{padding:50px 0; background:linear-gradient(rgb(255, 255, 255) 50%, rgb(255, 234, 186) 100%); position:relative;}
    #voice02::before{height:40px; content:""; position:absolute; left:0; width:100%; bottom:0px; background:linear-gradient(45deg, #ffffff 20px, transparent 0), linear-gradient(315deg, #ffffff 20px, transparent 0); background-size: 40px 40px; z-index:1;}
    
    #voice03{padding:50px 0; background:linear-gradient(rgb(255, 255, 255) 50%, rgb(210, 255, 186) 100%); }
    
    /* タイトルイメージ用 */
    .t1{width:90%; max-width:600px; margin:0 auto; pointer-events:none;}
    
    @media screen and (min-width: 720px) {
        .pc-only{display:block;}
        .sm-only{display:none;}
    }
    @media screen and (max-width: 719px) {
        .pc-only{display:none;}
        .sm-only{display:block;}
        #voice01 .container{height:400px; width:100%; padding:0; margin:0;}
    }
    
    /* 吹き出しデザイン */
    .balloon5{width:100%; margin:1.5em 0;overflow: hidden;}
    .balloon5 .faceicon{float:left; margin-right:-90px; width:80px;}
    .balloon5 .faceicon img{width:100%; height:auto; border:solid 3px #d7ebfe; border-radius:50%;}
    .balloon5 .chatting{width:100%;}
    .says{display:inline-block; position:relative; margin:5px 0 0 105px; padding:17px 13px; border-radius:12px; background:#d7ebfe;}
    .says:after{content: ""; display:inline-block;position: absolute; top:18px; left:-24px; border:12px solid transparent; border-right:12px solid #d7ebfe;}
    .says p {margin: 0; padding: 0;}
    /* 吹き出しデザイン */
    
    
    
</style>