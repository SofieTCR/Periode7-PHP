<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans
    require_once 'classes/Database.php';

    class User{

        // Eigenschappen 
        public $username;
        public $email;
        private $password;
        public $role;
        private static $db;
        
        public function __construct() {
            self::$db = new Database("localhost", "root", "login", "");
        }

        function SetPassword($password){
            $this->password = $password;
        }
        function GetPassword(){
            return $this->password;
        }

        public function ShowUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
        }

        public function RegisterUser(){
            $status = false;
            $errors=[];
            if($this->username != "" || $this->password != ""){

                // Check user exist
                if(true){
                    array_push($errors, "Username bestaat al.");
                } else {
                    // username opslaan in tabel login
                    // INSERT INTO `user` (`username`, `password`, `role`) VALUES ('kjhasdasdkjhsak', 'asdasdasdasdas', '');
                    // Manier 1
                    
                    $status = true;
                }
                            
                
            }
            return $errors;
        }

        function ValidateUser(){
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            }
            if (strlen($this->username) <= 3) {
                array_push($errors, "Username too short");
            } else if (strlen($this->username) > 50) {
                array_push($errors, "Username too long");
            }

            if (empty($errors)) {
                $query = "SELECT username FROM users WHERE username = ? AND password = ?";
                $params = array($this->username, password_hash($this->password));

                $result = self::$db.executeQuery($query, $params);

                echo($result->fetch(PDO::FETCH_ASSOC));
            }
            
            return $errors;
        }

        public function LoginUser(){

            // Connect database

            // Zoek user in de table user
           echo "Username:" . $this->username;


            // Indien gevonden dan sessie vullen


            return true;
        }

        // Check if the user is already logged in
        public function IsLoggedin() {
            // Check if user session has been set
            
            return false;
        }

        public function GetUser($username){
            
		    // Doe SELECT * from user WHERE username = $username
            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
            } else {
                return NULL;
            }   
        }

        public function Logout(){
            session_start();
            // remove all session variables
           

            // destroy the session
            
            header('location: index.php');
        }


    }

    

?>