<?php
//Header logo
function m1_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'header_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
        'label'    => __( 'Upload Logo', 'game_portal' ),
        'section'  => 'title_tagline',
        'settings' => 'header_logo',
    ) ) );
}
add_action( 'customize_register', 'm1_customize_register' );

// navbar add class to a
add_filter( 'nav_menu_link_attributes', function($atts) {
        $atts['class'] = "nav-link";
        return $atts;
}, 100, 1 );
 
// Defined required varialbes here  
function pluginname_ajaxurl() { ?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
var signin_ajax_loader = "#loginmodal .modal-header .signin-ajax-loader";

var Enter_Mobile_Number = "<?php  echo __('Enter Mobile Number', 'game_portal'); ?>";

var Enter_Valid_Mobile_Number = "<?php  echo __('Enter Valid Mobile Number', 'game_portal'); ?>"; 

var Enter_Your_Password = "<?php  echo __('Enter Your Password', 'game_portal'); ?>";
var Enter_Your_4_digit_otp = "<?php  echo __('Please Enter 4 Digit correct OTP', 'game_portal'); ?>";




<?php if( @$_GET['lang'] == null || @$_GET['lang'] == "" ){ ?>

    var d = new Date();
    d.setTime(d.getTime() + ( 1 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = "_icl_current_language=en;" + expires + ";path=/";

<?php }else{ ?>
    var d = new Date();
    d.setTime(d.getTime() + ( 1 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = "_icl_current_language=<?php echo @$_GET['lang']; ?>;" + expires + ";path=/";
<?php } ?>


</script>
<?php }   
add_action('wp_head','pluginname_ajaxurl' );

/****************************************************************
Register Form
****************************************************************/
add_action( 'wp_ajax_nopriv_get_signin_form', 'get_signin_form' );
add_action( 'wp_ajax_get_signin_form', 'get_signin_form' );

function get_signin_form(){
?>
    <div class="login-wrapper">
        <h3><?php echo __('Log in','game_portal'); ?></h3>

                
        <p><?php echo __('Without spaces or special symbols','game_portal'); ?></p>
         <form method="POST" class="loginform" id="login-frm">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input type="number" name="mobile" id="signin_mobile" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" class="mobile" placeholder="<?php echo __('Enter your mobile number','game_portal'); ?>" maxlength="10">
            </div>
            <span class="modal-error-info"></span>
            <input type="button" name="next" class="btn btn-danger btn-block loginmodal-submit" value="<?php echo __('Next','game_portal'); ?>" id="SignInNextBtn">
        </form>
    </div>    
<?php
    die();
}

/****************************************************************
get_sign_in_next
****************************************************************/
add_action( 'wp_ajax_nopriv_get_sign_in_next', 'get_sign_in_next' );
add_action( 'wp_ajax_get_sign_in_next', 'get_sign_in_next' );

function get_sign_in_next(){
    $username = sanitize_text_field( $_POST['username'] );
    $username = covertDigitsToEnglish($username);
    $username = cellnoNormalization( $username );

    //print_r($username);
    //echo username_exists((int)$username);
    //exit;

    if ( username_exists( (int)$username ) /*&& isSubscriber($username)*/ ) {

    ?>
        <div class="login-wrapper">
            <h3><?php echo __('Password','game_portal'); ?></h3>
           
        
         <div class="sign_in_form loginform">
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                 <input type="hidden" id="signin_cellno" value="<?php echo $username; ?>">

                 <input id="signin_password" name="mobile" type="password" class="form-control pass-lock" placeholder="<?php echo __('Enter Password','game_portal'); ?>">
             </div>
             <span class="modal-error-info"></span>                       
            <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="sign_in_btn" ><?php echo __('Submit','game_portal'); ?></button>
            <a href="#" class="link-txt forgot_password_link"><?php echo __('Forgot Password?','game_portal'); ?>
            </a>
        </div>   

    <?php
        }else{
    	//Send Otp Function 
       $nu = sendOtp( (int)$username, 10);

       ?>

       <div class="login-wrapper">
            <h3><?php echo __('Almost Done','game_portal'); ?></h3>
            <p><?php echo __('Please enter the pin below','game_portal'); ?></p>
            <form method="POST" class="loginform" id="login-frm">
                <div class="form-group">
                    <input type='text' name='first' id='first' size='5' maxlength="1">
                    <input type='text' name='second' id='second' size='5' maxlength="1">
                    <input type='text' name='third' id='third' size='5' maxlength="1">
                    <input type='text' name='fourth' id='fourth' size='5' maxlength="1">
                    <input type="hidden" id="subscribe_cellno" value="<?php echo $username; ?>">
                </div>
                <span id="subscribe_error_msg_otp"></span>
                <input type="button" name="next" class="btn btn-danger btn-block loginmodal-submit" value="<?php echo __('Login','game_portal'); ?>" id="subscribe_btn">
                <span class="link-txt resend_otp_link" href="#"><?php echo __('Resend Pin','game_portal'); ?> </span>
                <span id="subscribe_error_msg"></span>
            </form>
        </div>

   
     
<?php }

    die();
}

//send OTP function starts here 
function  sendOtp($msisdn, $lang) {
    global $wpdb;
    $otp = generateRandomString(4);

    $db_opt = resendOtpUser($msisdn);
    //echo 'db_opt='.$db_opt; exit();
 
    //delete previous otp
    $sql = $wpdb->prepare("DELETE FROM otp_req WHERE cellno = %s ", $msisdn);
    $wpdb->query($sql);

    //send new otp
    $sql = $wpdb->prepare("INSERT INTO otp_req(cellno, otp, dt, status, lang) values (%s, %s, %s, 100, %s)", $msisdn, $otp, current_time('mysql',1), $lang);
    $wpdb->query($sql);

    return true;

}

//Generate random string function starts here
function generateRandomString($length = 4) {
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//covert Digits to english
function covertDigitsToEnglish($msisdn) { 
    $msisdn = trim($msisdn);
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_eastern, $arabic_western, $msisdn);
}
function cellnoNormalization($msisdn){
    if (substr($msisdn, 0, 3) == '964') {
        $msisdn = substr($msisdn,3);
        $msisdn = '0'.$msisdn;
    }else if(substr($msisdn, 0, 2) == '75' ){
        $msisdn = '0'.$msisdn;
    }else if(substr($msisdn, 0, 2) == '00'){
        $msisdn = substr($msisdn,1);
    }else if(substr($msisdn, 0, 5) == '00964'){
        $msisdn = '0'.$msisdn;
    }else if(substr($msisdn, 0, 4) == '+964'){
        $msisdn = substr($msisdn,4);
        $msisdn = '0'.$msisdn;
    }else if (substr($msisdn, 0, 4) == '0964') {
        $msisdn = substr($msisdn,4);
        $msisdn = '0'.$msisdn;   
    }

    return $msisdn;

}

//Checked auto generated OTP 
function resendOtpUser($msisdn){
    //echo '$msisdn=='.$msisdn;
    global $wpdb;
    $cellno="";
    $otp="";
    $result = $wpdb->get_results( 'SELECT * FROM otp_req WHERE cellno ='.$msisdn );
    
    if(!empty($result[0])){
        $cellno = $result[0]->cellno;  
        $otp = $result[0]->otp;
    }
     return $otp;

}


 
/****************************************************************
//get_sign_in_action
****************************************************************/
add_action( 'wp_ajax_nopriv_get_sign_in_action', 'get_sign_in_action' );
add_action( 'wp_ajax_get_sign_in_action', 'get_sign_in_action' );

function get_sign_in_action(){


    $cellno = sanitize_text_field( $_POST['cellno'] );
    $password = sanitize_text_field( $_POST['password'] );
    //$redirect_to = get_permalink( sanitize_text_field( $_POST['redirect_to'] ) );

    //echo "==".$cellno;
    //echo "===".$password;

    $password = covertDigitsToEnglish($password);

    if( $password == null || $cellno == null ){
        echo json_encode(array('loggedin'=>false, 'message'=> __('Something went wrong!','game_portal') ));
    }else{
        loginWithPassword( $cellno, $password, $redirect_to );  
    }

die();
}

/*********************************************************
Login with cellno and password
*********************************************************/
function loginWithPassword( $cellno, $pass, $redirect_to ){

    if ( is_user_logged_in() ) {
      wp_logout();
    }

    if( $redirect_to == null ){
        $redirect_to = get_home_url();
    }

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = (int)$cellno;
    $info['user_password'] = $pass;
    $info['remember'] = true;

    
    $user_signon = wp_signon( $info, false );
    /*if ( is_wp_error($user_signon) )
        echo $user_signon->get_error_message();*/

    if ( is_wp_error($user_signon) ){
        if( $user_signon->get_error_code() == "incorrect_password" ){
            echo json_encode(array('loggedin'=>false, 'message'=> __('Wrong password.', 'game_portal') ));
        }else if( $user_signon->get_error_code() == "invalid_username" ){
            echo json_encode(array('loggedin'=>false, 'message'=> __('Invalid mobile number.', 'game_portal') ));
        }else{
            $error_string = $user_signon->get_error_message();
            echo json_encode(array('loggedin'=>false, 'message'=> $error_string ));
        }
    } else {
        echo json_encode(array('loggedin'=>true, 'redirect_to' => $redirect_to,  'message'=>__('Login successful, redirecting...', 'game_portal') ));
    }

}

/*********************************************************/

/*********************************************************
verify subscription ( new create subscription )
*********************************************************/
add_action( 'wp_ajax_nopriv_subscription_verify_action', 'subscription_verify_action' );
add_action( 'wp_ajax_subscription_verify_action', 'subscription_verify_action' );

function subscription_verify_action(){

    $cellno = $_POST['cellno'];
    $otp    = $_POST['otp'];
    //$redirect_to = get_permalink( sanitize_text_field( $_POST['redirect_to'] ) );

    if( $redirect_to == null ){
        $redirect_to = get_home_url();
    }

    $cellno = (int) $cellno;

    if( $cellno != null && $otp != null ){
        if( verifyOtp($cellno, $otp) ){
            if( createSubscriber( $cellno, 10, 30 ) ){
                login( $cellno );                
                echo json_encode(array('created'=>true, 'redirect_to'=> $redirect_to ));
            }            
        }else{
            echo json_encode(array('created'=>false, 'message'=> '<span class="error">'.__('Wrong OTP.', 'game_portal').'</span>' ));
        }
    }

    die();
}


function verifyOtp($msisdn, $otp) { 
    global $wpdb;
    
    $otp = covertDigitsToEnglish($otp);
    $cellno = $wpdb->get_var($wpdb->prepare("SELECT cellno FROM otp_req WHERE cellno =%s AND otp = %s", $msisdn, $otp));
    if($cellno){
        return true;
    }else{
        return false;
    }
}

function createSubscriber($msisdn, $lang, $mod_act) { 
    global $wpdb;

    $pwd = generateRandomString(6);
    //echo "===".$pwd;
    $createSub = $wpdb->prepare("INSERT INTO sub(cellno, sub_dt, create_dt, status, mod_act, pwd, lang) values (%s, %s, %s, 100, %s, %s, %s) ON DUPLICATE KEY UPDATE status = 100", $msisdn, current_time('mysql',1), current_time('mysql',1),  $mod_act, $pwd, $lang);
    $wpdb->query($createSub);



    $new_user_id = wp_insert_user(array(
            'user_login'    => $msisdn,
            'user_pass'     => ($pwd),            
        )
    );

    wp_set_password( $pwd, $new_user_id );

   // update_user_meta( $new_user_id, 'download_quota', '10');
   // update_user_meta( $new_user_id, 'trial_period', '7');


    return true;
}

/*********************************************************
Login with cellno
*********************************************************/
function login( $cellno ){

    if ( is_user_logged_in() ) {
      wp_logout();
    }
    
    $user = get_user_by('login', (int)$cellno );

    // Redirect URL //
    if ( !is_wp_error( $user ) ){
        wp_clear_auth_cookie();
        wp_set_current_user ( $user->ID );
        wp_set_auth_cookie  ( $user->ID );        
    }
}

/****************************************************************
forgot_password
****************************************************************/
add_action( 'wp_ajax_nopriv_get_forgot_password_content', 'get_forgot_password_content' );
add_action( 'wp_ajax_get_forgot_password_content', 'get_forgot_password_content' );

function get_forgot_password_content(){


    $cellno = sanitize_text_field( $_POST['cellno'] );
    
    resetPassword( (int) $cellno);
?>
    <div class="login-wrapper">
    <h3><?php echo __('Password','game_portal'); ?></h3>
      <div class="sign_in_form loginform">
      <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
          <input type="hidden" id="signin_cellno" value="<?php echo $cellno; ?>">
          <input id="signin_password" name="mobile" type="password" class=" form-control pass-lock" placeholder="<?php echo __('Enter Password','game_portal'); ?>">
      </div>
       <span class="modal-error-info"></span>

      <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="sign_in_btn" ><?php echo __('Sign in','game_portal'); ?></button>
        <a href="#" class="link-txt forgot_password_link"><?php echo __('Resend Password?','game_portal'); ?></a>


        <!-- <span class="modal-error-info"></span>
        <input type="hidden" id="signin_cellno" value="<?php echo $cellno; ?>">
        <input id="signin_password" name="mobile" type="password" class="pass-lock" placeholder="<?php echo __('Enter Password','game_portal'); ?>">        
        <button class="frm-btn" id="sign_in_btn" ><?php echo __('Sign in','game_portal'); ?></button>
        <span class="forgot_password_link"><?php echo __('Resend Password?','game_portal'); ?></span> -->
    </div>
    </div>

<?php

die();
}

function resetPassword($msisdn) { 
    global $wpdb;

    $pwd = generateRandomString(6);
    $resetPassword = $wpdb->prepare("INSERT INTO sub(cellno, sub_dt, create_dt, status, mod_act, pwd, lang) values (%s, %s, %s, 100, %s, %s, %s) ON DUPLICATE KEY UPDATE pwd = $pwd", $msisdn, current_time('mysql',1), current_time('mysql',1),  $mod_act, $pwd, $lang);
    $wpdb->query($resetPassword);

    $user = get_user_by('login', (int)$msisdn );

    if ( !is_wp_error( $user ) ){       
        wp_set_password( $pwd, $user->ID );
    }

    return true;
}

/*********************************************************
Resend Otp 
*********************************************************/
add_action( 'wp_ajax_nopriv_resend_otp_cellno', 'resend_otp_cellno' );
add_action( 'wp_ajax_resend_otp_cellno', 'resend_otp_cellno' );

function resend_otp_cellno(){

    $cellno = $_POST['cellno'];
    sendOtp( (int)$cellno, 10);
    echo '<span class="info">'.__('OTP send to your mobile phone.', 'game_portal').'</span>';
    die();
}
/*********************************************************
Download Games 
*********************************************************/
add_action( 'wp_ajax_nopriv_get_download_action', 'get_download_action' );
add_action( 'wp_ajax_get_download_action', 'get_download_action' );

function get_download_action(){
    global $wpdb;
    $current_user = wp_get_current_user();
   // print_r($current_user);
    $u_mobile = $current_user->user_login;
    //echo $u_mobile;
    $u_id = $current_user->ID;
    $current_post_id = $_POST['post_id'];
   // echo $current_post_id;
    $game_id = $current_post_id;
    $meb_status = membership_status($u_mobile);
    //echo "===".$meb_status;
    $requested_game_type = game_type($current_post_id);
    //echo $requested_game_type;
    $quota = check_customer_download_quota($game_id,$u_mobile,$u_id);
    //echo"=====".$quota;
   
    if($meb_status == 'Trial') 
    {
        
       //$requested_game_type = game_type($current_post_id);
           if($requested_game_type =='Free')
             {

               if($quota > 0) {

                /*$op = showDownloadPopup($game_id,$u_mobile,$u_id); 
                 echo $op;  */   
                 $device_type =check_customer_device();

                         if($device_type =='100'){

                            $op = showDownloadPopup($game_id,$u_mobile,$u_id); 
                            echo $op;  

                         }
                         else {
                            $op = directdownload($game_id,$u_mobile);
                            echo $op;
                         } 
                            
             }  
               else {
                 $op = showDownloadQuotaEndPopup();
                 echo $op;
               }
             }
             else
             {
                  
                if($quota > 0) {

                    /*$op = showDownloadPopup($game_id,$u_mobile,$u_id);
                    echo $op;*/
                    $device_type =check_customer_device();
                    //echo $device_type;

                         if($device_type =='100'){

                            $op = showDownloadPopup($game_id,$u_mobile,$u_id); 
                            echo $op;  

                         }
                         else {
                            $op = directdownload($game_id,$u_mobile);
                            echo $op;
                         }                 
               }  
               else {
                    $op = showDownloadQuotaEndPopup();
                    echo $op;
               }
             }

    }
      else if($meb_status == 'Trial Expire') 
    {
        if($requested_game_type =='Free')
             {

               if($quota > 0) {

                 $device_type =check_customer_device();

                         if($device_type =='100'){

                            $op = showDownloadPopup($game_id,$u_mobile,$u_id); 
                            echo $op;  

                         }
                         else {
                            $op = directdownload($game_id,$u_mobile);
                            echo $op;
                         }

                    
                            
                }  
               else {
                 $op = showDownloadQuotaEndTrialExpirePopup();
                 echo $op;
               }
            }
            else
             {
                $op = showChargNowTrialExpirePopup($u_mobile) ;
                echo $op; 
             }


    }
    else if($meb_status == 'Primenum') 
    {
         if($requested_game_type =='Free')
             {
                 if($quota > 0) {
                /*$op = showDownloadPopup($game_id,$u_mobile,$u_id);
                echo $op; */  
                   $device_type =check_customer_device();

                         if($device_type =='100'){

                            $op = showDownloadPopup($game_id,$u_mobile,$u_id); 
                            echo $op;  

                         }
                         else {
                            $op = directdownload($game_id,$u_mobile);
                            echo $op;
                         }   
                            
                  }  
               else {
                 $op = showDownloadQuotaEndPremiumPopup();
                 echo $op;
                 }

            }

         else
             {
                  
                if($quota > 0) {

                    /*$op = showDownloadPopup($game_id,$u_mobile,$u_id);
                    echo $op; */   
                    $device_type =check_customer_device();

                         if($device_type =='100'){

                            $op = showDownloadPopup($game_id,$u_mobile,$u_id); 
                            echo $op;  

                         }
                         else {
                            $op = directdownload($game_id,$u_mobile);
                            echo $op;
                         }             
                }  
               else {
                    $op = showDownloadQuotaEndPremiumPopup();
                    echo $op;
                }
             }

    }

     
     
     
    die();
}

function directdownload($game_id,$cell){
    global $wpdb;
    $game_url_field = get_field('apk_file_upload',$game_id);
    $game_url = $game_url_field[url];
    $request_type ='150';
   
    $wpdb->insert( 
            'download_games', 
            array( 
                'game_id' => $game_id,
                'game_url' => $game_url,
                'cell_no' => $cell,
                'request_type' => $request_type,
                'request_date'=>date("Y-m-d"),
                'sent_status' =>'0'
            ), 
            array( 
                '%d',
                '%s',
                '%s',
                '%s',
                '%s',
                '%d'
                 
            ) 
        );
     return $game_url;
 }


function check_customer_device(){
            $tablet_browser = 0;
            $mobile_browser = 0;
 
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                $tablet_browser++;
            }
             
            if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                $mobile_browser++;
            }
             
            if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                $mobile_browser++;
            }
             
            $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
            $mobile_agents = array(
                'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                'newt','noki','palm','pana','pant','phil','play','port','prox',
                'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                'wapr','webc','winw','winw','xda ','xda-');
             
            if (in_array($mobile_ua,$mobile_agents)) {
                $mobile_browser++;
            }
             
            if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
                $mobile_browser++;
                //Check for tablets on opera mini alternative headers
                $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                  $tablet_browser++;
                }
            }
             
            if ($tablet_browser > 0) {
               // do something for tablet devices
                
            }
            else if ($mobile_browser > 0) {
               // do something for mobile devices
                   $request_type = '150'; //Android
            }
            else {
               // do something for everything else
                  $request_type = '100'; //Desktop
            }  

            return  $request_type;
}

function membership_status($cell){
     global $wpdb;
     $get_member_details = $wpdb->get_row("SELECT status FROM otp_req WHERE cellno = '".$cell."'", ARRAY_A);

    $membership_status_code = $get_member_details[status];

    if($membership_status_code == '100'){
        $membership = 'Trial';
    } else if($membership_status_code == '110'){
        $membership = 'Trial Expire';
    }  else if($membership_status_code == '150'){
        $membership = 'Primenum';
    }
     
    return $membership;
}

function game_type($post_id){
   // echo $post_id;
    $check = get_post_meta($post_id, 'premium',true);
    if($check =='0') {
        $game_type ='Free';
    }else {
        $game_type ='Premium';
    }
    return $game_type;
}


function check_customer_download_quota($game_id,$cell,$u_id){
     global $wpdb;
    //$down_quota = get_user_meta($u_id, 'download_quota',true);
     $down_quota_main = DOWNLOAD_QUOTA; //from wp-config
     $curr_date = date("Y-m-d");
     $check_download_entries = $wpdb->get_results("
            SELECT  DISTINCT(game_id),cell_no 
            FROM download_games
            WHERE cell_no = $cell 
             AND request_type ='100'
             AND date(request_date) = '$curr_date'
            "
        );
    $fetch_count_db = sizeof($check_download_entries);
    $down_quota = $down_quota_main - $fetch_count_db;
     //echo $wpdb->last_query;//lists only single query
    // echo $down_quota;
      
    return $down_quota;
}

function showDownloadPopup($game_id,$cell,$u_id){
     global $wpdb;
     //echo "===".$cell;
    $game_title = get_the_title($game_id);
    $down_quota = get_user_meta($u_id, 'download_quota',true);
    $game_url_field = get_field('apk_file_upload',$game_id);
    $game_url = $game_url_field[url];
  

    $tablet_browser = 0;
    $mobile_browser = 0;
 
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                $tablet_browser++;
            }
             
            if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                $mobile_browser++;
            }
             
            if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                $mobile_browser++;
            }
             
            $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
            $mobile_agents = array(
                'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                'newt','noki','palm','pana','pant','phil','play','port','prox',
                'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                'wapr','webc','winw','winw','xda ','xda-');
             
            if (in_array($mobile_ua,$mobile_agents)) {
                $mobile_browser++;
            }
             
            if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
                $mobile_browser++;
                //Check for tablets on opera mini alternative headers
                $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                  $tablet_browser++;
                }
            }
             
            if ($tablet_browser > 0) {
               // do something for tablet devices
                
            }
            else if ($mobile_browser > 0) {
               // do something for mobile devices
                   $request_type = '150';
            }
            else {
               // do something for everything else
                  $request_type = '100';
            }   
            

    

            $curr_date = date("Y-m-d");

            $check_for_the_same_game = $wpdb->get_results("
            SELECT * 
            FROM download_games
            WHERE cell_no = $cell 
                AND game_id = $game_id
                AND date(request_date) = '$curr_date'
            "
        );
    
 
    if (empty($check_for_the_same_game)) {
     
    $decrement_quota = $down_quota -1;
    update_user_meta( $u_id, 'download_quota', $decrement_quota);

     }


     
     $wpdb->insert( 
            'download_games', 
            array( 
                'game_id' => $game_id,
                'game_url' => $game_url,
                'cell_no' => $cell,
                'request_type' => $request_type,
                'request_date'=>date("Y-m-d"),
                'sent_status' =>'0'
            ), 
            array( 
                '%d',
                '%s',
                '%s',
                '%s',
                '%s',
                '%d'
                 
            ) 
        );

   
    if(ICL_LANGUAGE_CODE =='en'){ 

    return "The Link to download ".$game_title." has been sent to the registered mobile number";
      }
        else
        {
            return "رابط التحميل".$game_title."تم إرساله إلى رقم الجوال المسجل";

        }
}

function showDownloadQuotaEndPopup(){

      if(ICL_LANGUAGE_CODE =='en'){ 

       $msg = 'You have already consumed your quota for trial period.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn" >Download Now</button>
      '; }
      else
      {
        $msg = 'لقد استهلكت بالفعل حصتك لفترة تجريبية.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn" >التحميل الان</button>
      '; 
      }

        

     return $msg;
     
}

function showDownloadQuotaEndTrialExpirePopup(){
    if(ICL_LANGUAGE_CODE =='en'){ 
   $msg = 'You have already consumed your quota for this week/month.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn" >Download Now</button>
     ';
 }else {
     $msg = 'لقد استهلكت بالفعل حصتك لهذا الأسبوع / الشهر.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn" >التحميل الان</button>
     ';
 }
     return $msg; 
 
}

function showChargNowTrialExpirePopup($u_mobile){
     if(ICL_LANGUAGE_CODE =='en'){ 
    $msg = 'Your membership is suspended due to non-charging of subscription fee. Please top-up your balance and after successful deduction of charges, you can download.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn"  >Charge Now</button>
     ';
     }else {
        $msg = 'تم تعليق عضويتك بسبب عدم فرض رسوم اشتراك. يرجى تعبئة رصيدك وبعد خصم الرسوم بنجاح ، يمكنك التنزيل.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn"  >اشحن الان</button>
     ';
     }
     return $msg; 
}

function showDownloadQuotaEndPremiumPopup(){
    if(ICL_LANGUAGE_CODE =='en'){ 
    $msg = 'You have already consumed your quota for this week/month.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn" >Download Now</button>
     ';
 } else {
    $msg = 'لقد استهلكت بالفعل حصتك لهذا الأسبوع / الشهر.
       <button class="btn btn-danger btn-block loginmodal-submit frm-btn" id="dwn_btn" >التحميل الان</button>
     ';
 } 
     return $msg;
}


/*********************************************************
charge Games Action
*********************************************************/
add_action( 'wp_ajax_nopriv_show_charge_popup', 'show_charge_popup' );
add_action( 'wp_ajax_show_charge_popup', 'show_charge_popup' );

function show_charge_popup(){

if(ICL_LANGUAGE_CODE =='en'){ 
 $msg = 'Susbject to successful charging, you will receive the download link through SMS on the registered Mobile Number';
}
else {
  $msg = 'Susbject لنجاح عملية الشحن ، سوف تتلقى رابط التنزيل عبر الرسائل القصيرة على رقم الجوال المسجل';
}  

     echo $msg;
 die();
}