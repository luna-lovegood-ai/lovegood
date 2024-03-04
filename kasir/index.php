<?php

session_start();
if (empty($_SESSION['username_kasir'])) {
  header('location:../index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Kasir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>

  <link rel="stylesheet" href="../asset/css/style.css">

  <style>
    body{
      background-color: rgba(0, 0, 0, 0.34);
    }
    div.fixed-bottom {
      font-style: italic;
    }
  </style>

</head>

<body>

  <!-- header -->
  <?php include "header.php"; ?>
  <!-- end header -->
  <div class="wrapper">
  <div class="main">
  <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>

  <div class="container-lg">
    <div class="row mb-5">
      <!-- sidebar -->

      <!-- end sidebar -->

      <!-- content -->
      <?php include "main.php"; ?>
      <!-- end content -->

    </div>
    
  </div>
  </div>
  </div>
  <script src="../asset/js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
</body>

</html>