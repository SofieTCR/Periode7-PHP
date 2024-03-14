<?php
    use \PHPUnit\Framework\TestCase;
    use Opdracht6a\Classes\User;
    use Opdracht6a\Classes\Database;

    class LoginTest extends TestCase
    {
        protected $user;
        protected $database;

        protected function  setUp(): void
        {
            $this->user = new User();
            $this->database = new Database("localhost", "login", "root", "");
        }


        // Database class tests
        public function testConnect(): void
        {
            $this->assertInstanceOf(Database::class, $this->database);
        }

        public function testExecuteQuery(): void
        {
            $query = "SELECT * FROM users WHERE username = ?";
            $params = array("test_user");

            $statement = $this->database->executeQuery($query, $params);

            $this->assertInstanceOf(PDOStatement::class, $statement);
        }

        // User class tests
        public function testRegisterUser(): void
        {
            $this->user->username = "test_user";
            $this->user->SetPassword("test_password");
            
            // Test registration
            $errors = $this->user->RegisterUser();
            $this->assertEmpty($errors);

            // Delete the test user from the database
            $query = "DELETE FROM users where username = ?";
            $params = array("test_user");

            $this->database->executeQuery($query, $params);
        }

        public function testValidateUser(): void
        {
            $this->user->username = "sofie";
            $this->user->SetPassword("0000");

            // Test validation
            $errors = $this->user->ValidateUser();
            $this->assertEmpty($errors);
        }

        public function testLoginUser(): void
        {
            $this->user->username = "sofie";
            $this->user->SetPassword("0000");

            // Test Login
            $status = $this->user->LoginUser();
            $this->assertTrue($status);
            $this->user->Logout();
        }

        public function testIsLoggedIn(): void
        {
            $this->user->username = "sofie";
            $this->user->SetPassword("0000");
            $this->user->LoginUser();

            // Test IsLoggedin
            $status = $this->user->IsLoggedin();
            $this->assertTrue($status);
            $this->user->Logout();
        }

        public function testGetUser(): void
        {
            // Test GetUser
            $status = $this->user->GetUser("sofie");

            $this->assertTrue($status);
            $this->assertNotEmpty($this->user->username);
        }

        public function testLogoutUser()
        {
            // Test Logout
            $this->user->Logout();

            $isDeleted = (session_status() == PHP_SESSION_NONE && empty(session_id()));
            $this->assertTrue($isDeleted);
        }
    }
?>