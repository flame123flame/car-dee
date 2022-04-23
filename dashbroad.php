<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    include "server.php";
    $query = "SELECT * FROM user WHERE username='".$_SESSION['username']."' ";
    $data = mysqli_query($conn,$query);
    $dataUser = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">CARDEE</span>
                    <span class="profession">User <?php
                    echo $dataUser['username'];
                     ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
              
                <ul class="menu-links">
              
                <li  class="nav-link active" <?php if ($dataUser['status']!= "admin"){?>style="display:none"<?php }?> >
                        <a href="#">
                            <i style="" class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                </li>
                    <li class="nav-link"  <?php if ($dataUser['status']!= "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-edit-alt icon' ></i>
                            <span class="text nav-text">สมัครเข้ามา</span>
                        </a>
                    </li>
                    <li class="nav-link"  <?php if ($dataUser['status']!= "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-edit-alt icon' ></i>
                            <span class="text nav-text">ยืนยันการสมัครแล้ว</span>
                        </a>
                    </li>

                    <li class="nav-link"  <?php if ($dataUser['status']!= "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-edit-alt icon' ></i>
                            <span class="text nav-text">ยืนยันการขายรถ</span>
                        </a>
                    </li>
                    <li class="nav-link"  <?php if ($dataUser['status']!= "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">เพิ่ม user admin</span>
                        </a>
                    </li>

                    
                    <li class="nav-link"  <?php if ($dataUser['status']== "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-car icon'></i>
                            <span class="text nav-text">ขายรถ</span>
                        </a>
                    </li>

                    <li class="nav-link"  <?php if ($dataUser['status']== "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-car icon'></i>
                            <span class="text nav-text">รถที่กำลังขาย</span>
                        </a>
                    </li>

                    <li class="nav-link"  <?php if ($dataUser['status']== "admin"){?>style="display:none"<?php }?>>
                        <a href="#">
                            <i class='bx bx-car icon' ></i>
                            <span class="text nav-text">รถที่ขายแล้ว</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="dashbroad.php?logout='1'" >
                        <i class='bx bx-log-out icon' ></i>
                        <span  class="text nav-text">Logout</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">

    <div class="card">
      <table id="customers">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbköp</td>
    <td>Christina Berglund</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Königlich Essen</td>
    <td>Philip Cramer</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>Simon Crowther</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris spécialités</td>
    <td>Marie Bertrand</td>
    <td>France</td>
  </tr>
</table>
</div>
   
    </section>

    <script src="script.js"></script>

</body>
</html>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.home{
    padding: 4%;
 
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px;
  background-color: #ffff;
}
</style>