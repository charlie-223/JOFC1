<?php
session_start();
include 'db_connect.php';

$current_page = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | Momoyo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #ff66b2;
      --secondary-color: #ff99ca;
      --dark-color: #333;
      --light-color: #f9f9f9;
      --success-color: #28a745;
      --warning-color: #ffc107;
      --danger-color: #dc3545;
    }

    body {
      background-color: #f9f9f9;
      color: #333;
      font-family: 'Arial', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      margin: 0;
      padding-top: 80px;
    }

    /* NAVBAR STYLES WITHOUT ANIMATIONS */
    header {
      background-color: var(--secondary-color);
      color: white;
      padding: 10px 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }

    .navbar-brand {
      color: white !important;
      font-weight: 600;
      font-size: 1.8rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar-brand img {
      width: 40px;
      height: 40px;
    }

    .navbar {
      background-color: var(--secondary-color) !important;
      padding: 0;
    }

    .nav-link {
      color: white !important;
      font-weight: 500;
      padding: 8px 16px !important;
      border-radius: 20px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-link:hover, .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      color: white !important;
      transform: translateY(-2px);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .nav-link i {
      font-size: 0.9rem;
    }

    .btn-outline-custom {
      background-color: transparent;
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
    }

    .btn-outline-custom:hover {
      background-color: var(--primary-color);
      color: white;
    }

    @media (max-width: 768px) {
      .navbar-nav {
        flex-direction: column;
        margin-left: 0;
        padding-left: 0;
        width: 100%;
      }

      .nav-item {
        margin-top: 15px;
        margin-left: 0;
        width: 100%;
        text-align: left;
      }

      .nav-link {
        padding: 8px 20px !important;
      }
    }

    /* Enhanced Button Styles */
    .btn-custom {
      border-radius: 25px;
      font-weight: 500;
      transition: all 0.3s ease;
      padding: 10px 25px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-primary-custom {
      background-color: var(--primary-color);
      border: none;
      color: white;
    }

    .btn-primary-custom:hover {
      background-color: #c13572;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      color: white;
    }

    .btn-secondary-custom {
      background-color: var(--secondary-color);
      border: none;
      color: white;
    }

    .btn-secondary-custom:hover {
      background-color: #ff3399;
      color: white;
      transform: translateY(-2px);
    }

    footer {
      background-color: var(--secondary-color);
      color: #333;
      text-align: center;
      padding: 15px;
      width: 100%;
      margin-top: auto;
    }

    .highlight {
      color: var(--primary-color);
      font-weight: bold;
    }

    .about-section {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin-top: 30px;
      margin-bottom: 30px;
    }

    .about-section h2 {
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 20px;
      color: var(--primary-color);
    }

    .about-section p {
      font-size: 1.2rem;
      line-height: 1.6;
      color: #555;
      margin-bottom: 20px;
    }

    .about-img {
      max-width: 100%;
      border-radius: 8px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .about-us-header {
      text-align: center;
      margin-bottom: 50px;
      padding-top: 30px;
    }

    .about-us-header h1 {
      font-size: 2.5rem;
      font-weight: 600;
      color: var(--dark-color);
    }

    .about-us-header p {
      font-size: 1.2rem;
      color: #666;
    }

    .team-section {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin: 30px 0;
    }

    .team-member {
      text-align: center;
      margin-bottom: 30px;
    }

    .team-member img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--primary-color);
      margin-bottom: 15px;
    }

    @media (max-width: 768px) {
      body {
        padding-top: 70px;
      }

      .about-section .row {
        flex-direction: column;
      }

      .about-img {
        margin-bottom: 30px;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="dashboard.php">
          <img src="momoyo.png" alt="Momoyo Logo" />
          Momoyo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link <?= $current_page === 'dashboard.php' ? 'active' : '' ?>" href="dashboard.php">
                <i class="fas fa-home"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $current_page === 'profile.php' ? 'active' : '' ?>" href="profile.php">
                <i class="fas fa-user"></i> Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $current_page === 'locations.php' ? 'active' : '' ?>" href="locations.php">
                <i class="fas fa-map-marker-alt"></i> Locations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-globe"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">
                <i class="fas fa-address-book"></i> Contact
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $current_page === 'about.php' ? 'active' : '' ?>" href="about.php">
                <i class="fas fa-info-circle"></i> About Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-outline-custom" href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <section class="container py-5 about-us-header">
    <h1>About Momoyo</h1>
    <p>Welcome to the official page of Momoyo, the home of delicious ice cream and iced coffee!</p>
  </section>

  <section class="container about-section">
    <div class="row">
      <div class="col-md-6">
        <img src="momoyo.png" alt="About Momoyo" class="about-img">
      </div>
      <div class="col-md-6">
        <h2><i class="fas fa-book me-2"></i> Our Story</h2>
        <p>At Momoyo, we take pride in serving the best ice cream and iced coffee, made with love and passion. Our journey started with a single mission: to bring smiles and refreshment to our customers with every bite and sip. Over the years, we have grown, expanded our menu, and added exciting new flavors, but one thing remains the same: our commitment to quality and customer satisfaction.</p>

        <h2><i class="fas fa-bullseye me-2"></i> Our Mission</h2>
        <p>Our mission is simple: to create unforgettable experiences with every scoop of ice cream and cup of iced coffee we serve. Whether you're here for a quick treat or a cozy hangout, we're dedicated to providing the highest quality products made with fresh ingredients. We hope that each visit to Momoyo brings joy to your day.</p>

        <h2><i class="fas fa-eye me-2"></i> Our Vision</h2>
        <p>We aspire to become a beloved destination for ice cream and iced coffee enthusiasts, where people of all ages can enjoy a relaxing and flavorful experience. We envision a world where everyone can savor a sweet moment of indulgence, creating memories with friends, family, and loved ones.</p>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Momoyo. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>