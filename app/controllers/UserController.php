<?php
    class UserController extends Controller {
        public function index () {
            if (!isset($_COOKIE['logged'])) {
                header('Location: ' . USER_AUTH);
                exit();
            }

            $data = ['title' => "Личный кабинет"];
            $user = $this->model('User');

            if (isset($_POST['exit-btn']))
                $user->logOut();

            $this->view('user/dashboard', $data);
        }

        public function auth () {
            $data = ['title' => "Авторизация"];
            if (isset($_POST['login']) || isset($_POST['password'])) {
                $user = $this->model('User');
                $data['error'] = $user->logIn($_POST['login'], $_POST['password']);
            }

            $this->view('user/auth', $data);
        }

        public function reg () {
            if (isset($_POST['email']) || isset($_POST['login']) || isset($_POST['password'])) {
                $user = $this->model('User');
                $user->setData($_POST['login'], $_POST['email'], $_POST['password']);
                $isValid = $user->validateRegForm();
                if ($isValid === true) {
                    $user->addUser();
                } else
                    $data['error'] = $isValid;
            }

            $this->view('user/reg', $data);
            unset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
        }
    }