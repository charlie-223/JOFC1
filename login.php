<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Momoyo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }

    .login-container {
      display: flex;
      height: 100%;
      width: 100%;
    }

    .left-side {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 0;
      height: 100%;
    }

    .right-side {
      flex: 1;
      background-image: url('Momoyobg.png');
      margin-left: -200px;
      background-size: cover;
      background-position: center;
      height: 100%;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1); 
      }
      100% {
        transform: scale(1);
      }
    }

    .logo {
      display: block;
      margin: 0 auto 20px;
      width: 150px;
      animation: pulse 1.5s infinite ease-in-out; 
      transition: all 0.3s ease-in-out; 
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .logo:hover {
      transform: scale(1.05); 
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); 
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes shake {
      0% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      50% { transform: translateX(5px); }
      75% { transform: translateX(-5px); }
      100% { transform: translateX(0); }
    }

    .form-container {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 100%;
      max-width: 400px;
    }

    h2 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #212529;
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      font-size: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    }

    .btn {
      padding: 12px 25px;
      border-radius: 30px;
      font-size: 1.2rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-primary {
      background-color: rgb(255, 122, 189);
      border-color: #d63384;
    }

    .btn-primary:hover {
      background-color: #c13572;
      transform: scale(1.05);
    }

    .btn-link {
      font-size: 1rem;
      color: #d63384;
      text-decoration: none;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .btn-link:hover {
      color: #c13572;
      transform: scale(1.1);
      text-decoration: none;
    }

   
    .alert {
      display: none;
      opacity: 0;
      animation: fadeIn 0.5s ease-out, shake 0.5s ease-in-out;
      margin-bottom: 20px;
    }

    
    .alert.show {
      display: block;
      opacity: 1;
    }

   
    .alert:hover {
      animation: shake 0.5s ease-in-out;
      cursor: pointer;
    }
  </style>
</head>
<body>

<section class="login-container">
  <div class="left-side">
    <div class="form-container">
      <img src="momoyo.png" alt="Momoyo Logo" class="logo">
      <h2 class="text-center mb-4">Login</h2>

      <?php session_start(); ?>
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-message">
          <?= $_SESSION['error']; unset($_SESSION['error']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $_SESSION['success']; unset($_SESSION['success']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="login_action.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <button type="submit" class="btn btn-primary">Login</button>
          <a href="register.php" class="btn btn-link">Register</a>
        </div>
      </form>
    </div>
  </div>

  <div class="right-side"></div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  
  document.addEventListener('DOMContentLoaded', function() {
    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
      errorMessage.classList.add('show');
    }
  });
</script>

</body>
</html>
