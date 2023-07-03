<?php

namespace Theamostafa\SMS;


use Exception;
use Illuminate\Support\Collection;
use Theamostafa\SMS\Concerns\Gateway;
use Theamostafa\SMS\Gateways\Mshastra;
use function PHPUnit\Framework\isNull;

class SMS {
    protected Gateway $gateway;
    protected string|null $phone = null;
    protected string|null $message = null;
    protected array $gateways = [];

    public function attach(Gateway $gateway) {
        $this->gateways[] = $gateway;
        return $this;
    }

    public function detach(Gateway $gateway) {
        $this->gateways = array_filter($this->gateways,fn($_gateway) => $_gateway->name() !== $gateway->name());
        return $this;
    }

    public function empty() {
        $this->gateways = [];
        return $this;
    }

    public function gateway(Gateway $gateway): static {
        $this->gateway = $gateway;
        return $this;
    }

    public function message($message): static {
        $this->message = $message;
        return $this;
    }

    public function to($phone): static {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function evaluateGateway() {

        $gateway = collect($this->getGateways())->filter(fn($gateway) => $gateway->name() == config('sms.default'))->first();

        if (!$gateway) {
            throw new Exception("Unsupported SMS gateway " . config('sms.default'));
        }
        if (is_null(config('sms.username')) || is_null(config('sms.password')) || is_null(config('sms.sender'))) {
            throw new Exception("SMS gateway not configured yet");
        }


        return $gateway
            ->username(config('sms.username'))
            ->password(config('sms.password'))
            ->sender(config('sms.sender'));


    }

    public function send($message = null, $phone = null) {
        return $this->evaluateGateway()
            ->message($message ?? $this->message)
            ->phone($phone ?? $this->phone)
            ->send();
    }

    public function getGateways(): array {

        return $this->gateways;
    }

    public function getEnabledGateways(): array {
        return collect($this->getGateways())->map(fn($gateway) => $gateway->name())->toArray();
    }
}
