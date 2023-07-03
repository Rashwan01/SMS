<?php

namespace Theamostafa\SMS\Gateways;

use Theamostafa\SMS\Concerns\Gateway;

class Mshastra extends Gateway {
    public function name() {
        return "Mshastra";
    }

    public function query() {
        return [
            'user' => $this->username,
            'pwd' => $this->password,
            'senderid' => $this->sender,
            'mobileno' => $this->phone,
            'msgtext' => $this->message,
            'priority' => 'High',
            'CountryCode' => '966',
        ];
    }

    public function url() {
        return "https://mshastra.com/sendurlcomma.aspx?";
    }


}
