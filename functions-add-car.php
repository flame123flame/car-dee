<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'car_dee');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }
        public function insertPost($Status, $Id_Card_number) {
            $result = mysqli_query($this->dbcon, "INSERT INTO Post(ID_Admin,ID_Post, Status, Id_Card_number) VALUES ('', '','$Status','$Id_Card_number')");
            return $result;
        }

        public function insertCar($year_car,$ID_Post,$Vehicle_registration_number, $NumberOfSeats, $numberOfMile, $Model,	$GearSystem, $SpareKey,  $Engine, $BrandOfCar, $Prize, $Color, $ID_cartype) {
            $result = mysqli_query($this->dbcon, "INSERT INTO Car(year_car, ID_Post,Vehicle_registration_number, NumberOfSeats, numberOfMile, Model, GearSystem, SpareKey, Engine, BrandOfCar, Prize, Color, ID_cartype) VALUES('$year_car','$ID_Post','$Vehicle_registration_number', '$NumberOfSeats', '$numberOfMile', '$Model', '$GearSystem', '$SpareKey', '$Engine', '$BrandOfCar', '$Prize', '$Color', '$ID_cartype')");
            return $result;
        }

        public function fetchdataProcess() {
            $result = mysqli_query($this->dbcon, "SELECT *,Car.id as id_car FROM Post join Car on Post.id = Car.ID_Post where Post.Status = 'process'  order by Post.id asc");
            return $result;
        }

        public function fetchdataPost() {
            $result = mysqli_query($this->dbcon, "SELECT *,Car.id as id_car FROM Post join Car on Post.id = Car.ID_Post  where Post.Status = 'post' order by Post.id asc");
            return $result;
        }

        public function fetchdataSell() {
            $result = mysqli_query($this->dbcon, "SELECT *,Car.id as id_car FROM Post join Car on Post.id = Car.ID_Post  where Post.Status = 'sell' order by Post.id asc");
            return $result;
        }


        public function fetchdataApprove() {
            $result = mysqli_query($this->dbcon, "SELECT *,Car.id as id_car FROM Post join Car on Post.id = Car.ID_Post  where Post.Status = 'sell' or Post.Status = 'post' order by Post.id asc");
            return $result;
        }

        public function fetchdatatTypeCar() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM Cartype");
            return $result;
        }


        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function update($firstname, $lastname, $email, $phonenumber,	$address, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                firstname = '$firstname',
                lastname = '$lastname',
                email = '$email',
                phonenumber = '$phonenumber',
                address = '$address'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

    }
    

?>