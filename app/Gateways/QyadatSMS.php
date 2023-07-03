<?php

namespace Theamostafa\SMS\Gateways;

use Illuminate\Support\Facades\Http;
use Theamostafa\SMS\Concerns\Gateway;

class QyadatSMS extends Gateway {
    public function name() {
        return "qyadat";
    }

    public function url() {
        return 'https://smsmobily.com/api/sendsms.php';
    }

    public function query() {
        return [
            'return' => 'Json',
            'message' => $this->message,
            'numbers' => $this->phone,
            'username' => $this->username,
            'password' => $this->password,
            'sender' => $this->sender,
        ];
    }


}
