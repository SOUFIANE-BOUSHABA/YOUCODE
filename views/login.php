<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login Form</title>
  <style>
    body {
      
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-repeat: no-repeat;
      background-size: cover;
      
    }

    .login-form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     
     ;
    }
  </style>
</head>
<body style="  background-image: url('./public/youcode.jfif');">

  <div class="login-form col-md-3">
    <h2 style="color: #007bff;">YouCode</h2>
    
    <form method="post" action="index.php?action=formateur">
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <button type="submit" name="submit" value="loginuser" class="btn btn-primary form-control btn-block">Se Connecter</button>
    </form>

    <p class="mt-3">Don't have an account? <a href="index.php?action=regester">Create one</a></p>
  </div>
<div>
 
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
