<?php
    class MainController extends Controller {
        public function index () {
            if (isset($_COOKIE['logged'])) {
                $data = [];
                $link = $this->model('Link');

                if (isset($_POST['link']) || isset($_POST['reduction'])) {
                    $link->setData($_POST['link'], $_POST['reduction']);
                    $isValid = $link->validateLinksForm();
                    if ($isValid !== true)
                        $data['error'] = $isValid;
                    else {
                        $result = $link->setLink($_COOKIE['logged']);
                        unset($_POST['link'], $_POST['reduction']);
                        if ($result === false)
                            $data['error'] = "Ошибка добавления ссылки...";
                    }
                }

                if (isset($_POST['delete-link']))
                    $link->deleteLink($_POST['delete-link']);

                $data['links'] = $link->getLinksByLogin($_COOKIE['logged']);

                $this->view("main/index", $data);
            } else {
                header('Location: ' . USER_REG);
                exit;
            }
        }
    }