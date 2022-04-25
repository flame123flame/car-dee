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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">CARDEE</span>
                    <span class="profession">User: <?php
                    echo $dataUser['username'];
                     ?></span>
                </div>
            </div>

            <!-- <i class='bx bx-chevron-right toggle'></i> -->
        </header>

        <div class="menu-bar">
            <div class="menu" style="margin-left: -15px !important;">
              
                <ul class="menu-links">
              
             

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
                        <a href="seller.php">
                            <i class='bx bx-car icon'></i>
                            <span class="text nav-text">รายการขายรถ</span>
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
                    <a href="seller.php?logout='1'" >
                        <i class='bx bx-log-out icon' ></i>
                        <span  class="text nav-text">Logout</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #fcfcfc;">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">รายการขายรถ</li>
  </ol>
</nav>
    <div class="card">
    <div style="display: flex; justify-content: space-between; align-content: flex-start; align-items: center;">
    <h3>รายการขายรถ</h3>
      <button type="button" class="btn btn-info btn-sm"><a class="nav-link" href="selle-add.php" style="cursor: pointer;color:#fff;text-decoration: none;">เพิ่มขายรถ</a></button>
     </div>

      <table id="customers" class="table table-striped mt-3 table-bordered" >
  <tr>
    <th>ยี่ห้อ</th>
    <th>รุ่น</th>
    <th>ระบบเกียร์</th>
    <th>เครื่องยนต์</th>
    <th>สี</th>
    <th>ราคา</th>
    <th>สถานะการขาย</th>
    <th>รายละเอียด</th>
  </tr>
  <?php 
                include_once('functions-add-car.php');
                $fetchdata = new DB_con();
                $sql = $fetchdata->fetchdataProcess();
                // $sql2 =  mysqli_query($conn, "update  Post SET status=`post` where Post.id = 1 ");
                while($row = mysqli_fetch_array($sql)) {
     
            ?>

                <tr>
                <td><?php echo $row['BrandOfCar']; ?></td>
                <td><?php echo $row['Model']; ?></td>
                <td><?php echo $row['GearSystem']; ?></td>
                <td><?php echo $row['Engine']; ?></td>
                <td><?php echo $row['Color']; ?></td>
                <td><?php echo $row['Prize']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                    <td>
                    <a <?php if ($dataUser['status']!= "admin"){?>style="display:none"<?php }?> href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Approve</a>
                    <a <?php if ($dataUser['status']== "admin"){?>style="display:none"<?php }?> href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a <?php if ($dataUser['status']== "admin"){?>style="display:none"<?php }?> href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>

                </tr>

            <?php 

                }
            ?>
</table>
</div>
   
    </section>

    <script src="script.js">
    </script>
    <script type="text/javascript">
function doSomething(id){
    $.post("del_notif.php", {id: id});
return false;
}
</script>

</body>
</html>
<style>
  @font-face {
        font-family: "Prompt";
        src: url("fonts/Prompt-Regular.ttf"), url("fonts/Prompt-Medium.ttf"),
            url("fonts/Prompt-SemiBold.ttf");
    }

    * {
        font-family: "Prompt", sans-serif;
    }

.home{
    padding: 2%;
 
}
.card {
    padding: 15px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px;
  background-color: #ffff;
}

</style>