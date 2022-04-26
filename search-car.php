
<?php
include 'upload.php';
$searchErr = '';
$data='';

$stmt = $con->prepare("SELECT * FROM Post JOIN Car on Post.id = Car.ID_Post JOIN image on Car.id = image.id_car where Post.Status = 'post'  GROUP by Car.id");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['save']))
{
        $Prize = $_POST['Prize'];
        $type = $_POST['type'];
        $BrandOfCar = $_POST['BrandOfCar'];
        $year_car = $_POST['year_car'];
        $Model = $_POST['Model'];
        $Color = $_POST['Color'];
        $GearSystem = $_POST['GearSystem'];
        $stmt = $con->prepare("SELECT * FROM Post JOIN Car on Post.id = Car.ID_Post JOIN image on Car.id = image.id_car WHERE Car.Prize like '%$Prize%'
         and Car.ID_cartype like '%$type%'
         and Car.BrandOfCar like '%$BrandOfCar%'
         and Car.year_car like '%$year_car%'
         and Car.Model like '%$Model%'
         and Car.Color like '%$Color%'
         and Car.GearSystem like '%$GearSystem%' GROUP by Car.id");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
         
    
    
}
 
?>

<?php 
      include "server.php";
    $query2 = "SELECT * FROM Cartype ORDER BY id asc" or die("Error:" . mysqli_error());
    $result = mysqli_query($conn, $query2);

    $query5 = "SELECT * FROM Car ORDER BY id asc" or die("Error:" . mysqli_error());
    $result1 = mysqli_query($conn, $query5);
?>

<!doctype html>
<html lang="en" id="active">

<head>
    <title>CAR-DEE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30"
    style="background: rgb(255, 255, 255);overflow-x: hidden;">
    <div class=" nav-menu fixed-top color-back">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="index.php" style="margin-left: 44px;">
                        <h3
                            style="font-weight: bold;color: #fff;    text-shadow: 0px 2px 0px #fff, 1px 6px 0px rgb(0 0 0 / 10%);">
                            CAR-DEE</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar"
                        style="flex-direction: column-reverse;display: flex; ">
                        <ul class="navbar-nav ">
                            <li class="nav-item"> <a class="nav-link " href="index.php?active=home"><b
                                        class="font-menu">หน้าหลัก</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=search_car">
                                    <b class="font-menu">สำหรับคุณ</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=gallery"><b
                                        class="font-menu">ขายรถกับเรา</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=calculate"><b
                                        class="font-menu">คำนวณค่างวดเบื้องต้น</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=contact"><b
                                        class="font-menu">เกี่ยวกับเรา</b> </a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="#active" style="cursor: pointer;"><b
                                        class="font-menu">ค้นหารถมือสอง</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php"   style="color: #fff; border: 2px solid #fff; border-radius: 8px;"
                                    class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">
                                    <b class="font-menu"> ลงทะเบียนขายรถ / เข้าสู่ระบบ</b></a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div class="row" id="search_car" style="margin-top: 50px;">
        <div class="col">&nbsp;</div>
    </div>


    <div class="size-container ">
        <div class="row">
            <div class="col-12">
                <div class="client-logos my-5" style="margin-top: 2.5rem!important;    margin-bottom: 2rem!important;">
                    <div class="container text-center" id="brandCar"
                        style="display: flex;    justify-content: space-around;">
                        <!-- brand 
                     -->
                    </div>
                </div>
            </div>
         
            <div class="col-12 mt-2" id="status-show">
            <form action="search-car.php" method="post">
                <div class="card card-search" style="border-radius: 10px;border: none;">
                    <h2 class="heading-line" style="margin-top: 12px; font-size: 27px; ">ค้นหารถ</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="Prize" class="form-control form-control-lg input-style dropdown-toggle">
                                        <option value="">เลือกราคา</option>
                                        <option value="100000">100,000</option>
                                        <option value="200000">200,000</option>
                                        <option value="300000">300,000</option>
                                        <option value="400000">400,000</option>
                                        <option value="500000">500,000</option>
                                        <option value="600000">600,000</option>
                                        <option value="700000">700,000</option>
                                        <option value="800000">800,000</option>
                                        <option value="900000">900,000</option>
                                        <option value="1000000">1,000,000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="BrandOfCar" class="form-control form-control-lg input-style">
                                        <option value="">ยี่ห้อ/แบรนด์</option>
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
                            <div class="col-4">
                                <div class="form-group">
                                    <select class="form-control form-control-lg input-style" name="Model">
                                        <option value="">รุ่น</option>
                                        <?php foreach($result1 as $results2){?>
    <option value="<?php echo $results2["Model"];?>">
      <?php echo $results2["Model"]; ?>
      </option>
    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select class="form-control form-control-lg input-style" name="year_car" >
                                        <option value="">ปี</option>
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
                            <div class="col-4">
                                <div class="form-group">
                                <select class="form-control form-control-lg input-style" name="Color" >
                                        <option value="">สี</option>
                                        <option value="ดำ">ดำ</option>
                                        <option value="แดง">แดง</option>
                                        <option value="เทา">เทา</option>
                                        <option value="ขาว">ขาว</option>
                                        <option value="ขาวมุก">ขาวมุก</option>
                                        <option value="ส้ม">ส้ม</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select class="form-control form-control-lg input-style" name="GearSystem" >
                                        <option value="">ระบบเกียร์</option>
                                        <option value="อัตโนมัติ">เกียร์อัตโนมัติ</option>
                                        <option value="ธรรมดา">เกียร์ธรรมดา</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="type" class="form-control form-control-lg input-style">
                                        <option value="">ประเภทรถ</option>
    <?php foreach($result as $results){?>
    <option value="<?php echo $results["Cartype_Name"];?>">
      <?php echo $results["Cartype_Name"]; ?>
      </option>
    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                              
                            </div>
                            <div class="col-4">
                               
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3 mb-3">
                            <button type="submit" name="save" class="btn" 
                                style="cursor: pointer; background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);">
                                <b style="color: #fff;font-size: 17px;" class="mr-5 ml-5">ค้นหารถ</b>
                            </button>
                            <button type="button" class="btn "
                                style="  background-color: #c3c3c7;cursor: pointer;color: #565656;">
                                <b style="font-size: 17px;" class="mr-5 ml-5">ล้างข้อมูล</b></button>
                        </div>

                    </div>
                </div>
                </form>
            </div>


            <div class="col">
                <br>
                <br>
                <div class="position-row"
                    style="display: flex; align-content: flex-start; align-items: flex-end; justify-content: space-between;">
                    <h3 style="color: #633991;font-size:32px;font-weight: bold;">รถมือสอง</h3>
                    <div style="display: flex;">
                        <label for="price" class="col-form-label text-right" style="padding-right: 12px;">
                            <h3 style="color: #633991;font-size: 20px;font-weight: bold;">ตามราคา</h3>
                        </label>
                        <div class="">
                            <select class="form-control  input-style" onchange="orderData(this.value)" id="selectOrder"
                                style="border: 1.6px solid #f58d4e; border-radius: 10px !important; background-color: #ffffff;">
                                <option value="low"> ราคาต่ำสุด-สูงสุด &nbsp;&nbsp;&nbsp;</option>
                                <option value="high">ราคาสูงสุด-ต่ำสุด &nbsp;&nbsp;&nbsp;</option>
                            </select>
                            <span class="ti-arrow-circle-down" id="closed"
                                style="position: absolute;top: 59px;right: 22px;color: #f58d4e;cursor: pointer;"></span>
                            <span class="ti-arrow-circle-up" id="open"
                                style="position: absolute;top: 59px;right: 22px;color: #f58d4e;cursor: pointer;"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                <?php
                 if(!$data)
                 {
                 }
                 else{
                    foreach($data as $key=>$row)
                    {
                        ?>
      <div class="col-12 col-sm-6 col-md-3 col-xs-3 mt-2" >
                            <div class="card card-car mt-3 card-hover" >
                              <a href="car-detail.php?id=<?php echo $row['id']; ?>" > <img class="card-img-top" src="uploads/<?php echo $row['file_name']; ?>" alt="Card image cap"  ></a> 
                              
                                <div class="card-body" >
                                    <div style="display: flex;justify-content: space-between;font-size: 25px;">
                                        <b style="color:rgb(41, 61, 147)">รถปี <?php echo $row['year_car']; ?></b><b style="color: #ff7724;">
                                        ฿<?php
$number = $row['Prize']; 
setlocale(LC_MONETARY,"en_US");
echo  number_format($number); ;
?> </b>
                                    </div>
                                    <b class="font-header-card" stype="color: #343434;"><?php echo $row['Model']; ?></b>
                                    <p class="card-text mt-2"> <span class="ti-dashboard mr-2"></span><span class="mr-2"><?php echo $row['NumberOfMile']; ?>
                                            กม.</span>
                                        <span class="ti-plug mr-1"></span><span class="mr-2">เกียร์<?php echo $row['GearSystem']; ?></span>
                                        <span class="ti-car mr-1"></span><span>เครื่องยนต์<?php echo $row['Engine']; ?></span>
                                    </p>
                                    <p class="card-text" style="margin-top: -8px;">
                                        <span class="ti-location-pin mr-1"></span>
                                        <span>กรุงเทพมหานคร</span>
                                    </p>
                                
                                </div>
                                <div class="card-body" style="padding-top: 0px;">
                                <div
                                        style="display: flex;justify-content: space-around;flex-direction: row-reverse;align-items: baseline;">
                                        <button type="button" id="modalLine${i}"
                                            class="btn  btn-lg  btn-outline-success btn-block padding-button-contract"
                                            style="margin-left: 3px;cursor: pointer;">
                                            <img src="images/icons8-line.svg" class="img-fluid icon-width"
                                                alt="logo"><b>ติดต่อไลน์</b></button>
                                        <button type="button"  id="modal${i}"
                                            class="btn  btn-outline-info btn-lg  btn-lg btn-block padding-button-contract"
                                            style="margin-right: 3px;cursor: pointer;">
                                            <img src="images/icons8-phone-48.png" class="img-fluid icon-width" alt="logo">
                                            <b>เบอร์ติดต่อ</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                     
                 }
                ?>

        
       
    </div>



    <div class="section bg-gradient mt-5">
        <div class="container">
            <div class="call-to-action">
                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>ดาวน์โหลด CAR-DEE</h2>
                <p class="tagline" style=" color: #FFF !important;">ดาวน์โหลด CAR-DEE ได้แล้ววันนี้ทั้ง Google
                    Pay และ App Store รองรับทุกแพลตฟอร์มทั้งระบบ Android และ IOS
                    เพื่อทำการซื้อขายได้สะดวกมากยิ่งขึ้นขึ้น
                </p>
                <div class="my-4">
                    <a href="#" class="btn btn-light" style="border-radius: 7px;"><img src="images/appleicon.png"
                            alt="icon"> App
                        Store</a>
                    <a href="#" class="btn btn-light" style="border-radius: 7px;"><img src="images/playicon.png"
                            alt="icon">
                        Google play</a>
                </div>
                <p style=" color: #FFF !important;"><small><i>*รองรับ iOS และ Android ทุกเวอร์ชั่น</i></small></p>
            </div>
        </div>

    </div>
    <div class="light-bg py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 126/1 ถนน วิภาวดีรังสิต แขวง รัชดาภิเษก
                        เขตดินแดง กรุงเทพมหานคร 10400
                        USA
                    </p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4"
                                href="mailto:support@mobileapp.com">SI232@live4.utcc.ac.th</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">02-2222-222</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="my-5 text-center">
        <p class="mb-2"><small>Copyright © 2020 CAR-DEE.com สงวนลิขสิทธิ์</small></p>
    </footer>


    <!-- modal -->

    <div class="modal fade" id="modalContactPhone" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"
                    style="display: flex; justify-content: flex-start; flex-direction: row; align-content: center; align-items: center;">
                    <img src="images/icons8-phone-48.png" class="img-fluid icon-width" alt="logo">
                    <h4 class="modal-title" style="font-size: 24px; margin-left: 13px;">เบอร์โทรศัพท์ผู้ขาย</h4>
                </div>
                <div class="modal-body" style="    display: flex;">
                    <b id="phoneContact" class="mr-2" style="font-size: 20px; color: #6a6a6a;"></b>
                    <button onclick="copyTextPhone()" type="button" class="btn " id="buttonCopy"
                        style="padding-top: 4px; padding-right: 11px; padding-bottom: 4px; padding-left: 11px; margin-left: 4px;cursor: pointer;">
                        <b id="copyText">คัดลอก</b> </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="cursor: pointer;"><b
                            style="color: #666464; font-size: 15px;">ปิด</b></button>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="modalContactLine" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"
                    style="display: flex; justify-content: flex-start; flex-direction: row; align-content: center; align-items: center;">
                    <img src="images/icons8-line.svg" class="img-fluid icon-width" alt="logo">
                    <h4 class="modal-title" style="font-size: 24px; margin-left: 13px;">ติดต่อไลน์ผู้ขาย</h4>
                </div>
                <div class="modal-body">
                    <b id="lineContact" class="mr-2" style="font-size: 20px; color: #6a6a6a;">
                    </b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="cursor: pointer;"><b
                            style="color: #666464; font-size: 15px;">ปิด</b></button>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        function goToCarDetail() {
            window.location.href = 'car-detail.html';
        }

        function copyTextPhone() {
            const cb = navigator.clipboard;
            const paragraph = document.querySelector('#phoneContact');
            cb.writeText(paragraph.innerText.split(":")[1].split("-").join('')).then(() => {
                const b = document.querySelector('#copyText');
                b.innerHTML = '<span class="ti-check"></span>' + " คัดลอกแล้ว"
                var element = document.getElementById("buttonCopy");
                element.classList.add("btn-info");
                element.classList.remove("btn-outline-info");
            });
        }


        const brandCar = [
            {
                name: "Toyota",
                image: "images/toyota-color-icon.svg",
            },
            {
                name: "Honda",
                image: "images/honda-color-icon.svg",
            },
            {
                name: "Mazda",
                image: "images/mazda-color-icon-v2.webp",
                sizeImage: "max-width: 39px"
            },
            {
                name: "Mercedes Benz",
                image: "images/mercedes-benz-color-icon.svg",
            },
            {
                name: "BMW",
                image: "images/bmw.svg",
                sizeImage: "max-width: 35px"
            },
            {
                name: "Nissan",
                image: "images/nissan-color-icon.svg",
            },
            {
                name: "Mitsubishi",
                image: "images/mitsubishi-color-icon.svg",
            },
            {
                name: "Suzuki",
                image: "images/suzuki-color-icon.svg",
            },
            {
                name: "MG",
                image: "images/mg-color-icon.svg",
            },
            {
                name: "Subaru",
                image: "images/subaru-color-icon.svg",
            },
            {
                name: "Chevrolet",
                image: "images/chevrolet-color-icon.svg",
            },
            {
                name: "Haval",
                image: "images/haval.png",
                sizeImage: "max-width: 83px"
            },
            {
                name: "Hyundai",
                image: "images/hyundai.svg",
                sizeImage: "max-width: 50px"
            },


        ]

        const brandCarInnerHTML = document.getElementById("brandCar");
        brandCarInnerHTML.innerHTML = brandCar
            .map(({ name, image, sizeImage }, i) => `
           
            <div class="search-item">
                <div class="img-wrapper">
                    <img class="item-img imge-size" src="${image}" style="${sizeImage}">
                </div>
                <div class="item-title">${name}</div>
            </div>
   
            `).join("");

        function convertMoney(money) {
            return (Number(money)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,').split(".")[0];

        }

        document.getElementById('open').style.display = 'none'
        var open = false;
        function isOpen() {
            if (open)
                return "open";
            else
                return "closed";
        }
        $("#selectOrder").on("click", function () {
            open = !open;
            if (isOpen() == "open") {
                document.getElementById('closed').style.display = 'none'
                document.getElementById('open').style.display = 'initial'
            } else {
                document.getElementById('closed').style.display = 'initial'
                document.getElementById('open').style.display = 'none'
            }
        });
        $("#selectOrder").on("blur", function () {
            if (open) {
                open = !open;
                if (isOpen() == "open") {
                    document.getElementById('closed').style.display = 'none'
                    document.getElementById('open').style.display = 'initial'
                } else {
                    document.getElementById('closed').style.display = 'initial'
                    document.getElementById('open').style.display = 'none'
                }
            }
        });




    </script>
</body>

<style>
    @font-face {
        font-family: "Prompt";
        src: url("fonts/Prompt-Regular.ttf"), url("fonts/Prompt-Medium.ttf"),
            url("fonts/Prompt-SemiBold.ttf");
    }
    .test,
    .search-item :hover {
        cursor: pointer;
        color: #ff7724 !important;
        font-size: 15.5px;
        padding: 1px;
        font-weight: bold;
    }

    .item-title {
        color: rgb(161, 161, 161);
        font-size: 14px;
        line-height: 140%;
    }

    .search-item {
        cursor: pointer;
        margin-right: 55px;
    }

    .search-item .img-wrapper {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        min-height: 30px;
        margin-bottom: 10px;
    }


    .new {
        display: initial !important;
    }

    .old {
        display: none !important;
    }

    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
    }

    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 5px solid #2980b9;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .input-style {
        cursor: pointer;
        border-radius: 12px;
        width: 100%;
        border: none;
        background: #efefef;
        -webkit-box-shadow: inset 0 -1px 0 #ebebeb;
        box-shadow: inset 0 -1px 0 #ebebeb;
        padding: 0 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
    }

    input[type=radio] {
        width: 20px;
        height: 20px;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 11px 0;
        background: linear-gradient(129.87deg, rgb(255, 166, 28) 19.83%, rgb(255, 100, 0) 72.83%);
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center;
        font-family: "Prompt", sans-serif !important;
    }

    /* top left*/
    .ribbon-top-left {
        top: -10px;
        left: -10px;
    }

    .ribbon-top-left::before,
    .ribbon-top-left::after {
        border-top-color: transparent;
        border-left-color: transparent;
    }

    .ribbon-top-left::before {
        top: 0;
        right: 0;
    }

    .ribbon-top-left::after {
        bottom: 0;
        left: 0;
    }

    .ribbon-top-left span {
        right: -25px;
        top: 30px;
        transform: rotate(-45deg);
    }


    * {
        font-family: "Prompt", sans-serif;
    }

    .icon-width {
        width: 37px;
    }

    .padding-button-contract {
        padding-bottom: 3px;
        padding-top: 3px
    }

    div.vertical-line {
        width: 1px;
        background-color: black;
        height: 100%;
        float: left;

    }

    .font-header-card {
        font-size: 20px;
    }

    .sapn-h {
        font-family: "Prompt", sans-serif;
    }

    .font-menu {
        font-size: 17.5px !important;
    }

    .card-car {
        border-radius: 13px;
        box-shadow: rgb(176 189 255 / 40%) 0px 0px 16px 0px;
        grid-template-columns: minmax(25%, 264px) 1fr 25%;
        border: none;

    }




    .size-container {
        margin-left: 8%;
        margin-right: 8%;
        margin-top: 23px;
    }

    .card-search {
        -webkit-box-shadow: 0 4px 10px rgb(0 0 0 / 15%);
        box-shadow: 0 4px 10px rgb(0 0 0 / 15%);
    }

    .heading-line {
        padding-left: 20px;
        padding-top: 10px;
        font-size: 22px;
        font-weight: bold;
        line-height: 26px;
        color: #00174d;
        position: relative;
        margin: 0;
        margin-bottom: 16px;
        padding-bottom: 8px;
    }

    .heading-line:before {
        border-bottom: 1px solid #d36f40;
        bottom: 0;
        left: 20;
        content: "";
        position: absolute;
        width: 50px;
        border-width: 5px;
        border-radius: 999px;
    }



    .span-h-2 {
        display: block;
        text-align: center;
        background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);
        border-radius: 3px 3px 0px 0px;
        padding: 8px;
    }

    .span-h-1 {
        color: rgb(255, 255, 255);
        font-size: 17px;
        font-weight: bold;
        line-height: 22px;
        padding-top: 9px;
        padding-bottom: 9px;
    }

    .card-hover {
        transition: all 0.25s ease-in;
        cursor: pointer;
    }

    .card-hover:hover {
        cursor: pointer;
        transform: translateY(-5px);
    }

    .nav-menu {
        padding: 0rem 0;
        transition: all 0.3s ease;
    }

    .nav-menu.color-back {
        background-color: rgb(74, 13, 143);
        background: -moz-linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);
        background: -webkit-linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);
        background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);
        -webkit-box-shadow: 0px 5px 23px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 5px 23px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 23px 0px rgba(0, 0, 0, 0.1);
    }
</style>

</html>