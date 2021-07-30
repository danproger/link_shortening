<?php
    class LController extends Controller {
        public function index ($reduction) {
            $link_obj = $this->model('Link');
            $link = $link_obj->getLinkByReduction($reduction)[0];
            header('Location: ' . $link->link);
            exit();
        }
    }