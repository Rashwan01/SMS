<?php
use Theamostafa\SMS\Gateways\Alfa;

test('can attach new gateway', function () {
    SMS::empty()->attach(new Alfa);
    expect(SMS::getEnabledGateways())->toHaveCount(1)->toContain('alfa');
});

test('can detach existing gateway', function () {
    SMS::empty()->attach(new Alfa)->detach(new Alfa);
    expect(SMS::getEnabledGateways())->toHaveCount(0);
});

test('throw exception when use unsupported gateway', function () {
    config()->set('sms.default', 'ahmed');

    $cb = fn() => SMS::message('Hello from samsung device')->to('512345678')->send();

    expect($cb)->toThrow(Exception::class, 'Unsupported SMS gateway ahmed');


});
test('exception when use gateway null credentials', function () {
    config()->set('sms.username', null);
    $cb = fn() => SMS::message('Hello from samsung device')->to('512345678')->send();
    expect($cb)->toThrow(Exception::class, 'SMS gateway not configured yet');
});
test('can sent sms with the default gateway', function () {
    expect(SMS::message('Hello from samsung device')->to('512345678')->send())->toBeTrue();
});
