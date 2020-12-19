<?php
  session_start();
  if(isset($_SESSION["adminID"])){
    header("Location: index.html");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FDPro | Home</title>
    <link rel="shortcut icon" href="images/FD Web.png" type="image/x-icon" />

    <script src="include.js"></script>
    <script type="text/javascript" src="path/jquery-ui.js"></script>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="style.css" />

    <script src="../shared_scripts.js"></script>
  </head>
  <body
    style="
      background-image: url('images/money.jpg');
      background-size: cover;
      width: 100%;
      height: 100vh;
    "
  >
    <div class="bg-black p-3" style="display: flex; align-items: center; justify-content: center">
      <form class="col-md-4 bg-white p-5 text-center rounded-lg">
        <img src="images/FD Web.png" alt="" height="50%" width="100%" />
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="Username"
            id="username"
          />
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control"
            placeholder="Password"
            id="password"
          />
        </div>
        <div class="text-center">
          <button
            type="button"
            class="btn btn-main w-50 mt-4"
            onclick="onLogin()"
          >
            Login
          </button>
        </div>
      </form>
    </div>
    <script>
      function onLogin() {
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        jQuery.ajax({
          url: "./backend/login.php",
          type: "POST",
          data: {
            username: username,
            password: password,
          },
          success: function (data) {
            if (data.isLoggedIn == "true") { history.go(0);
            window.location.href = window.location.href;
            location.reload();} else {
              Swal.fire({
                type: "error",
                title: "Oops...",
                text: "Wrong Username and/or Password!",
              });
            }
          },
          error: function (data) {
            //Swal.fire(data);
          },
        });
      }
    </script>

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
