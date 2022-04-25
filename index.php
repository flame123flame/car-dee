
<?php
include 'upload.php';
$searchErr = '';
$data='';

$stmt = $con->prepare("SELECT * FROM Post JOIN Car on Post.id = Car.ID_Post JOIN image on Car.id = image.id_car GROUP by Car.id");
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


<!doctype html>
<html lang="en">

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
    <script src="https://requirejs.org/docs/release/2.3.6/minified/require.js" type="text/javascript"></script>

</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
    <div class="nav-menu nav-menu fixed-top">
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
                            <li class="nav-item"> <a class="nav-link active" href="#home"><b
                                        class="font-menu">หน้าหลัก</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#search_car"><b
                                        class="font-menu">สำหรับคุณ</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#gallery"><b
                                        class="font-menu">ขายรถกับเรา</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#calculate"><b
                                        class="font-menu">คำนวณค่างวดเบื้องต้น</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#contact"><b
                                        class="font-menu">เกี่ยวกับเรา</b> </a> </li>
                            <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" href="search-car.php"><b
                                        class="font-menu">ค้นหารถมือสอง</b></a> </li>
                            <li class="nav-item">
                                <a href="login.php"  style="color: #fff; border: 2px solid #fff; border-radius: 8px;"
                                    class="btn button-active-re my-3 my-sm-0 ml-lg-3">
                                    <b style="font-size: 17.5px;"> ลงทะเบียนขายรถ / เข้าสู่ระบบ</b></a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1 style="font-weight: bold;color: #fff;">ซื้อขายรถกับเรา CAR-DEE</h1>
            <p class="tagline" style="color: #efefef;"> แพลตฟอร์มซื้อขายรถยนต์อันดับ 1 ของไทย
                ตอบโจทย์ทุกไลสโตล์ ทั้งซื้อและขาย <br>มีครบให้จบในที่เดียว </p>
        </div>
        <div class="img-holder mt-3">
            <img src="images/mycar.png" alt="phone" class="img-fluid" style="width: 68% !important;margin-top: 45px;">
        </div>
    </header>

    <div class="client-logos my-5" id="search_car"
        style="margin-top: 2.5rem!important;    margin-bottom: 2rem!important;">
        <div class="container text-center" id="brandCar" style="display: flex;    justify-content: space-around;">
            <!-- brand 
             -->
        </div>
    </div>
    <hr>
    <div class="size-container">
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
    </div>
                

            <div class="row mt-4 mb-3">
                <div class="col text-center">
                    <button onclick="goToSearch()" type="button" class="btn btn-info"
                        style=" background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer;">
                        <b style="font-size: 17px;">ดูรถทั้งหมด</b></button>
                </div>
            </div>
        </div>
    </div>
    </div>



    <div class="section light-bg" id="gallery">
        <div class="section-title">
            <h3 style="color: #633991; font-size: 38px; font-weight: bold;">ขายรถกับเราง่ายๆ เพียงมีมือถือเครื่องเดียว
            </h3>
        </div>
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps" id="stepSell">
                        <!-- stepSell -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="images/iphonex.png" alt="iphone" class="img-fluid border-r-2">
                </div>
                <div class="col-4">
                    <button type="button" onclick="goToRegister()" class="btn  btn-lg  btn-block hover-register "
                        style=" background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer !important;">
                        <b style="color: #fff;cursor: pointer !important;">กดที่นี่เพื่อลงทะเบียนกับเรา <span
                                class="ti-hand-point-right  ti-2x mr-3" style="position: absolute;
                                right: 34px;
                                top: 8px;
                                color: #fff !important;"></span></b>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="calculate">
        <div class="container">
            <div class="section-title">
                <h3 style="color: #633991; font-size: 38px; font-weight: bold;">ทดลองคำนวณค่างวดรถของคุณได้ง่ายๆ
                    ผ่านเว็บเรา</h3>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#percent">เงินดาวน์ (%)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bath">เงินดาวน์ (บาท)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="percent">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label>ราคารถ (บาท)</label>
                                        <input type="text" id="price1" name="price1"
                                            class="form-control form-control-lg CurrencyInput"
                                            onclick="clickInputPrice1()" value=""
                                            style="margin-top: -7px;    background-color: #fdfdfd;">
                                        <div class="invalid-feedback">
                                            กรุณากรอกเฉพาะตัวเลขเท่านั้น
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>จำนวนเงินดาวน์ (%)</label>
                                        <input type="text" id="downPayment1" onclick="clickInputDownPayment1()"
                                            name="downPayment1"
                                            class="form-control form-control-lg CurrencyInputDownPayment1"
                                            placeholder="" style="margin-top: -7px; background-color: #fdfdfd;">
                                        <div class="invalid-feedback">
                                            กรุณากรอกเฉพาะตัวเลขไม่เกิน 100 เท่านั้น
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>จำนวนปีที่ผ่อน</label>
                                        <select class="form-control form-control-lg" id="mounth1" name="mounth1"
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                            <option value="12">12 งวด (1 ปี)</option>
                                            <option value="24">24 งวด (2 ปี)</option>
                                            <option value="36">36 งวด (3 ปี)</option>
                                            <option value="48">48 งวด (4 ปี)</option>
                                            <option value="60">60 งวด (5 ปี)</option>
                                            <option value="72">72 งวด (6 ปี)</option>
                                            <option value="84">84 งวด (7 ปี)</option>
                                            <option value="96">96 งวด (8 ปี)</option>
                                            <option value="108">108 งวด (9 ปี)</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>ดอกเบี้ย (%) ต่อปี</label>
                                        <input type="text" class="form-control form-control-lg" id="percent1"
                                            name="percent2" value="2.79" placeholder=""
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>ภาษี 7%</label>
                                        <select class="form-control form-control-lg" id="vat1" name="vat1"
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                            <option value="novat">ไม่รวมภาษี</option>
                                            <option value="vat">รวมภาษี</option>
                                        </select>
                                    </div>
                                    <p class="text-gray-400 text-xs " style="font-size: 16px;">** โปรแกรมคำนวณนี้
                                        ใช้เพื่อเป็นข้อมูลประกอบการตัดสินใจเบื้องต้นเท่านั้น
                                        ไม่สามารถนำมาเป็นหลักฐานอ้างอิงได้ **</p>
                                </div>
                                <div class="col">
                                    <table class="table table-bordered  mt-4">
                                        <thead
                                            style=" background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer;"">
                                        <tr>
                                            <th class=" text-center"
                                            style="padding-top: 14px;padding-bottom: 14px;color: #fff; font-size: 21px;">
                                            สรุป</th>
                                            <th class="text-center"
                                                style="padding-top: 14px;padding-bottom: 14px;color: #fff; font-size: 21px;">
                                                ผลการคำนวณ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-right">ราคารถ </td>
                                                <th class="text-right" id="priceDisplay1" name="priceDisplay1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ดาวน์ (บาท)</td>
                                                <th class="text-right" id="down1" name="down1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ยอดจัดไฟแนนซ์</td>
                                                <th class="text-right" id="finance1" name="finance1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ผ่อน(งวด)</td>
                                                <th class="text-right" id="mounthDisply1" name="mounthDisply1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">จ่ายงวดละ</td>
                                                <th class="text-right" id="pricemount1" name="pricemount1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ดอกเบี้ยทั้งหมด</td>
                                                <th class="text-right" id="sumdebt1" name="sumdebt1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ภาษี 7%</td>
                                                <th class="text-right" id="vatDisplay1" name="vatDisplay1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">รวมค่าใช้จ่ายทั้งหมด</td>
                                                <th class="text-right" id="totalNoVat1" name="totalNoVat1"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="button" onclick="calculate1()" class="btn btn-info"
                                        style=" background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer;">
                                        <b style="font-size: 17px;" class="mr-5 ml-5">คำนวณ</b></button>
                                    <button onclick="resetDate1()" type="button" class="btn "
                                        style="  background-color: #f7f7f9;cursor: pointer;">
                                        <b style="font-size: 17px;" class="mr-5 ml-5">ล้างข้อมูล</b></button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="bath">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label>ราคารถ (บาท)</label>
                                        <input type="text" id="price2" name="price2"
                                            class="form-control form-control-lg CurrencyInput"
                                            onclick="clickInputPrice2()"
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                        <div class="invalid-feedback">
                                            กรุณากรอกเฉพาะตัวเลขเท่านั้น
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>จำนวนเงินดาวน์ (บาท)</label>
                                        <input type="text" id="downPayment2" name="downPayment2"
                                            class="form-control form-control-lg" placeholder=""
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>จำนวนปีที่ผ่อน</label>
                                        <select class="form-control form-control-lg" id="mounth2" name="mounth2"
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                            <option value="12">12 งวด (1 ปี)</option>
                                            <option value="24">24 งวด (2 ปี)</option>
                                            <option value="36">36 งวด (3 ปี)</option>
                                            <option value="48">48 งวด (4 ปี)</option>
                                            <option value="60">60 งวด (5 ปี)</option>
                                            <option value="72">72 งวด (6 ปี)</option>
                                            <option value="84">84 งวด (7 ปี)</option>
                                            <option value="96">96 งวด (8 ปี)</option>
                                            <option value="108">108 งวด (9 ปี)</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>ดอกเบี้ย (%) ต่อปี</label>
                                        <input type="text" class="form-control form-control-lg" id="percent2"
                                            name="percent2" value="2.79" placeholder=""
                                            style="margin-top: -7px;background-color: #fdfdfd;">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>ภาษี 7%</label>
                                        <select class="form-control form-control-lg" id="vat2" name="vat2"
                                            style="margin-top: -7px;background-color: #fdfdfd">
                                            <option value="novat">ไม่รวมภาษี</option>
                                            <option value="vat">รวมภาษี</option>
                                        </select>
                                    </div>
                                    <p class="text-gray-400 text-xs " style="font-size: 13px;">** โปรแกรมคำนวณนี้
                                        ใช้เพื่อเป็นข้อมูลประกอบการตัดสินใจเบื้องต้นเท่านั้น
                                        ไม่สามารถนำมาเป็นหลักฐานอ้างอิงได้ **</p>
                                </div>
                                <div class="col">
                                    <table class="table table-bordered  mt-4">
                                        <thead
                                            style=" background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer;"">
                                        <tr>
                                            <th class=" text-center"
                                            style="padding-top: 14px;padding-bottom: 14px;color: #fff; font-size: 21px;">
                                            สรุป</th>
                                            <th class="text-center"
                                                style="padding-top: 14px;padding-bottom: 14px;color: #fff; font-size: 21px;">
                                                ผลการคำนวณ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-right">ราคารถ </td>
                                                <th class="text-right" id="priceDisplay2" name="priceDisplay2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ดาวน์ (บาท)</td>
                                                <th class="text-right" id="down2" name="down2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ยอดจัดไฟแนนซ์</td>
                                                <th class="text-right" id="finance2" name="finance2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ผ่อน(งวด)</td>
                                                <th class="text-right" id="mounthDisply2" name="mounthDisply2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">จ่ายงวดละ</td>
                                                <th class="text-right" id="pricemount2" name="pricemount2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ดอกเบี้ยทั้งหมด</td>
                                                <th class="text-right" id="sumdebt2" name="sumdebt2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">ภาษี 7%</td>
                                                <th class="text-right" id="vatDisplay" name="vatDisplay"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <td class="text-right">รวมค่าใช้จ่ายทั้งหมด</td>
                                                <th class="text-right" id="totalNoVat2" name="totalNoVat2"
                                                    style="color:rgb(41, 61, 147);font-size: 18px;">0.00</th>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="button" onclick="calculate2()" class="btn btn-info"
                                        style=" background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer;">
                                        <b style="font-size: 17px;" class="mr-5 ml-5">คำนวณ</b></button>
                                    <button onclick="resetDate2()" type="button" class="btn "
                                        style="  background-color: #f7f7f9;cursor: pointer;">
                                        <b style="font-size: 17px;" class="mr-5 ml-5">ล้างข้อมูล</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section light-bg" id="contact">
        <div class="container">

            <div class="section-title">
                <h3 style="color: #633991; font-size: 38px; font-weight: bold;">ทำไมต้องซื้อรถกับ CAR-DEE</h3>
            </div>
            <div class="row" id="about">
                <!-- about -->
            </div>

        </div>
    </div>
    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>ดาวน์โหลด CAR-DEE</h2>
                <p class="tagline" style=" color: #FFF !important;">ดาวน์โหลด CAR-DEE ได้แล้ววันนี้ทั้ง Google
                    Pay และ App Store รองรับทุกแพลตฟอร์มทั้งระบบ Android และ IOS
                    เพื่อทำการซื้อ-ขายได้สะดวกมากยิ่งขึ้นขึ้น
                </p>
                <div class="my-4">
                    <a href="#" class="btn btn-light" style="border-radius: 7px;"><img src="images/appleicon.png"
                            alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light" style="border-radius: 7px;"><img src="images/playicon.png"
                            alt="icon"> Google play</a>
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
                    <button type="button" onclick="copyTextPhone()" id="buttonCopy" class="btn "
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


        something()
        function something() {
            var url_string = window.location.pathname + window.location.search
            var active = url_string.split("=")
            if (active[1] == "contact") {
                location.href = "#contact";
            } else if (active[1] == "calculate") {
                location.href = "#calculate";
            } else if (active[1] == "gallery") {
                location.href = "#gallery";
            } else if (active[1] == "search_car") {
                location.href = "#search_car";
            } else if (active[1] == "home") {
                location.href = "#home";
            }
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

        const stepSell = [
            {
                header: "ลงทะเบียนเป็นสมาชิกกับเรา",
                description: "ลงทะเบียนกับเราง่ายๆ เพียงกรอกข้อมูลส่วนตัวพร้อมภาพถ่ายบัตรประชาชนเพื่อยืนยันตัวตนในเว็บไซต์ของเรา",
            },
            {
                header: "ดำเนินตรวจสอบเอกสารยืนยันตัวตนของคุณ",
                description: "เจ้าหน้าจะทำการตรวจสอบเอกสารของคุณ ด่วนทันใจ รู้ผลทันทีภายใน 30 นาที",
            },
            {
                header: "ขายรถของคุณผ่านเว็บไซต์ของเรา",
                description: "ทำการขายรถของท่ายโดยใส่รายละเอียดของท่านมาในเว็บไซต์เราได้เลย",
            },
        ]
        const stepSellInnerHTML = document.getElementById("stepSell");
        stepSellInnerHTML.innerHTML = stepSell
            .map(({ header, description }, i) => `
            <li class="media">
                            <div class="circle-icon mr-4">${i + 1}</div>
                            <div class="media-body">
                                <h5>${header}</h5>
                                <p>${description}</p>
                            </div>
                        </li>
            `).join("");

        const about = [
            {
                icon: "ti-car",
                header: "ทุกคันผ่านการตรวจสภาพ",
                description: "รถทุกคันผ่านการตรวจสภาพ รับรองว่าไม่มีอุบัติเหตุถึงโครงสร้าง ตัวรถ ไฟไหม้ น้ำท่วม",
            },
            {
                icon: "ti-truck",
                header: "ส่งตรงถึงหน้าบ้าน",
                description: "ไม่เสียเวลาและปลอดภัยด้วยบริการส่งฟรีทั่วประเทศถึงหน้าบ้านรวมถึงการทดลองขับ",
            },
            {
                icon: "ti-headphone-alt",
                header: "ช่วยเหลือฉุกเฉิน 24 ชม.",
                description: "เรามีบริการช่วยเหลือฉุกเฉิน 24 ชั่วโมง สำหรับลูกค้าที่ซื้อรถยนต์มือสองกับเรา CAR-DEE",
            },
        ]

        const aboutInnerHTML = document.getElementById("about");
        aboutInnerHTML.innerHTML = about
            .map(({ icon, header, description }, i) => `
            <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="${icon} gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">${header}</h4>
                                    <p class="card-text">${description}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `).join("");



        const dataCar = [
            {
                name: "Bmw series 5",
                image: "images/car2/1.jpg",
                year: "2019",
                price: 235345,
                engine: "เบนซิน",
                engineSize: "2.0",
                gear: "อัตโนมัติ",
                phoneContact: "0222222222",
                lineContact: "@line37802",
                lineImage: "images/line.jpg",
                location: "กรุงเทพมหานคร",
                miles: "28,980",
                isNew: "old"
            },
            {
                name: "Ford ranger 2.2 xlt",
                image: "images/car2/2.jpg",
                year: "2017",
                price: 536543,
                engine: "ดีเซล",
                engineSize: "2.2",
                gear: "ธรรมดา",
                phoneContact: "0630369172",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "12,980",
                isNew: "new"
            },
            {

                name: "Ford mustang 5.0",
                image: "images/car2/3.jpg",
                year: "2017",
                price: 2335534,
                engine: "เบนซิน",
                engineSize: "5.0",
                gear: "อัตโนมัติ",
                phoneContact: "0893423424",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "old"
            },
            {

                name: "Honda Civic 1.8 E",
                image: "images/car2/4.jpg",
                year: "2017",
                price: 534253,
                engine: "เบนซิน",
                engineSize: "1.8",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "new"
            },
            {

                name: "Honda Civic 1.5 RS ",
                image: "images/car2/5.jpg",
                year: "2017",
                price: 254235,
                engine: "เบนซิน",
                engineSize: "1.5",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "old"
            },
            {

                name: "Isuzu D-max 2.5",
                image: "images/car2/6.jpg",
                year: "2017",
                price: 563455,
                engine: "ดีเซล",
                engineSize: "2.5",
                gear: "ธรรมดา",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "old"
            },
            {
                name: "Bmw series 5",
                image: "images/car2/1.jpg",
                year: "2019",
                price: 950000,
                engine: "เบนซิน",
                engineSize: "2.0",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "28,980",
                isNew: "old"
            },
            {
                name: "Ford ranger 2.2 xlt",
                image: "images/car2/2.jpg",
                year: "2017",
                price: 694534,
                engine: "ดีเซล",
                engineSize: "2.2",
                gear: "ธรรมดา",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "12,980",
                isNew: "new"
            },
            {
                name: "Bmw series 5",
                image: "images/car2/1.jpg",
                year: "2019",
                price: 435431,
                engine: "เบนซิน",
                engineSize: "2.0",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "28,980",
                isNew: "old"
            },
            {
                name: "Ford ranger 2.2 xlt",
                image: "images/car2/2.jpg",
                year: "2017",
                price: 545312,
                engine: "ดีเซล",
                engineSize: "2.2",
                gear: "ธรรมดา",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "12,980",
                isNew: "new"
            },
            {

                name: "Ford mustang 5.0",
                image: "images/car2/3.jpg",
                year: "2017",
                price: 1342545,
                engine: "เบนซิน",
                engineSize: "5.0",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "old"
            },
            {

                name: "Honda Civic 1.8 E",
                image: "images/car2/4.jpg",
                year: "2017",
                price: 984032,
                engine: "เบนซิน",
                engineSize: "1.8",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "new"
            },
            {

                name: "Honda Civic 1.5 RS ",
                image: "images/car2/5.jpg",
                year: "2017",
                price: 395940,
                engine: "เบนซิน",
                engineSize: "1.5",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "old"
            },
            {

                name: "Isuzu D-max 2.5",
                image: "images/car2/6.jpg",
                year: "2017",
                price: 748244,
                engine: "ดีเซล",
                engineSize: "2.5",
                gear: "ธรรมดา",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "89,382",
                isNew: "old"
            },
            {
                name: "Bmw series 5",
                image: "images/car2/1.jpg",
                year: "2019",
                price: 384204,
                engine: "เบนซิน",
                engineSize: "2.0",
                gear: "อัตโนมัติ",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "28,980",
                isNew: "old"
            },
            {
                name: "Ford ranger 2.2 xlt",
                image: "images/car2/2.jpg",
                year: "2017",
                price: 134534,
                engine: "ดีเซล",
                engineSize: "2.2",
                gear: "ธรรมดา",
                phoneContact: "0982139552",
                lineImage: "images/line.jpg",
                lineContact: "@line",
                location: "กรุงเทพมหานคร",
                miles: "12,980",
                isNew: "new"
            },

        ]
        const conCardDeck = document.getElementById("conCardDeck");
        conCardDeck.innerHTML = dataCar
            .map(({ name, image, year, price, engine, engineSize, gear, phoneContact, lineContact, location, miles, isNew }, i) => `
                   
                        <div class="col-12 col-sm-6 col-md-3 col-xs-3 mt-2" >
                            <div class="card card-car mt-3 card-hover" >
                                <div class="ribbon ribbon-top-left ${isNew}" id="newCar"><span>รถเข้าใหม่</span></div>
                                <img class="card-img-top" src="${image}" alt="Card image cap"  onclick="goToCarDetail()">
                                <div class="card-body" onclick="goToCarDetail()">
                                    <div style="display: flex;justify-content: space-between;font-size: 25px;">
                                        <b style="color:rgb(41, 61, 147)">รถปี ${year}</b><b style="color: #ff7724;">฿${convertMoneytoFixed0(price)} </b>
                                    </div>
                                    <b class="font-header-card" stype="color: #343434;">${name}</b>
                                    <p class="card-text mt-2"> <span class="ti-dashboard mr-2"></span><span class="mr-2">${miles}
                                            กม.</span>
                                        <span class="ti-plug mr-1"></span><span class="mr-2">เกียร์${gear}</span>
                                        <span class="ti-car mr-1"></span><span>${engine} ${engineSize}</span>
                                    </p>
                                    <p class="card-text" style="margin-top: -8px;">
                                        <span class="ti-location-pin mr-1"></span>
                                        <span>${location}</span>
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
                   `).join("");

        function goToSearch() {
            window.location.href = 'search-car.php';
        }
        function goToCarDetail() {
            window.location.href = 'car-detail.html';
        }
        function goToRegister() {
            window.location.href = 'register.php';
        }


        // modalphone
        for (let i = 0; i < dataCar.length; i++) {
            $('#modal' + i).click(function () {
                openModalContactPhone(dataCar[i].phoneContact)
            });

        }
        function openModalContactPhone(phoneContact) {
            const phoneContactHTML = document.getElementById("phoneContact");
            phoneContactHTML.innerHTML = "เบอร์โทร : " + formatPhoneNumber(phoneContact)
            $("#modalContactPhone").modal();
            const b = document.querySelector('#copyText');
            b.innerHTML = "คัดลอก"
            var element = document.getElementById("buttonCopy");
            element.classList.add("btn-outline-info");

        }

        // modalphone
        for (let i = 0; i < dataCar.length; i++) {
            $('#modalLine' + i).click(function () {
                openModalContactLine(dataCar[i].lineContact)
            });

        }
        function openModalContactLine(lineContact) {
            const lineContactHTML = document.getElementById("lineContact");
            lineContactHTML.innerHTML = "ไอดีไลน์ : " + lineContact
            $("#modalContactLine").modal();

        }
        function convertMoneytoFixed0(money) {
            return (Number(money)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,').split(".")[0];
        }


        function formatPhoneNumber(phoneNumberString) {
            var cleaned = ('' + phoneNumberString).replace(/\D/g, '');
            var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
            if (match) {
                return '' + match[1] + '-' + match[2] + '-' + match[3];
            }
            return null;
        }

        function calculate1() {
            var vat1 = document.getElementById("vat1").value;
            if (vat1 == 'novat') {
                var price1Arr;
                var price1 = document.getElementById("price1").value;
                price1Arr = price1.split(",");
                price1 = price1Arr.join('');
                var downPayment1 = document.getElementById("downPayment1").value.split("%")[0];
                var percent1 = document.getElementById("percent1").value;
                var mounth1 = document.getElementById("mounth1").value;
                let cal = (Number(price1) * Number(downPayment1)) / 100
                var sumdebt = (Number(price1) - cal) * (Number(percent1) / 100) * (Number(mounth1 / 12));
                //display
                var priceDisplay1 = document.getElementById('priceDisplay1');
                priceDisplay1.innerHTML = convertMoney(price1)
                var down1 = document.getElementById('down1');
                down1.innerHTML = downPayment1 + "%"
                var mounthDisply1 = document.getElementById('mounthDisply1');
                mounthDisply1.innerHTML = mounth1;
                var sumdebt1 = document.getElementById('sumdebt1');
                sumdebt1.innerHTML = convertMoney(sumdebt)
                var finance1 = document.getElementById('finance1');
                finance1.innerHTML = convertMoney(Number(price1) - cal)
                var vatDisplay = document.getElementById('vatDisplay');
                vatDisplay.innerHTML = "0.00"
                var totalNoVat1 = document.getElementById('totalNoVat1');
                totalNoVat1.innerHTML = convertMoney((((Number(price1) - cal) + (Number(sumdebt)))) + Number(cal))
                var pricemount1 = document.getElementById('pricemount1');
                pricemount1.innerHTML = convertMoney((((Number(price1) - cal) + (Number(sumdebt)))) / Number(mounth1))

            } else {
                var price1Arr;
                var price1 = document.getElementById("price1").value;
                price1Arr = price1.split(",");
                price1 = price1Arr.join('');
                var downPayment1 = document.getElementById("downPayment1").value;
                var percent1 = document.getElementById("percent1").value;
                var mounth1 = document.getElementById("mounth1").value;
                let cal = (Number(price1) * Number(downPayment1)) / 100
                var sumdebt = (Number(price1) - cal) * (Number(percent1) / 100) * (Number(mounth1 / 12));
                //display
                var priceDisplay1 = document.getElementById('priceDisplay1');
                priceDisplay1.innerHTML = convertMoney(price1)
                var down1 = document.getElementById('down1');
                down1.innerHTML = downPayment1 + "%"
                var mounthDisply1 = document.getElementById('mounthDisply1');
                mounthDisply1.innerHTML = mounth1;
                var sumdebt1 = document.getElementById('sumdebt1');
                sumdebt1.innerHTML = convertMoney(sumdebt)
                var finance1 = document.getElementById('finance2');
                finance1.innerHTML = convertMoney(Number(price1) - cal)
                var pricemount1 = document.getElementById('pricemount1');
                let dataPricemount1 = (((Number(price1) - cal) + (Number(sumdebt)))) / Number(mounth1)
                let dataDown = Number(downPayment1)
                let totalPricemount1 = (dataPricemount1 * 0.07)
                pricemount1.innerHTML = convertMoney((totalPricemount1 + dataPricemount1))
                var totalNoVat1 = document.getElementById('totalNoVat1');
                let dataTotal = ((((Number(price1) - cal) + (Number(sumdebt)))));
                let totalVat1 = (dataTotal * 0.07)
                totalNoVat1.innerHTML = convertMoney((totalVat1 + dataTotal + Number(cal)))
                var vatDisplay1 = document.getElementById('vatDisplay1').value = convertMoney(totalVat1);
                vatDisplay1.innerHTML = convertMoney(totalVat1)
            }

        }

        function calculate2() {
            var vat2 = document.getElementById("vat2").value;
            if (vat2 == 'novat') {
                var price1Arr;
                var price2 = document.getElementById("price2").value;
                price1Arr = price2.split(",");
                price2 = price1Arr.join('');
                var downPayment2 = document.getElementById("downPayment2").value;
                var percent2 = document.getElementById("percent2").value;
                var mounth2 = document.getElementById("mounth2").value;
                var sumdebt = (Number(price2) - Number(downPayment2)) * (Number(percent2) / 100) * (Number(mounth2 / 12));
                //display
                var priceDisplay2 = document.getElementById('priceDisplay2');
                priceDisplay2.innerHTML = convertMoney(price2)
                var down2 = document.getElementById('down2');
                down2.innerHTML = convertMoney(downPayment2)
                var mounthDisply2 = document.getElementById('mounthDisply2');
                mounthDisply2.innerHTML = mounth2;
                var sumdebt2 = document.getElementById('sumdebt2');
                sumdebt2.innerHTML = convertMoney(sumdebt)
                var finance2 = document.getElementById('finance2');
                finance2.innerHTML = convertMoney(Number(price2) - Number(downPayment2))
                var vatDisplay = document.getElementById('vatDisplay');
                vatDisplay.innerHTML = "0.00"
                var totalNoVat2 = document.getElementById('totalNoVat2');
                totalNoVat2.innerHTML = convertMoney((((Number(price2) - Number(downPayment2)) + (Number(sumdebt)))) + Number(downPayment2))
                var pricemount2 = document.getElementById('pricemount2');
                pricemount2.innerHTML = convertMoney((((Number(price2) - Number(downPayment2)) + (Number(sumdebt)))) / Number(mounth2))

            } else {
                var price1Arr;
                var price2 = document.getElementById("price2").value;
                price1Arr = price2.split(",");
                price2 = price1Arr.join('');
                var downPayment2 = document.getElementById("downPayment2").value;
                var percent2 = document.getElementById("percent2").value;
                var mounth2 = document.getElementById("mounth2").value;
                var sumdebt = (Number(price2) - Number(downPayment2)) * (Number(percent2) / 100) * (Number(mounth2 / 12));
                //display
                var priceDisplay2 = document.getElementById('priceDisplay2');
                priceDisplay2.innerHTML = convertMoney(price2)
                var down2 = document.getElementById('down2');
                down2.innerHTML = convertMoney(downPayment2)
                var mounthDisply2 = document.getElementById('mounthDisply2');
                mounthDisply2.innerHTML = mounth2;
                var sumdebt2 = document.getElementById('sumdebt2');
                sumdebt2.innerHTML = convertMoney(sumdebt)
                var finance2 = document.getElementById('finance2');
                finance2.innerHTML = convertMoney(Number(price2) - Number(downPayment2))
                var pricemount2 = document.getElementById('pricemount2');
                let dataPricemount2 = (((Number(price2) - Number(downPayment2)) + (Number(sumdebt)))) / Number(mounth2)
                let dataDown = Number(downPayment2)
                let totalPricemount2 = (dataPricemount2 * 0.07)
                pricemount2.innerHTML = convertMoney((totalPricemount2 + dataPricemount2))
                var totalNoVat2 = document.getElementById('totalNoVat2');
                let dataTotal = ((((Number(price2) - Number(downPayment2)) + (Number(sumdebt)))));
                let totalVat2 = (dataTotal * 0.07)
                totalNoVat2.innerHTML = convertMoney((totalVat2 + dataTotal + Number(downPayment2)))
                var vatDisplay = document.getElementById('vatDisplay');
                vatDisplay.innerHTML = convertMoney(totalVat2)
            }
        }
        function convertMoney(money) {
            return (Number(money)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        function resetDate1() {
            document.getElementById('price1').value = ''
            document.getElementById('downPayment1').value = ''
            document.getElementById('percent1').value = '2.79'
            document.getElementById('mounth1').value = '12'
        }
        function resetDate2() {
            document.getElementById('price2').value = ''
            document.getElementById('downPayment2').value = ''
            document.getElementById('percent2').value = '2.79'
            document.getElementById('mounth2').value = '12'
        }

        $(document).click(function (e) {
            if (document.getElementById("price1").value == "NaN") {
                document.getElementById("price1").value = ""
            }

            if (document.getElementById("price2").value == "NaN") {
                document.getElementById("price2").value = ""
            }
            if (document.getElementById("downPayment1").value == "%") {
                document.getElementById("downPayment1").value = ""
            }
        });

        $('input.CurrencyInput').on('blur', function () {
            const value = this.value.replace(/,/g, '');
            this.value = parseFloat(value).toLocaleString('en-US', {
                style: 'decimal',
                maximumFractionDigits: 2,
                minimumFractionDigits: 2
            });
        });

        $('input.CurrencyInputDownPayment1').on('blur', function () {
            console.log(this.value);
            this.value = this.value + "%"
        });

        let downPayment1 = document.getElementById('downPayment1');
        downPayment1.addEventListener('keyup', (event) => {
            if (isNumeric(event.target.value) && Number(event.target.value) <= 100) {
                downPayment1.classList.remove("is-invalid");
            } else {
                downPayment1.classList.add("is-invalid");
            }
        });

        let textpPrice2 = document.getElementById('price2');
        textpPrice2.addEventListener('keyup', (event) => {
            if (isNumeric(event.target.value)) {
                textpPrice2.classList.remove("is-invalid");
            } else {
                textpPrice2.classList.add("is-invalid");
            }
        });


        let textpPrice1 = document.getElementById('price1');
        textpPrice1.addEventListener('keyup', (event) => {
            if (isNumeric(event.target.value)) {
                textpPrice1.classList.remove("is-invalid");
            } else {
                textpPrice1.classList.add("is-invalid");
            }
        });

        function isNumeric(str) {
            if (typeof str != "string") return false
            return !isNaN(str) && !isNaN(parseFloat(str))
        }

        function clickInputPrice1() {
            var price1 = document.getElementById("price1").value;
            price1Arr = price1.split(",");
            price1 = price1Arr.join('');
            document.getElementById('price1').value = price1.split(".")[0];
        }
        function clickInputPrice2() {
            var price1 = document.getElementById("price2").value;
            price1Arr = price1.split(",");
            price1 = price1Arr.join('');
            document.getElementById('price2').value = price1.split(".")[0];
        }

        function clickInputDownPayment1() {
            var downPayment1 = document.getElementById("downPayment1").value.split("%")[0]
            document.getElementById('downPayment1').value = downPayment1
        }




    </script>
</body>

<style>
    @font-face {
        font-family: "Prompt";
        src: url("fonts/Prompt-Regular.ttf"), url("fonts/Prompt-Medium.ttf"),
            url("fonts/Prompt-SemiBold.ttf");
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

    .hover-register:hover {
        font-size: 17px;
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

    .border-r-1 {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .border-r-2 {
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .search-item {
        margin-right: 55px;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: end;
        justify-content: flex-end;
        flex-direction: column;
        height: 100%;
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

    .item-title {
        color: rgb(161, 161, 161);
        font-size: 14px;
        line-height: 140%;
    }

    .text-b {
        font-size: 20px;
        font-weight: 500;
        line-height: 28px;
        color: #465166;
    }

    .margin-input {
        margin-top: -9px;
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

    .input-style {
        width: 100%;
        border: none;
        border-radius: 5px;
        background: #efefef;
        -webkit-box-shadow: inset 0 -1px 0 #ebebeb;
        box-shadow: inset 0 -1px 0 #ebebeb;
        padding: 0 10px;
    }

    input[type=radio] {
        width: 20px;
        height: 20px;
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
</style>

</html>