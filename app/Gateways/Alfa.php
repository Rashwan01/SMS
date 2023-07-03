<?php

namespace Theamostafa\SMS\Gateways;

use Http;
use Theamostafa\SMS\Concerns\Gateway;

class Alfa extends Gateway {
    public function name() {
        return 'alfa';
    }
    public function url() {
        return "https://www.alfa-cell.com/api/msgSend.php";
    }
    public function query() {
        return [
            'mobile' => $this->username,
            'password' => $this->password,
            'sender' => $this->sender,
            'msg' => $this->message,
            'number' => $this->phone,
            'returnJson' => 1,
            'lang' => 3,
            'dateSend' => date('Y-m-d') ?? 0,
            'timeSend' => time() ?? 0,
            'msgId' => time() . rand(1000, 1000000),
            'applicationType' => 68,
            'noRepeat' => 1,
            'domainName' => $_SERVER['HTTP_REFERER'] ?? '',
        ];
    }


}
