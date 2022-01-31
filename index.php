<!DOCTYPE html>
<html>
	<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

<!-- font awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />


		<title>Login</title>

	<style>



.body {
background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(21,105,199,1) 100%);
background-attachment: fixed;
}

.header img1 {
  float: left;
}

.header img2 {
  float: right;
}

.header {
  font-family: "Old English text MT";
  font-size: 20px;
  color: white;
  text-shadow: 1px 2px 7px #00008B;
}

.header-a {
  font-family: "Times New Roman";
  font-size: 12px;
  font-weight: bold;
  color: white;
  text-shadow: 1px 1px 4px #00008B;
}

.header-b {
  font-family: "Vivaldi";
  font-size: 20px;
  font-weight: bold;
  color: white;
  text-shadow: 1px 1px 3px black;
}

table{
  font-family: "Times New Roman";
  font-size: 15px;
  font-weight: bold;
}

.footer {
  font-size: 12px;
  text-align: right;
}
.login_oueter {
    width: 360px;
    max-width: 100%;
}
.logo_outer{
    text-align: center;
}

.login {
  width: 380px;
  margin: 15px auto;
  font-size: 16px;
  
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}



.login-header {
  background: #28d;
  padding: 1px;
  font-weight: normal;
  text-align: center;
  border-radius: 10px;
  margin-bottom: 20px;
  width: 100%;
}

.login-container {
  background: #ebebeb;
  padding: 10px;
  border-radius: 15px;
  width: 70%;
}



.login input {
  box-sizing: border-box;
  display: block;
  width: 30%;
  border-width: 1px;
  border-style: solid;
  padding: 8px;
  outline: 0;
  font-family: inherit;
  font-size: 1em;
  border-radius: 15px;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
  font-size: 1em;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
</style>
</head>

<body class="body">


<br><br><br>
<center>
<div class="login">
  
  
      

        <form action="login.php" method="post" id="login" autocomplete="off" class="login-container">
        <div class="form-row">
          <div class="login-header" align="center">
  <img class="img1" src="image/slc_logo.png" width="35px" />
  <b class="header">Saint Louis College </b>
  <img class="img2" src="image/cicmlogo.png" width="35px" />
  <p class="header-a">City of San Fernando, La Union</p>
  <p class="header-b" >Leave Management System</p>
</div>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>

              <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
            </div>
          </div>
          
          <div class="col-12">
            <input type="submit" value="Login" name="login">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>









<br><br><br><br><br>
<div class="footer">
  <p>© 2021 Saint Louis College, City of San Fernando, La Union. All rights reserved</p>
</div>

<script type="text/javascript">
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
 <?php include 'script.php';?>

</body>
</html>


