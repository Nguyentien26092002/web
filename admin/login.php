<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blur login</title>
   <link rel="stylesheet" href="login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>

<body >
   <div class="overlay"></div>
   <div class="login-container">
      <div>
         <div class="logo">
            <i class="fas fa-hat-wizard"></i>
            <span>Minh Long Moto</span>
         </div>
         <div class="register">
            <div style="font-family:'Times New Roman', Times, serif;" >Bồ có thể không có nhưng xe thì không</div>
            <div class="social">
               <a data-toggle="tooltip" title="Facebook" href=""><i class="fab fa-facebook-f"></i></a>
               <a data-toggle="tooltip" title="Google" href=""><i class="fab fa-google"></i></a>
               <a data-toggle="tooltip" title="Pinterest" href=""><i class="fab fa-pinterest-p"></i></a>
               <a data-toggle="tooltip" title="Github" href=""><i class="fab fa-github"></i></a>
            </div>
         </div>
      </div>

      <div class="form-login">

         <form action="index.php" method="POST" class="form" id="form-2">
            <h3 class="heading">Sign up</h3>      
            <div class="spacer"></div>
      
            <div class="form-group">
              <label for="email" class="form-label">Tên Tài Khoản</label>
              <input id="name" name="name" type="text" placeholder="VD: MinhLongMotor" class="form-control">
              <span class="form-message"></span>
            </div>
      
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input id="password" name="password" type="password" placeholder="Enter password" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="sign-up">
               <div>
                  <button class="form-submit">Sign up</button>
                  <i class="fas fa-chevron-right"></i>

          </form>












      </div>
   </div>

</body>
<script>
const form = document.getElementById("form-2");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");

form.addEventListener("submit", function(event) {
  if (!emailInput.value || !passwordInput.value) {
    event.preventDefault(); // Chặn việc submit form
    if (!emailInput.value) {
      alert("Vui lòng nhập tên tài khoản!");
      emailInput.focus();
    } else {
      alert("Vui lòng nhập mật khẩu!");
      passwordInput.focus();
    }
  }
});
</script>
</html>