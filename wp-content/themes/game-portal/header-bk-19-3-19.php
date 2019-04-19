<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?php wp_title(' | ', true, 'right'); ?>
        <?php bloginfo('name'); ?>
    </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">     

    <link rel="stylesheet" type="text/css" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css" />

    <?php wp_head(); ?>
</head>
<body>
 
<!--Header-->
<div class="header">
        <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <?php if ( get_theme_mod( 'header_logo' ) ) : ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo get_theme_mod( 'header_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive"> </a>
            <?php endif; ?>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">                
                <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container'=> false, 'menu_class' => 'navbar-nav ml-auto', 'theme_location' => 'primary-menu' ) ); ?>
                <div class="search-icon ml-4 search"> 
                    <a href="#"><i class="fa fa-search search-icon"></i></a>
                    <a href="#"><i class="fa fa-close close-icon"></i></a>
                </div>
                <div class="searchbox">
                    <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                       
                        <input type="search"  name="s"  class="form-control search-submit" placeholder="Search" />
                        <button type="submit" class="search-submitbtn"> <i class="fa fa-search"></i></button>		
                    </form>   
                </div>
            </div>
        </div>
    </nav>
        <!-- End Navbar -->
    
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            <div id="box-content">
                <img src="<?php echo get_template_directory_uri();?>/images/ajax-loader.gif" class="signin-ajax-loader" alt="<?php echo __( " Loading...", 'game_portal' ); ?>"/>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
 
// Get the modal
var modal = document.getElementById('loginmodal');

// Get the button that opens the modal
  
var btn = document.getElementById("menu-item-16");
   
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

 /* Initial login form ajax call here */
$( document ).ready(function() {
   
    var is_user_logged_in = <?php  if( is_user_logged_in() ){ echo 'true'; }else{ echo 'false'; }  ?>;

    var login_btn = "#myNavbar ul li.nav-item.change_loc,.category";
    $(login_btn).attr("data-toggle","modal");
    $(login_btn).attr("data-target","#loginmodal");
    
    $(signin_ajax_loader).show();
    $(login_btn).click(function(){

    $("#loginmodal .box-content").html("");
        $.ajax({
                url : ajaxurl,
                type : 'post',
                data : {
                    action : 'get_signin_form'
                },
                success : function( response ) {
                   $("#box-content").html( response );
                   $(signin_ajax_loader).hide();
                }
            }); // get_signin_form ajax ends here
           });
       
$(document).on('click','a',function( e ){
    if (!is_user_logged_in) {
        //alert($(this));
        //console.log($(this));
        //return false
        console.log($(this).parent());
        if( $(this).parent().hasClass('game-media') || $(this).parent().parent().hasClass('game-title')){
         $(login_btn).click();
         //alert("hi not log in");
         return false;
        }

    }else {
          //alert('yes logged in');
           return true;
          }

    });


 });//document ready ends here








//SignIn Next button to send opt
$(document).on('click','#SignInNextBtn',function( e ){

   $("#loginmodal .signin-ajax-loader").hide();   
   //var mobile_id = $("#signin_mobile").val();
   var mobile_num = $("#signin_mobile").val(); 
          
    if( mobile_num.length == 0 ){
        $("#loginmodal .modal-error-info").html("<span class='error'>Enter Mobile Number</span>");
    }else if( !mobile_num.match(/^\d+$/) || mobile_num.length != 10 ){
        $("#loginmodal .modal-error-info").html("<span class='error'>Enter Valid Mobile Number</span>");
    }else{
        $("#loginmodal .signin-ajax-loader").show();
        $("#box-content").html('');
        
          $.ajax({
              url : ajaxurl,
              type : 'post',
              data : {
                action : 'get_sign_in_next',
                username : mobile_num,
                confirmation : 1
            },
            success : function( response ) {
                $("#box-content").html( response );
                $("#loginmodal .modal-error-info").hide();
                $("#loginmodal .signin-ajax-loader").hide();
              }
            });
          }      

});


$(document).on('click','#sign_in_btn',function( e ){
        var cellno = $("#signin_cellno").val();
        var password = $('.sign_in_form #signin_password').val();
        //var redirect_to_post = getCookie( "redirect_to_post" );
        //alert(redirect_to_post);
        if( password.length == 0 ){
            $("#myModal .modal-error-info").html("<span class='error'>Enter Your Password</span>");
        }else{
                jQuery.ajax({
                url : ajaxurl,
                type : 'post',
                data : {
                    action : 'get_sign_in_action',
                    cellno : cellno,
                    password :  password
                    //redirect_to : redirect_to_post
                },
                success : function( response ) {
                   var response = JSON.parse( response );
                              
                    if (response.loggedin == true){
                        //setCookie( "redirect_to_post", "", 1);
                        window.location.href = response.redirect_to;
                        $("#myModal .modal-error-info").html( '<span class="loggedin-success">'+ response.message + '</span>' );
                    }else{
                        $("#myModal .modal-error-info").html( response.message );
                    }
                }
            });
        }
    });

   $(document).on('click','#subscribe_btn',function( e ){       
        
        var otp_1 = $("#first").val();
        var otp_2 = $("#second").val();
        var otp_3= $("#third").val();
        var otp_4 = $("#fourth").val();
        var otp = [];
        var optnew = [];
        otp.push(otp_1,otp_2,otp_3,otp_4);
        var newopt =  otp.map(o => {
         if(o != ''){
            optnew.push(o);
            return optnew;
         }
            
        }); 
    
       

        var subscription_otp = otp_1+otp_2+otp_3+otp_4 ;
        var subscribe_cellno = $("#subscribe_cellno").val();
           
        //var subscription_otp = $("#subscription_otp").val();
       // var redirect_to_post = getCookie( "redirect_to_post" );

        if(optnew.length < 4 ){
           // alert("please enter correct otp");
             $("#subscribe_error_msg_otp").html("<span class='error'>Please Enter 4 Digit correct OTP</span>");
            
        }else{
            $("#subscribe_error_msg_otp").html();
            jQuery.ajax({
                url : ajaxurl,
                type : 'post',
                data : {
                    action  : 'subscription_verify_action',
                    cellno  : subscribe_cellno,
                    otp     : subscription_otp
                    //redirect_to : redirect_to_post
                },
                success : function( response ) {

                    var response = JSON.parse( response );
                  
                    console.log(response);

                    if (response.created == true){
                        //setCookie( "redirect_to_post", "", 1);
                        window.location.href = response.redirect_to;                        
                    }else{
                        $("#subscribe_error_msg_otp").html(response.message);                       
                    }
                }
            });
        }
        
    }); 

   $(document).on('click','.forgot_password_link',function( e ){

       //alert("hi");
        var subscribe_cellno = $("#signin_cellno").val();
        
        $("#myModal .ajax-loader").show();
        $("#myModal_content").html('');
        jQuery.ajax({
            url : ajaxurl,
            type : 'post',
            data : {
                action : 'get_forgot_password_content',
                cellno : subscribe_cellno           
            },
            success : function( response ) {
                $("#box-content").html( response );
                $("#myModal .ajax-loader").hide();
            }
        });
        
    });



   
 
 
  </script>
 