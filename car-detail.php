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
    <div class=" nav-menu fixed-top color-back" style="padding: 0 !important;">
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
                                        class="font-menu">????????????????????????</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=search_car">
                                    <b class="font-menu">???????????????????????????</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=gallery"><b
                                        class="font-menu">?????????????????????????????????</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=calculate"><b
                                        class="font-menu">????????????????????????????????????????????????????????????</b></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="index.php?active=contact"><b
                                        class="font-menu">????????????????????????????????????</b> </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="search-car.php" style="cursor: pointer;"><b
                                        class="font-menu">???????????????????????????????????????</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php"  style="color: #fff; border: 2px solid #fff; border-radius: 8px;"
                                    class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">
                                    <b class="font-menu"> ?????????????????????????????????????????? / ?????????????????????????????????</b></a>
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="ti-angle-left" style="font-weight: bold;cursor: pointer;"
                        onclick="goToSearch()"></span> <b style="font-size: 20px; margin-left: 10px;">?????????????????????????????? </b>
                </li>

            </ol>
        </nav>
      

        <div class="row">
            <div class="col-7" style="margin-top: 2px;">
            <?php
       include "server.php";
       if(isset($_GET['id'])){
        $id = $_GET['id'];

        $user_check_Car = "SELECT *,Car.id as car_id FROM Post join Car on Post.id = Car.ID_Post where Post.id = '$id' ";
        $queryCar = mysqli_query($conn, $user_check_Car);
        $resultCar = mysqli_fetch_assoc($queryCar);
        $id =  $resultCar['car_id'];
    }

       $user_check_Car_2 = "SELECT * FROM image where id_car = '$id' ";
       $queryCar_2 = mysqli_query($conn, $user_check_Car_2);
       while ( $row = mysqli_fetch_array($queryCar_2) ) :

      ?>
            

           
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="uploads/<?php echo $row['file_name']; ?>" alt="First slide">
    </div>
</div> 
                <?php
       endwhile;
       ?>
            </div>
            <?php
            include "server.php";
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $user_check_Car = "SELECT * FROM Post join Car on Post.id =Car.ID_Post where Post.id = '$id' ";
                $queryCar = mysqli_query($conn, $user_check_Car);
                $resultCar = mysqli_fetch_assoc($queryCar);

            }
            ?>


            <div class="col" style="margin-top: -9px;">
        
                <div class="car-details-content">
                    <div class="detail-content"
                        style="display: flex; justify-content: space-between;margin-bottom: 2px;">
                        <b id="carName" style="color: rgb(58 58 58); font-size: 29px;"><?php echo $resultCar['Model']; ?></b> <br>
                        <b style="color: #ff7724;font-size: 30px;">???????????? <?php  
                          setlocale(LC_MONETARY,"en_US");
                         echo  number_format($resultCar['Prize']); ?>.-</b>
                    </div>
                </div>
      
                <table class="table" style="margin-top: 7px;    margin-bottom: -9px;">
                    <tbody>

                        <tr>
                            <td class="color-header">??????????????????</td>
                            <th id="carBrand" class="color-detail"><?php echo $resultCar['BrandOfCar']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header">????????????</td>
                            <th id="carModel" class="color-detail"><?php echo $resultCar['Model']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header">??????</td>
                            <th id="carColor" class="color-detail"><?php echo $resultCar['Color']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header">?????????????????????????????????</td>
                            <th id="carEngine" class="color-detail"><?php echo $resultCar['Engine']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header"> ??????????????????????????????</td>
                            <th id="carGear" class="color-detail"><?php echo $resultCar['GearSystem']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header">???????????????????????????</td>
                            <th id="carYear" class="color-detail"><?php echo $resultCar['year_car']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header">???????????????????????????????????????</td>
                            <th id="carMiles" class="color-detail"><?php echo $resultCar['NumberOfMile']; ?></th>
                        </tr>
                        <tr>
                            <td class="color-header">?????????????????????</td>
                            <th id="carRegistrationNumber" class="color-detail"><?php echo $resultCar['Vehicle_registration_number']; ?></th>
                        </tr>
                      
                        <tr>
                            <td class="color-header">?????????????????????</td>
                            <th id="carLocation" class="color-detail">
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
                <div class="card"
                    style="background: #efefef; border: none;  margin-top: -24px; border-top-left-radius: 2px; border-top-right-radius: 2px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
                    <div class="card-body" style="padding-top: 19px; padding-bottom: 18px;">
                        <div class="contact-sell"
                            style="display: flex; justify-content: flex-start; flex-direction: row; align-content: center; align-items: center;">
                            <b style="font-size: 19.3px; color: #525252; margin-right: 11px; ">????????????????????????????????????</b> <img
                                src="images/icons8-phone-48.png" class="img-fluid icon-width" alt="logo"
                                style="width: 32px;margin-left: 10px;">
                            <h4 class="modal-title" style="font-size: 20px;margin-left: 13px;">093-341-3252</h4>
                            <img src="images/icons8-line.svg" class="img-fluid icon-width" alt="logo"
                                style="width: 37px;margin-left: 19px;">
                            <h4 class="modal-title" style="font-size: 20px; margin-left: 3px;">@line3424341</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>



    <div class="section bg-gradient mt-5">
        <div class="container">
            <div class="call-to-action">
                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>??????????????????????????? CAR-DEE</h2>
                <p class="tagline" style=" color: #FFF !important;">??????????????????????????? CAR-DEE ??????????????????????????????????????????????????? Google
                    Pay ????????? App Store ?????????????????????????????????????????????????????????????????????????????? Android ????????? IOS
                    ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
                </p>
                <div class="my-4">
                    <a href="#" class="btn btn-light" style="border-radius: 7px;"><img src="images/appleicon.png"
                            alt="icon"> App
                        Store</a>
                    <a href="#" class="btn btn-light" style="border-radius: 7px;"><img src="images/playicon.png"
                            alt="icon">
                        Google play</a>
                </div>
                <p style=" color: #FFF !important;"><small><i>*?????????????????? iOS ????????? Android ????????????????????????????????????</i></small></p>
            </div>
        </div>

    </div>
    <div class="light-bg py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 126/1 ????????? ??????????????????????????????????????? ???????????? ??????????????????????????????
                        ??????????????????????????? ??????????????????????????????????????? 10400
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
        <p class="mb-2"><small>Copyright ?? 2020 CAR-DEE.com ???????????????????????????????????????</small></p>
    </footer>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>

    <script>

        function goToSearch() {
            window.location.href = 'search-car.php';
        }

        detailCar = {
            name: "Ford ranger 2.2 xlt",
            year: "2017",
            brand: "Ford",
            model: "xlt",
            price: 786000,
            engine: "???????????????",
            engineSize: "2.2",
            gear: "??????????????????",
            color: "?????????",
            phoneContact: "0982139552",
            lineContact: "@line42452",
            locationCar: "???????????????????????????????????????",
            registrationNumber: "2??????-9311",
            expire: "?????????????????? 2022",
            miles: 12000,
            listImage: [
                {
                    id: 1,
                    image: "images/car2/1.jpg",
                },
                {
                    id: 2,
                    image: "images/car2/2.jpg",
                },
                {
                    id: 3,
                    image: "images/car2/3.jpg",
                },
                {
                    id: 4,
                    image: "images/car2/5.jpg",
                },
                {
                    id: 5,
                    image: "images/car2/4.jpg",
                },
                {
                    id: 5,
                    image: "images/car2/6.jpg",
                }
            ]
        }
       
        var carLocation = document.getElementById('carLocation');
        carLocation.innerHTML = '<span class="ti-location-pin" style="font-weight: bold;cursor: pointer;font-size: 16px;"></span> ' + detailCar.locationCar

        // set data

    
        function convertMoney(money) {
            return (Number(money)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,').split(".")[0];

        }
        !(function (d) {
            var itemClassName = "carousel__photo";
            items = d.getElementsByClassName(itemClassName),
                totalItems = items.length,
                slide = 0,
                moving = true;
            var statusImagesTotal = document.getElementById('statusImagesTotal');
            statusImagesTotal.innerHTML = "????????? " + totalItems + " ?????????"
            var statusImagesCount = document.getElementById('statusImagesCount');
            statusImagesCount.innerHTML = "?????????????????? " + (slide + 1)
            if ((slide + 1) <= 1) {
                document.getElementById('prev').style.display = 'none'
            }
            function setInitialClasses() {
                items[totalItems - 1].classList.add("prev");
                items[0].classList.add("active");
                items[1].classList.add("next");
            }

            function setEventListeners() {
                var next = d.getElementsByClassName('carousel__button--next')[0],
                    prev = d.getElementsByClassName('carousel__button--prev')[0];

                next.addEventListener('click', moveNext);
                prev.addEventListener('click', movePrev);
            }
            function disableInteraction() {
                moving = true;

                setTimeout(function () {
                    moving = false
                }, 500);
            }

            function moveCarouselTo(slide) {
                if ((slide + 1) <= 1) {
                    document.getElementById('prev').style.display = 'none'
                } else {
                    document.getElementById('prev').style.display = 'grid'
                }
                if ((slide + 1) == totalItems) {
                    document.getElementById('next').style.display = 'none'
                } else {
                    document.getElementById('next').style.display = 'grid'
                }

                var statusImagesCount = document.getElementById('statusImagesCount');
                statusImagesCount.innerHTML = "?????????????????? " + (slide + 1)
                if (!moving) {
                    disableInteraction();
                    var newPrevious = slide - 1,
                        newNext = slide + 1,
                        oldPrevious = slide - 2,
                        oldNext = slide + 2;
                    if ((totalItems - 1) > 3) {
                        if (newPrevious <= 0) {
                            oldPrevious = (totalItems - 1);
                        } else if (newNext >= (totalItems - 1)) {
                            oldNext = 0;
                        }
                        if (slide === 0) {
                            newPrevious = (totalItems - 1);
                            oldPrevious = (totalItems - 2);
                            oldNext = (slide + 1);
                        } else if (slide === (totalItems - 1)) {
                            newPrevious = (slide - 1);
                            newNext = 0;
                            oldNext = 1;
                        }
                        items[oldPrevious].className = itemClassName;
                        items[oldNext].className = itemClassName;
                        items[newPrevious].className = itemClassName + " prev";
                        items[slide].className = itemClassName + " active";
                        items[newNext].className = itemClassName + " next";
                    }
                }
            }

            function moveNext() {
                if (!moving) {
                    if (slide === (totalItems - 1)) {
                        slide = 0;
                    } else {
                        slide++;
                    }
                    moveCarouselTo(slide);
                }
            }
            function movePrev() {
                if (!moving) {
                    if (slide === 0) {
                        slide = (totalItems - 1);
                    } else {
                        slide--;
                    }
                    moveCarouselTo(slide);
                }
            }
            function initCarousel() {
                setInitialClasses();
                setEventListeners();
                moving = false;
            }
            initCarousel();

        }(document));


    </script>
</body>

<style>
    .carousel-status {
        width: 100%;
        display: flex;
        z-index: 1030;
        position: absolute;
        justify-content: center;
        bottom: 0;
        background: rgb(2 2 2 / 40%);

    }

    @font-face {
        font-family: "Prompt";
        src: url("fonts/Prompt-Regular.ttf"), url("fonts/Prompt-Medium.ttf"),
            url("fonts/Prompt-SemiBold.ttf");
    }

    .color-detail {
        color: rgb(41, 61, 147);
        font-size: 18.5px;
    }
    .color-header{
        font-size: 18px;
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

    * {
        font-family: "Prompt", sans-serif;
    }

    .ti-angle-left:hover {
        color: rgb(41, 61, 147);
        font-size: 18px;
    }

    .font-menu {
        font-size: 17.5px !important;
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

    .size-container {
        margin-left: 7.5%;
        margin-right:  7.5%;
        margin-top: 23px;
    }


    /* <------------------carousel----------------> */

    .carousel-wrapper {
        overflow: hidden;
        /* width: 90%; */
        margin: auto;
    }

    .carousel-wrapper * {
        box-sizing: border-box;
    }

    .carousel {
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .carousel__photo {
        opacity: 0;
        position: absolute;
        top: 0;
        width: 100%;
        margin: auto;
        border-radius: 10px;
        /* padding: 1rem 4rem; */
        z-index: 100;
        transition: transform .5s, opacity .5s, z-index .5s;
    }

    .carousel__photo.initial,
    .carousel__photo.active {
        opacity: 1;
        position: relative;
        z-index: 900;
    }

    .carousel__photo.prev,
    .carousel__photo.next {
        z-index: 800;
    }

    .carousel__photo.prev {
        transform: translateX(-100%);
    }

    .carousel__photo.next {
        transform: translateX(100%);
    }

    .carousel__button--prev,
    .carousel__button--next {
        position: absolute;
        top: 50%;
        width: 3rem;
        height: 3rem;
        background: rgb(2 2 2 / 40%);
        transform: translateY(-50%);
        border-radius: 50%;
        cursor: pointer;
        z-index: 1001;
        /* border: 1px solid black; */
    }

    .carousel__button--prev {
        left: 6px;
    }

    .carousel__button--next {
        right: 6px;
    }

    .carousel__button--prev::after,
    .carousel__button--next::after {
        content: " ";
        position: absolute;
        width: 10px;
        height: 10px;
        top: 50%;
        left: 54%;
        border-right: 2px solid #e5e3e3;
        border-bottom: 2px solid #e5e3e3;
        transform: translate(-50%, -50%) rotate(135deg);
    }

    .carousel__button--next::after {
        left: 47%;
        transform: translate(-50%, -50%) rotate(-45deg);
    }
</style>

</html>