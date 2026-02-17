<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
   
    
    $formErrors = array();
    if (strlen($user) <= 3){
        $formErrors[] = 'username must be larger than <strong>3</strong> characters';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $formErrors[] = 'Please enter a <strong>valid email</strong>';
}
    if (strlen($msg) < 10){
        $formErrors[] = 'message can not be less than <strong>10</strong>  characters';
    }

    $headers = 'From: '. $email . '\r\n';
    $myEmail = 'breskella.boshra27@gmail.com';
    $subject = 'Content Form';

    if (empty($formErrors)){
        
    // mail(to: $myEmail,$subject,$msg,$headers);
        $success = '<div class ="alert alert-success">we have recieved your message</div>';


    }

    $user = '';
    $email = '';
    $cell = '';
    $msg = '';


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elzero contact form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/contact.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="container">
       <h1 class="text-center">Contact Me</h1>
      

       <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
             
              <?php if (!empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span>
                  </button>
               <?php
                 foreach($formErrors as $error){
                 echo $error.'<br/>';
                 }
                 ?>
                </div>
             <?php }  ?>
             <?php
               if(isset($success)){echo $success;}?>
             

       
    <div class="form-group">
        <input class="username form-control" type="text" name="username" placeholder="Type your username" value="<?php if(isset($user)){echo $user;}?>" required>
        <i class="fa fa-user fa-fw"></i>
        <span class="asterisx">*</span>
        <div class="alert alert-danger custom-alert">
            username must be larger than <strong>3</strong> characters
        </div>
    </div>

    <div class="form-group">
<input class="email form-control" type="email" name="email"
placeholder="Please type a valid email"
value="<?php if(isset($email)){echo $email;}?>" required>
        <i class="fa fa-envelope fa-fw"></i>
        <span class="asterisx">*</span>
        <div class="alert alert-danger custom-alert">
            Email can't be  <strong>Empty</strong>
        </div>
    </div>

    <div class="form-group">
        <input class="form-control" type="tel" name="cellphone" placeholder="Type your cell phone" value="<?php if(isset($cell)){echo $cell;}?>" >
        <i class="fa fa-phone fa-fw"></i>
        
    </div>

    <div class="form-group">
        <textarea class="message form-control" name="message" placeholder="Your message!" ><?php if(isset($msg)){echo $msg;}?></textarea>
        <span class="asterisx">*</span>
        <div class="alert alert-danger custom-alert">
            message cant be less than <strong>10</strong> characters
        </div>
    </div>

    <div class="form-group">
<input type="submit" class="btn btn-success submit" value="Send Message">
        <i class="fa fa-send fa-fw send-icon"></i>
    </div>


</form>


    </div>

    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>