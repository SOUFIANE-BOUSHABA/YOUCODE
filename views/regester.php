<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .registration-form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body style="background-image: url('./public/youcode.jfif');">

  <div class="registration-form">
    <h2 class="text-center">Registration</h2>
    <form method="POST" action="../controllers/UserController.php">
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Enter your name" name="firstname" required>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Enter your name" name="lastname" required>
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" placeholder="Create password" name="password" required>
      </div>
    
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" required>
        <label class="form-check-label">I accept all terms & conditions</label>
      </div>
      <div class="mb-3">
        <button type="submit" name="regester" class="btn btn-primary form-control">Register Now</button>
      </div>
      <div class="text-center">
        <p>Already have an account? <a href="index.php?action=login">Login now</a></p>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
