<?php
/**
* PHP Email Form Class
* A simple PHP class to send email messages through PHP's mail() function
* https://bootstrapmade.com/php-email-form/
* https://github.com/bootstrapmade/php-email-form
**/

class PHP_Email_Form {
    private $to;
    private $from_name;
    private $from_email;
    private $subject;
    private $message;
    private $headers;
    public $smtp = array();
    public $error_message;

    function __construct() {
        $this->headers = "MIME-Version: 1.0" . "\r\n";
        $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $this->headers .= 'From: <' . $this->from_email . '>' . "\r\n";
    }

    private function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    public function add_message($content, $name = "") {
        if ($name != "") {
            $this->message .= "<strong>$name:</strong> <p>" . $this->clean_string($content) . "</p>";
        } else {
            $this->message .= "<p>" . $this->clean_string($content) . "</p>";
        }
    }

    public function send() {
        $this->message = "<html><body>" . $this->message . "</body></html>";
        if (mail($this->to, $this->subject, $this->message, $this->headers)) {
            return true;
        } else {
            $this->error_message = "Lỗi: Không thể gửi email.";
            return false;
        }
    }
}
?>
