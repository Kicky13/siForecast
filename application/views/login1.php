<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
      <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>css/style1.css">  
</head>

<body>
  <html lang="en-US">
<head>
  <meta charset="utf-8">
    <title>Login</title>
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

</head>
    <div id="login">
      <form name='form-login' action="<?php echo base_url("index.php/login/login"); ?>" method="post">
        <span class="fontawesome-user"></span>
          <input required type="text" id="user" placeholder="Username" name="username">       
        <span class="fontawesome-lock"></span>
          <input required type="password" id"pass" placeholder="Password" name="password">        
          <input type="submit" name="login" value="login" >
</form>
  
  
</body>
</html>
