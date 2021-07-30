<?php
    class User {
        private $login;
        private $email;
        private $pass;

        public function __construct () {
            $db = DB::getInstance();
        }

        public function setData ($login, $email, $pass) {
            $this->login = $login;
            $this->email = $email;
            $this->pass = $pass;
        }

        public function logIn ($login, $password) {
            if (trim($login) == "")
                return "Введите логин!";

            $user = DB::ja_query("SELECT * FROM `users` WHERE `login` = '" . $login . "'");
            if ($user == [])
                return "Пользователя с таким логином не существует!";
            else if (password_verify($password, $user[0]->password)) {
                $this->setAuth($login);
            } else
                return "Неверный пароль!";
        }

        public function logOut () {
            setcookie('logged', "", time() - 3600 * 24, '/');
            unset($_COOKIE['logged']);
            header('Location: ' . USER_AUTH);
            exit();
        }

        public function validateRegForm () {
            $email_exists = DB::ja_query("SELECT `id` FROM `users` WHERE `email` = '" . $this->email . "'");
            $login_exists = DB::ja_query("SELECT `id` FROM `users` WHERE `login` = '" . $this->login . "'");

            if (strlen($this->email) < 5)
                return "Введите корректный email";
            else if (strlen($this->email) > 100)
                return "Слишком длинный email (max 100)";
            else if ($email_exists != [])
                return "Пользователь с таким email-ом уже существует";
            else if (strlen($this->login) < 2)
                return "Логин слишком короткий";
            else if (strlen($this->login) > 40)
                return "Логин слишком длинный (max 40)";
            else if ($login_exists != [])
                return "Пользователь с таким логином уже существует";
            else if (strlen($this->pass) < 6)
                return "Пароль не менее 6 символов";
            else
                return true;
        }

        public function addUser () {
            $vars = [
                'login' => $this->login,
                'email' => $this->email,
                'password' => password_hash($this->pass, PASSWORD_DEFAULT)
            ];

            $query = "INSERT INTO users(login, email, password) VALUES(:login, :email, :password)";
            $result = DB::safe_query($query, $vars);

            $this->setAuth($this->login);
        }

        public function setAuth ($login) {
            setcookie('logged', $login, time() + 3600, '/');
            header('Location: ' . MAIN);
        }
    }