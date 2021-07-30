<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    class Contact {
        private $conf;
        private $username;
        private $usermail;
        private $userage;
        private $letter_message;

        public function __construct () {
            $this->conf = require_once "app/config/mail_config.php";
        }

        public function setData ($name, $email, $age, $message) {
            $this->username = $name;
            $this->usermail = $email;
            $this->userage = $age;
            $this->letter_message = $message;
        }

        public function validateMailForm () {
            if (strlen($this->username) < 2)
                return "Имя слишком короткое";
            else if (strlen($this->usermail) < 5)
                return "Введите коректный email";
            else if ($this->userage < 5 || $this->userage > 100)
                return "Введите корректный возраст";
            else if (strlen($this->letter_message) < 10)
                return "Сообщение должно быть не короче, чем 10 символов";
            else
                return true;
        }

        public function sendMail () {
            $mail = new PHPMailer($this->conf['exceptions']);

            try {
                $mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER
                $mail->isSMTP();
                $mail->Host       = $this->conf['host'];
                $mail->SMTPAuth   = $this->conf['smtp_auth'];
                $mail->Username   = $this->conf['username'];
                $mail->Password   = $this->conf['password'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = $this->conf['port'];

                $mail->setFrom($this->usermail, $this->username);
                $mail->addAddress($this->conf['send_to_mail'], $this->conf['send_to_username']);
                $mail->addReplyTo($this->usermail, $this->username);
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                $mail->isHTML($this->conf['isHTML']);
                $mail->Subject = $this->conf['subject'];
                $mail->Body    = $this->letter_message;
                $mail->AltBody = htmlspecialchars($this->letter_message);

                $mail->send();
                return true;
            } catch (Exception $e) {
                return $mail->ErrorInfo;
            }
        }
    }