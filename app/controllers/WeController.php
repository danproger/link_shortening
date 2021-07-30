<?php
    class WeController extends Controller {
        public function index () {
            header('Location: ' . MAIN);
            exit();
        }

        public function about () {
            $this->view('we/about', ['title' => 'Про нас']);
        }

        public function contact () {
            $data = ['title' => 'Обратная связь'];

            if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['age']) || isset($_POST['message'])) {
                $contact = $this->model('Contact');
                $contact->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
                $isValid = $contact->validateMailForm();
                if ($isValid !== true)
                    $data['error'] = $isValid;
                else {
                    $sent = $contact->sendMail();
                    if ($sent !== true)
                        $data['error'] = "Письмо не было отправлено! <br> Причина: " . $sent;
                    else
                        $data['success'] = "Письмо успешно отправлено! Ожидайте ответа на вашу електронную почту...";

                    unset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
                }
            }

            $this->view('we/contact', $data);
            unset($data['error'], $data['success']);
        }
    }