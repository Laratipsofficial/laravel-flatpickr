<?php

it("can render styles", function () {
    test()->blade('<x-flatpickr::style />')
        ->assertSee('.flatpickr-container')
        ->assertSee('.flatpickr-input')
        ->assertSee('.flatpickr-clearable')
        ->assertSee('vendor/flatpickr/css/flatpickr.css');
});

it("can set style url from config file", function () {
    config()->set('flatpickr.css_url', 'https://url-from-config.css');

    test()->blade('<x-flatpickr::style />')
        ->assertSee('https://url-from-config.css')
        ->assertDontSee('vendor/flatpickr/css/flatpickr.css');
});

it("can set style url from component", function () {
    config()->set('flatpickr.css_url', 'https://url-from-component.css');

    test()->blade('<x-flatpickr::style url="https://url-from-component.css" />')
        ->assertSee('https://url-from-component.css')
        ->assertDontSee('vendor/flatpickr/css/flatpickr.css');
});

it("can set style url as per the priority", function () {
    config()->set('flatpickr.css_url', 'https://url-from-config.css');

    test()->blade('<x-flatpickr::style url="https://url-from-component.css" />')
        ->assertSee('https://url-from-component.css')
        ->assertDontSee('https://url-from-config.css')
        ->assertDontSee('vendor/flatpickr/css/flatpickr.css');
});

it("can render scripts", function () {
    test()->blade('<x-flatpickr::script />')
        ->assertSee('flatpickr(')
        ->assertSee('__supportedEventNames:')
        ->assertSee('initializeFlatpickr:function')
        ->assertSee('__config:function')
        ->assertSee('__disableWeekends:function')
        ->assertSee('__events:function')
        ->assertSee('vendor/flatpickr/js/flatpickr.js');
});

it("can set script url from config file", function () {
    config()->set('flatpickr.js_url', 'https://url-from-config.js');

    test()->blade('<x-flatpickr::script />')
        ->assertSee('https://url-from-config.js')
        ->assertDontSee('vendor/flatpickr/js/flatpickr.js');
});

it("can set script url from component", function () {
    config()->set('flatpickr.js_url', 'https://url-from-component.js');

    test()->blade('<x-flatpickr::script url="https://url-from-component.js" />')
        ->assertSee('https://url-from-component.js')
        ->assertDontSee('vendor/flatpickr/css/flatpickr.css');
});

it("can set script url as per the priority", function () {
    config()->set('flatpickr.js_url', 'https://url-from-config.js');

    test()->blade('<x-flatpickr::script url="https://url-from-component.js" />')
        ->assertSee('https://url-from-component.js')
        ->assertDontSee('https://url-from-config.js')
        ->assertDontSee('vendor/flatpickr/css/flatpickr.css');
});
