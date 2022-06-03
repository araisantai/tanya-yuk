<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../frontend/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>Tanya Yuk!</title>
    <link rel="icon" type="image/png" href="../frontend/img/favicon.png" sizes="16x16">
</head>
<body>
  <div id="logsin">
    <div class="log">
      <div class="split left">
        <div class="centered">
          <img src="../frontend/img/login.png">
        </div>
      </div>

      <div class="split right login">
        <div class="centered">
          <div class="container">
          <img src="../frontend/img/icon.png" alt="" style ="max-height: 150px; width: auto;">
          <p class="login-text" style="font-size: 20px; font-weight: 300; font-family: Patrick Hand;">Tanyakan Berbagai Hal di Kepalamu dan Bantu Mereka Menemukan Jawabannya</p>
          <p class="login-text" style="font-size: 2.5rem; font-weight: 300; font-family: Lobster; margin-top: 8px;">Log In</p>
          <p class="login-text" style="font-size: 13px; font-weight: 300; font-family: Quicksand; margin-bottom: 13px;">Masuk ke akunmu sekarang dan mulai bertanya</p>
          <form action="action_login.php" method="POST" class="sign-in-form">
              <div class="input-field">
                  <i class="bi bi-person-fill"></i>
                  <input type="text" placeholder="Username" name="username" required="required"/>
              </div>
              <div class="input-field">
                <i class="bi bi-lock-fill"></i>
                <input type="password" placeholder="Password" name="password" required="required"/>
              </div>
              <p class="login-register-text">Anda belum punya akun? <a href="../login and register/register_page.php">Register</a></p>
              <input type="submit" value="Login" name="masuk" class="btn solid" />
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>