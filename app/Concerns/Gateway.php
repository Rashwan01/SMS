<?php

namespace Theamostafa\SMS\Concerns;

use Exception;
use Illuminate\Support\Facades\Http;

abstract class Gateway {
    public $username;
    public $password;
    public $sender;
    public $message;
    public $phone;

    abstract public function name();

    final public function username($username) {
        $this->username = $username;
        return $this;
    }

    final public function password($password) {
        $this->password = $password;
        return $this;
    }

    final  public function sender($sender) {
        $this->sender = $sender;
        return $this;
    }

    final  public function message($message) {
        $this->message = $message;
        return $this;
    }

    final  public function phone($phone) {
        $this->phone = $phone;
        return $this;
    }

    abstract public function url();

    abstract public function query();

    final public function send() {
        $res = Http::get($this->url(), $this->query());
        if ($res->status() !== 200) {
            throw  new Exception("{$this->name()} issue with $res->status status ");
        }
        return true;

    }
}
