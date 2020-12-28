<?php
  include "dbConfig.php";
?>
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
    <title>FDPro | All Users</title>
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
  crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css" />

 

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
    <div class="bg-black px-3">
      <div w3-include-html="sidebar.html"></div>
      <div class="my-auto">
        <!-- <div class="text-white border-bottom-main">
          <h3 class="text-center my-4 color-main">USERS ACTIVATION</h3>
        </div> -->
        <div class="h-600 mt-3 table-responsive rounded border-main">
          <table class="table table-bordered">
            <thead class="text-center">
              <tr class="header">
                <th colspan="7" class="text-black py-3 h4">ALL USERS</th>
              </tr>
              <tr class="h6">
                <th class="py-3">Id</th>
                <th class="py-3">Username</th>
                <th class="py-3">Email</th>
                <th class="py-3">Mobile Phone</th>
                <th class="py-3">IsActive</th>
                <th class="py-3">IsVerfied</th>
                <th class="py-3">Level</th>

              </tr>
            </thead>
            <tbody class="text-center">
             
                <?php
                  $db = openCon();
                  $select= "SELECT *  from user ";
                  $query = mysqli_query($db , $select);
                  $rows= mysqli_num_rows($query);
                  for($i=0 ; $i<$rows ; $i++ )
                  {
                    $array= $query->fetch_assoc();
                    echo'
                    <tr>
                        <td> 5DP' . sprintf("%07d", $array["id"]) .'</td>
                        <td>'.$array["username"].'</td>
                        <td>'.$array["email"].'</td>
                        <td>'.$array["phone"].'</td>
                        <td>'.$array["is_active"].'</td>
                        <td>'.$array["is_verify"].'</td>
                        <td>'.$array["level"].'</td>
                        </tr>';
              }
                ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>   
    
    <script>
      $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });

      function activate(id){
        jQuery.ajax({
              url: "./backend/activate.php",
              type: "GET",
              data: {
                id:id,
              },
              success: function (data){
                Swal.fire({
                  icon: 'success',
                  text: 'you have activated the user successfully!',
                }).then((result) => 
                {
                if (result.isConfirmed) 
                location.reload();
                });
  },
              error: function (data){
                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
}) ;             },
            }
        );
      }
    </script>
    <script>
      includeHTML();
    </script>
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
