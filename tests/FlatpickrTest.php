<?php

use Asdh\LaravelFlatpickr\Components\Flatpickr;
use Carbon\Carbon;

it("has some default config values if nothing is passed", function () {
    $component = new Flatpickr();

    expect($component->config())
        ->toMatchArray([
            "dateFormat" => "Y-m-d",
            "altInput" => true,
            "altFormat" => "Y-m-d",
            "disable" => [],
        ]);
});

it("formats the disabled dates properly", function () {
    $component = new Flatpickr(
        disable: [null, '', 0, 'today', '2021-01-02']
    );

    expect($component->disable())
        ->toBeArray()
        ->toHaveCount(2)
        ->toEqual([today()->getTimestampMs(), Carbon::parse('2021-01-02')->getTimestampMs()]);
});

it("formats the enabled dates properly", function () {
    $component = new Flatpickr(
        enable: [null, '', 0, 'today', '2021-01-02']
    );

    expect($component->enable())
        ->toBeArray()
        ->toHaveCount(2)
        ->toEqual([today()->getTimestampMs(), Carbon::parse('2021-01-02')->getTimestampMs()]);
});

it("matches the passed date format", function () {
    $component = new Flatpickr(
        dateFormat: 'Y/m/d'
    );

    expect($component->config())
        ->toMatchArray([
            'dateFormat' => 'Y/m/d',
            'altFormat' => 'Y/m/d',
        ]);
});

it("matches the passed date alt format", function () {
    $component = new Flatpickr(
        altFormat: 'Y/m/d'
    );

    expect($component->config())
        ->toMatchArray([
            'dateFormat' => 'Y-m-d',
            'altFormat' => 'Y/m/d',
        ]);
});

it("matches the passed time format", function () {
    $component = new Flatpickr(
        showTime: true,
        timeFormat: 'H-i'
    );

    expect($component->config())
        ->toMatchArray([
            'dateFormat' => 'Y-m-d H-i',
            'altFormat' => 'Y-m-d H-i',
        ]);
});

it("the default time is 24hr", function () {
    $component = new Flatpickr(
        showTime: true,
    );

    expect($component->config())
        ->toMatchArray([
            'time_24hr' => true,
        ]);
});

it("can set time as 12 hr", function () {
    $component = new Flatpickr(
        showTime: true,
        time24hr: false,
    );

    expect($component->config())
        ->toMatchArray([
            'time_24hr' => false,
        ]);
});

it("default date must be int if no mode is passed", function () {
    $component = new Flatpickr(
        value: today()
    );

    expect($component->config())
        ->toMatchArray([
            'defaultDate' => today()->getTimestampMs(),
        ]);
});

it("default date must be array of int if multiple is passed", function () {
    $component = new Flatpickr(
        multiple: true,
        value: [today(), today()->addDays(3), null]
    );

    expect($component->config())
        ->toMatchArray([
            'defaultDate' => [today()->getTimestampMs(), today()->addDays(3)->getTimestampMs()],
        ]);
});

it("default date must be string if range is passed", function () {
    $component = new Flatpickr(
        range: true,
        value: "2022-02-16 to 2022-03-15"
    );

    expect($component->config())
        ->toMatchArray([
            'defaultDate' => '2022-02-16 to 2022-03-15',
        ]);
});

it("cannot accept array as value if no mode is set", function () {
    new Flatpickr(
        value: ["2022-02-16"]
    );
})->throws("The value cannot be array. Please provide a date string or Carbon instance.");

it("cannot accept array as value if mode is range", function () {
    new Flatpickr(
        range: true,
        value: ["2022-02-16"]
    );
})->throws("The value must be string when range is set.");

it("cannot accept string without ' to ' in it mode is range", function () {
    new Flatpickr(
        range: true,
        value: "2022-02-16"
    );
})->throws("The two dates must be string and separated by ' to ' in between.");

it("cannot accept other than array if mode is multiple", function () {
    new Flatpickr(
        multiple: true,
        value: "2022-02-16"
    );
})->throws("The value must be array of dates or Carbon instances when multiple is set.");
