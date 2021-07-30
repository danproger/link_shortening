<?php
    class Link {
        private $link;
        private $reduction;

        public function __construct () {
            $db = DB::getInstance();
        }

        public function setData ($link, $reduction) {
            $this->link = $link;
            $this->reduction = $reduction;
        }

        public function validateLinksForm () {
            $reduction_exists = DB::ja_query(
                "SELECT `id` FROM `links` WHERE `reduction` = '" . $this->reduction . "'"
            );

            if (strlen($this->link) < 10)
                return "Введите корректную ссылку!";
            else if (strlen($this->reduction) < 2)
                return "Слишком короткое сокращение";
            else if ($reduction_exists != [])
                return "Такое сокращение уже используется в базе";
            else
                return true;
        }

        public function getLinksByLogin ($login) {
            return DB::ja_query("SELECT * FROM `links` WHERE `user_login` = '" . $login . "' ORDER BY `id` DESC");
        }

        public function getLinkByReduction ($reduction) {
            return DB::ja_query("SELECT * FROM `links` WHERE `reduction` = '" . $reduction . "'");
        }

        public function setLink ($login) {
            $vars = ['reduction' => $this->reduction, 'link' => $this->link, 'user_login' => $login];
            return DB::safe_query(
                "INSERT INTO `links`(`reduction`, `link`, `user_login`) VALUES(:reduction, :link, :user_login)",
                $vars
            );
        }

        public function deleteLink ($id) {
            $result = DB::ja_query("DELETE FROM `links` WHERE `id` = '" . $id . "'");
        }
    }