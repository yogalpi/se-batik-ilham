<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Batik Ilham</title>
    <link rel="shortcut icon" type="image/png" href="<?php base_url();?>/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?php base_url();?>/assets/css/styles.min.css" />
    <script src="https://kit.fontawesome.com/59ba3b5196.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?= $this->renderSection("content"); ?>
    </div>
</body>
        <script>
        //Mensetting tanggal untuk hari ini
          window.onload = (function loadDate() {
              let date = new Date(),
                  day = date.getDate(),
                  month = date.getMonth() + 1,
                  year = date.getFullYear();

              if (month < 10) month = "0" + month;
              if (day < 10) day = "0" + day;

              const todayDate = `${year}-${month}-${day}`;

              document.getElementById("tanggal").defaultValue = todayDate;
          })();
        </script>
    <script src="<?php base_url();?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php base_url();?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/js/script.js"></script>

</html>