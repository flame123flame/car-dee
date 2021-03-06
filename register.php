<?php
    session_start();
    include('server.php'); 

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
    <link href="css/style.css" rel="stylesheet">\
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30" id="active"
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

        <div class="card"
            style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;margin-top: 50px;margin-bottom: 100px;border-radius: 12px; border: none;">
            <div class="section-title" style="margin-top: 30px;margin-bottom: 0px;">
                <h3 style="color: #633991; font-size: 38px; font-weight: bold;">CAR-DEE ???????????????????????????????????? </h3>
                <hr>
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col">
                    <form action="register_db.php" method="post">
                            <div class="tab-pane fade show active text-left" id="register"
                                style="border-top-width: 7px;">
                                <div class="row mb-3">
                                    <div class="col text-center">
                                        <b style="font-size: 28px !important;color: #633991;">?????????????????????????????????????????????</b>
                                        <h4>????????????????????????????????????????????????????????????</h4>
                                        <hr>
                                    </div>
                                </div>
                                <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="usernameRegis">Username <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="username" id="usernameRegis"
                                            placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            username ????????????????????????????????? 6 ???????????????????????????
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="password"    id="password"
                                            placeholder="Password" required>
                                        <div class="invalid-feedback">
                                            password ????????????????????????????????? 6 ???????????????????????????
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="cid">?????????????????????????????????????????? <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="cid"  name="cid"    maxlength="13"
                                            placeholder="x-xxxxx-xxxxx-xx-x">
                                        <div class="invalid-feedback" required>
                                            ?????????????????????????????????????????? 13 ??????????????????????????????????????????
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="back_cid">Email <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" 
                                            placeholder="email" required>
                                        <div class="invalid-feedback">
                                            ???????????? Email ??????????????????????????????
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fname">???????????? <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="????????????" required>
                                        <div class="invalid-feedback">
                                            ???????????????????????????????????????
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lname">????????????????????? <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="?????????????????????" required>
                                        <div class="invalid-feedback">
                                            ????????????????????????????????????????????????
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phoneNumber">??????????????????????????????????????? <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" maxlength="10" id="phoneNumber" name="phone"
                                            placeholder="???????????????????????????????????????">
                                        <div class="invalid-feedback">
                                            ??????????????????????????????????????????????????? 10 ????????????????????????????????????
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idline">???????????????????????? <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="idline" name="idline" placeholder="????????????????????????" required>
                                        <div class="invalid-feedback">
                                            ???????????????????????????????????????????????????
                                        </div>
                                    </div>
                                   
                                </div>
                       


                              
                                <hr>
                                <div class="row mt-5">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-block"
                                            style="border-radius: 10px;background-color: #cfcfcf;cursor: pointer;padding-top: 8px; padding-bottom: 8px;">
                                            <b style="font-size: 17px;color: #505050;"
                                                class="mt-2 mb-2">?????????????????????????????????????????????</b></button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-block" type="submit" name="reg_user"
                                            style="border-radius: 10px;padding-top: 8px; padding-bottom: 8px; background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);cursor: pointer;">
                                            <b style="font-size: 17px;color: #fff;">?????????????????????????????????</b></button>
                                    </div>
                                </div>
                            
                        </div>
                        </form>
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
        fileF.onchange = evt => {
            const [file] = fileF.files
            if (file) {
                fileFShow.src = URL.createObjectURL(file)
            }
        }

        fileB.onchange = evt => {
            const [file] = fileB.files
            if (file) {
                fileBShow.src = URL.createObjectURL(file)
            }
        }
     
        function scripCheckCID(id) {
            if (!IsNumeric(id)) return false;
            if (id.substring(0, 1) == 0) return false;
            if (id.length != 13) return false;
            for (i = 0, sum = 0; i < 12; i++)
                sum += parseFloat(id.charAt(i)) * (13 - i);
            if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
            return true;
        }
        function IsNumeric(input) {
            var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
            return (RE.test(input));
        }

        function validateRegister() {
            var username = document.getElementById("usernameRegis")
            var password = document.getElementById("passwordRegis")
            var cid = document.getElementById("cid")
            var email = document.getElementById("email")
            var fname = document.getElementById("fname")
            var lname = document.getElementById("lname")
            var phoneNumber = document.getElementById("phoneNumber")
            var idline = document.getElementById("idline")
            var address = document.getElementById("address")

            if (username.value && username.value.length >= 6) {
                username.classList.remove("is-invalid");
            } else {
                username.classList.add("is-invalid");
            }
            if (password.value && password.value.length >= 6) {
                password.classList.remove("is-invalid");
            } else {
                password.classList.add("is-invalid");
            }
            if ((cid.value && cid.value.length == 13) && scripCheckCID(cid.value)) {
                cid.classList.remove("is-invalid");
            } else {
                cid.classList.add("is-invalid");
            }
            if (email.value && email.value.length == 12) {
                email.classList.remove("is-invalid");
            } else {
                email.classList.add("is-invalid");
            }
            if (fname.value) {
                fname.classList.remove("is-invalid");
            } else {
                fname.classList.add("is-invalid");
            }
            if (lname.value) {
                lname.classList.remove("is-invalid");
            } else {
                lname.classList.add("is-invalid");
            }
            if (phoneNumber.value && phoneNumber.value.length == 10) {
                phoneNumber.classList.remove("is-invalid");
            } else {
                phoneNumber.classList.add("is-invalid");
            }
            if (idline.value) {
                idline.classList.remove("is-invalid");
            } else {
                idline.classList.add("is-invalid");
            }
            if (address.value) {
                address.classList.remove("is-invalid");
            } else {
                address.classList.add("is-invalid");
            }
            if ((username.value && username.value.length >= 6) && (password.value && password.value.length >= 6) && (cid.value && cid.value.length == 13)
                && (backCid.value && backCid.value.length == 12) && fname.value && lname.value && (phoneNumber.value && phoneNumber.value.length == 10)
                && idline.value && address.value) {
              return true;
            }
            return false;
        }


        function register() {
            if(validateRegister()){

            }
        }


        function validateLogin() {
            var username = document.getElementById("username")
            var password = document.getElementById("password")
            if (username.value && username.value.length >= 6) {
                username.classList.remove("is-invalid");
            } else {
                username.classList.add("is-invalid");
                return;
            }
            if (password.value && password.value.length >= 6) {
                password.classList.remove("is-invalid");
            } else {
                password.classList.add("is-invalid");
                return;
            }
            return true;
        }

        function login() {
            if (validateLogin()) {
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;
      
    }
            }
        }




    </script>
</body>

<style>
    .position-icon {
        position: absolute;
        left: 14px;
        top: 8px;
        border-radius: 10px;
        font-size: 22px;
        color: #fff;
        z-index: 1030;
        padding: 14px;
        background: linear-gradient(90deg, rgb(41, 61, 147) 0%, rgb(70, 90, 183) 50%, rgb(41, 61, 147) 100%);
    }


    .input-style {
        height: 50px;
        cursor: pointer;
        border-radius: 8px;
        width: 100%;
        /* border: none; */
        background-color: #eaebf3 !important;
        padding: 0 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        -webkit-box-shadow: none;
        box-shadow: none !important;
        /* outline: none !important; */
        padding-left: 60px !important;
    }

    .file {
        opacity: 0;
        width: 0.1px;
        height: 0.1px;
        position: absolute;
    }

    .file-input label {
        display: block;
        position: relative;
        width: 350px;
        height: 50px;
        border-radius: 7px;
        background: linear-gradient(40deg, #5965b1, #7873f5);
        box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: transform .2s ease-out;
    }

    .row-image {
        margin-top: 10px;
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-around;
    }

    @font-face {
        font-family: "Prompt";
        src: url("fonts/Prompt-Regular.ttf"), url("fonts/Prompt-Medium.ttf"),
            url("fonts/Prompt-SemiBold.ttf");
    }

    .nav-tabs .nav-link.active {
        background: #fefefe;
        border-top-width: 4px;
        border-bottom-width: 1px;
        border-color: rgb(41, 61, 147) #faf6fb rgb(228, 228, 228);
        color: rgb(41, 61, 147);
    }



    * {
        font-family: "Prompt", sans-serif;
    }


    .font-menu {
        font-size: 17.5px !important;
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


    .size-container {
        margin-left: 17%;
        margin-right: 17%;
        margin-top: 23px;
    }
</style>

</html>