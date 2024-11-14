<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">

    <!-- Google Fonts for Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
      /* General Body Styling */
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
      }

      /* Navbar Styling */
      .navbar-custom {
        background: linear-gradient(90deg, rgba(0, 123, 255, 1) 0%, rgba(0, 123, 255, 0.7) 100%);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .navbar-brand img {
        height: 40px;
        margin-right: 10px;
      }

      .navbar-nav .nav-link {
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .navbar-nav .nav-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
        border-radius: 5px;
        color: #0056b3;
        transform: translateY(-3px);
      }

      /* Button Styling */
      .btn-custom {
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .btn-custom:hover {
        background-color: #0056b3;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }

      .content-box {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 30px;
      }

      .content-box h3 {
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: 500;
      }

      /* Card Design for Main Content */
      .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      .card-header {
        background-color: #f8f9fa;
        font-weight: 600;
      }

      .card-body {
        background-color: #f1f3f5;
        border-radius: 10px;
      }

      .card-body p {
        font-size: 14px;
        color: #6c757d;
      }

      /* Custom container padding */
      .container-fluid {
        padding: 0 15px;
      }
    </style>
  </head>
  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container-fluid">
        <!-- Logo or program name -->
        <a class="navbar-brand" href="#">
          <img src="navbar/logo.png" alt="Logo"> Program To do List
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link btn-custom me-2" href="index.php?halaman=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-custom me-2" href="index.php?halaman=todo">Todo</a>
            </li> 
          </ul>
        </div>
      </div>
    </nav>

    <!-- Content Section -->
    <div class="container-fluid">
      <div class="row justify-content-center mt-4">
        <div class="col-md-10">
          <div class="content-box">
            <!-- PHP content insertion based on halaman -->
            <?php
              if ($_GET['halaman'] == 'home') {
                  include 'home.php';
              } elseif ($_GET['halaman'] == 'todo') {
                  include 'navbar/todo.php';
              } elseif ($_GET['halaman'] == 'edit_todo') {
                  include 'navbar/edit_todo.php';
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
