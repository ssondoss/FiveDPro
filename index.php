<?php
  session_start();
    if(!isset($_SESSION["adminID"])){
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FDPro | Home</title>
    <link rel="shortcut icon" href="images/FD Web.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="include.js"></script>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../shared_scripts.js"></script>
  </head>
  <body
    style="
      background-image: url('images/money.jpg');
      background-size: cover;
      width: 100%;
      height: 400px;
    "
  >
    <div class="bg-black px-2">
      <div w3-include-html="sidebar.html"></div>
      <div class="row justify-content-center mt-5 mr-0 mx-3">
        <div class="col-md-3 alert-danger alert mx-auto circle">
          <div class="border-bottom-black pb-3">
            <h3>
              4000
              <i class="fa fa-trophy float-right" aria-hidden="true"></i>
            </h3>

            <span class="pt-3"> Paid Subscribtions </span>
          </div>
          <small class="pt-2">updated 1 minute ago</small>
        </div>
        <div class="col-md-3 alert-info alert mx-auto circle">
          <div class="border-bottom-black pb-3">
            <h3>
              4000 $
              <i class="fa fa-usd float-right" aria-hidden="true"></i>
            </h3>
            <span class="pt-3"> all Earnings </span>
          </div>
          <small class="pt-2">updated 1 minute ago</small>
        </div>
        <div class="col-md-3 alert-success alert mx-auto circle">
          <div class="border-bottom-black pb-3">
            <h3>
              4000
              <i class="fa fa-users float-right" aria-hidden="true"></i>
            </h3>

            <span class="pt-3"> all Users </span>
          </div>
          <small class="pt-2">updated 1 minute ago</small>
        </div>
      </div>
      <div class="alert alert-warning mt-5">3 users registered in level 1</div>
      <div class="alert alert-warning">3 users registered in level 2</div>
    </div>
    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
      }
    </script>
    <script>
      includeHTML();
    </script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
