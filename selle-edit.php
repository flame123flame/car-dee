
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

  
    include_once('functions-add-car.php');
    $insertdata = new DB_con();

    $query2 = "SELECT * FROM Cartype ORDER BY id asc" or die("Error:" . mysqli_error());
    $result = mysqli_query($conn, $query2);

    $user_check_query = "SELECT * FROM Seller WHERE username = '".$_SESSION['username']."' ";
    $query3 = mysqli_query($conn, $user_check_query);
    $resultUser = mysqli_fetch_assoc($query3);

  

    if (isset($_POST['insert'])) {

        $Vehicle_registration_number = $_POST['Vehicle_registration_number'];
        $NumberOfSeats = $_POST['NumberOfSeats'];
        $numberOfMile = $_POST['numberOfMile'];
        $Model = $_POST['Model'];
        $BrandOfCar = $_POST['BrandOfCar'];
        $GearSystem = $_POST['GearSystem'];
        $SpareKey = $_POST['SpareKey'];
        $Engine = $_POST['Engine'];
        $Prize = $_POST['Prize'];
        $Color = $_POST['Color'];
        $ID_cartype = $_POST['ID_cartype'];
        $year_car = $_POST['year_car'];
        
        $sqlPost = $insertdata->insertPost('process',$resultUser['Id_Card_number']);

        $user_check_Post = "SELECT * FROM Post order by id DESC ";
        $queryPost = mysqli_query($conn, $user_check_Post);
        $resultPost = mysqli_fetch_assoc($queryPost);


        $sql = $insertdata->insertCar($year_car,$resultPost['id'],
        $Vehicle_registration_number, $NumberOfSeats, $numberOfMile, $Model,	$GearSystem, $SpareKey,  $Engine, $BrandOfCar, $Prize, $Color, $ID_cartype
        );
        $user_check_Car = "SELECT * FROM Car order by id DESC ";
        $query_Car = mysqli_query($conn, $user_check_Car);
        $result_Car = mysqli_fetch_assoc($query_Car);
        $id = $result_Car['id'];

        

        if ($sql) {
            // echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='seller.php'</script>";
        } else {
            // echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='selle-add.php'</script>";
        }
    }

?>

<?php
        include_once 'server.php';
        if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE employee set userid='" . $_POST['userid'] . "', first_name='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', city_name='" . $_POST['city_name'] . "' ,email='" . $_POST['email'] . "' WHERE userid='" . $_POST['userid'] . "'");
        $message = "Record Modified Successfully";
        }
        $result2 = mysqli_query($conn,"SELECT * FROM Car WHERE id ='" . $_GET['id'] . "'");
        $row = mysqli_fetch_array($result2);
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
                            <i class='bx bx-edit-alt icon' ></i>
                            <span class="text nav-text">รายการที่ยืนยันแล้ว</span>
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
                    <a href="selle-add.php?logout='1'" >
                        <i class='bx bx-log-out icon' ></i>
                        <span  class="text nav-text">Logout</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">    
         <form action="" method="post" enctype="multipart/form-data">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #fcfcfc;">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="seller.php">รายการขายรถ</a></li>
    <li class="breadcrumb-item active" aria-current="page">เพิ่มรายการขายรถ</li>
  </ol>
    <div class="card">
    <div style="display: flex; justify-content: space-between; align-content: flex-start; align-items: center;">
    <h3>เพิ่มรายการขายรถ</h3>
     </div>
     <div class="row">
         <div class="col">
         <div class="form-group">
            <label >เลขทะเบียนรถ</label>
           <input type="text" class="form-control" name="Vehicle_registration_number"  value="<?php echo $row['Vehicle_registration_number']; ?>" >
         </div>
         </div>
         <div class="col">
         <div class="form-group">
    <label >ยี่ห้อ</label>
    <select class="form-control" name="BrandOfCar"  value="<?php echo $row['BrandOfCar']; ?>" >
      <option value="เลือกยี่ห้อ">เลือกยี่ห้อ</option>
      <option value="อีซูซุ">อีซูซุ</option>
  <option value="โตโยต้า">โตโยต้า</option>
<option value="ฮอนด้า">ฮอนด้า</option>
<option value="มิทซูบิชิ">มิทซูบิชิ</option>
<option value="นิสสัน">นิสสัน</option>
<option value="มาซด้า">มาซด้า</option>
<option value="ฟอร์ด">ฟอร์ด</option>
<option value="เอ็มจี">เอ็มจี</option>
<option value="ซูซูกิ">ซูซูกิ</option>
<option value="เชฟโรเลต">เชฟโรเลต</option>
<option value="ซูบารุ">ซูบารุ</option>
<option value="บีเอ็มดับเบิลยู">บีเอ็มดับเบิลยู</option>
<option value="เมอร์เซเดส-เบนซ์">เมอร์เซเดส-เบนซ์</option>
<option value="เทสล่า">เทสล่า</option>
<option value="โฟล์คสวาเกน">โฟล์คสวาเกน</option>
<option value="จีเอ็ม">จีเอ็ม</option>
<option value="สเตแลนทิส">สเตแลนทิส</option>
    </select>
  </div>
         </div>
         <div class="col">
         <div class="form-group">
            <label >รุ่น</label>
           <input type="text" class="form-control" name="Model" value="<?php echo $row['Model']; ?>" >
         </div>
         </div>
     </div>

     <div class="row">
         <div class="col">
         <div class="form-group">
            <label >เลขไมล์</label>
           <input type="text" class="form-control" name="numberOfMile" value="<?php echo $row['NumberOfMile']; ?>"  required>
         </div>
         </div>
         <div class="col">
         <div class="form-group">
         <label >ระบบเกียร์</label>
       <select class="form-control" name="GearSystem" required value="<?php echo $row['GearSystem']; ?>" >
             <option value="อัตโนมัติ">อัตโนมัติ</option>
             <option value="ธรรมดา">ธรรมดา</option>
       </select>
        </div>
         </div>
         <div class="col">
         <div class="form-group">
         <label >กุญแจสำรอง</label>
       <select class="form-control" name="SpareKey" required value="<?php echo $row['SpareKey']; ?>">
             <option value="มี">มี</option>
             <option value="ไม่มี">ไม่มี</option>
       </select>
        </div>
         </div>
     </div>
    
  <div class="row">
  <div class="col">
         <div class="form-group">
            <label >ราคา</label>
           <input type="text" class="form-control" name="Prize" required value="<?php echo $row['Prize']; ?>" >
         </div>
         </div>
  <div class="col">
         <div class="form-group">
         <label >เครื่องยนต์</label>
       <select class="form-control" name="Engine" value="<?php echo $row['Engine']; ?>">
             <option value="ดีเซล">ดีเซล</option>
             <option value="เบนซิน">เบนซิน</option>
       </select>
        </div>
         </div>
    <div class="col-sm">
    <div class="form-group">
         <label >ประเภทรถ</label>
    <select name="ID_cartype" class="form-control" required  >
    <option value="">กรุณาเลือกประเภทรถ</option>
    <?php foreach($result as $results){?>
    <option value="<?php echo $results["Cartype_Name"];?>">
      <?php echo $results["Cartype_Name"]; ?>
      </option>
    <?php } ?>
    </select>
    </div>
    </div>
       
  </div>
    <div class="row">
         <div class="col">
         <div class="form-group">
            <label >สี</label>
           <select class="form-control "  name="Color" value="<?php echo $row['Color']; ?>">
                                        <option>เลือกสี</option>
                                        <option value="ดำ">ดำ</option>
                                        <option value="แดง">แดง</option>
                                        <option value="เทา">เทา</option>
                                        <option value="ขาว">ขาว</option>
                                        <option value="ขาวมุก">ขาวมุก</option>
                                        <option value="ส้ม">ส้ม</option>
                                    </select>
         </div>
         </div>
         <div class="col">
         <div class="form-group">
            <label >จำนวนที่นั่ง</label>
           <input type="text" class="form-control" name="NumberOfSeats" value="<?php echo $row['NumberOfSeats']; ?>" >
         </div>
         </div>
         <div class="col">
         <div class="form-group">
            <label >รถปี</label>
           <select class="form-control"  name="year_car" value="<?php echo $row['year_car']; ?>">
      <option value="2022">2022</option>
      <option value="2021">2021</option>
      <option value="2020">2020</option>
       <option value="2019">2019</option>
      <option value="2018">2018</option>
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
  </select>
         </div>
         </div>
         </div>
  
    


     <div class="row mt-3">
         <div class="col text-center">
         <button type="button" class="btn btn-secondary"> <a href="javascript:history.go(-1)" class="colorb">กลับ</a> </button>
         <button type="submit" name="insert" class="btn btn-info">บันทึกข้อมูล</button>
         </div>
         </div>
         </div>
 
</div>
</form>
    </section>

    <script src="script.js"></script>

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
.colorb{
    color: #fff;
}
.card {
    padding: 15px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px;
  background-color: #ffff;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
}
.button-b {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
  border: none;
  color: white;
  padding: 10px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
}

</style>