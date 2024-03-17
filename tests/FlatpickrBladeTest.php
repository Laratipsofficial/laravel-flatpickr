<?php

it('can render flatpickr', function () {
    test()->blade('<x-flatpickr />')
        ->assertSee('<input', false)
        ->assertSee('type="text"', false)
        ->assertSee('class="flatpickr-container"', false)
        ->assertSee('class="flatpickr-input"', false)
        ->assertSee('data-selector-id')
        ->assertSee('data-config')
        ->assertSee('data-disable-weekend="0"', false)
        ->assertSee('data-input')
        ->assertSee('"dateFormat":"Y-m-d"', false)
        ->assertSee('"altInput":true', false)
        ->assertSee('"altFormat":"Y-m-d"', false)
        ->assertSee('disable":[]', false);
});

it('uses the passed id', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" />')
        ->assertSee('id="laravel-flatpickr"', false)
        ->assertSee('id="laravel-flatpickr-container"', false);
});

it('uses the default date format when no format is passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" />')
        ->assertSee('"dateFormat":"Y-m-d"', false);
});

it('uses passed date format', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" date-format="Y/m/d" />')
        ->assertSee('"dateFormat":"Y\/m\/d"', false)
        ->assertDontSee('"dateFormat":"Y-m-d"', false);
});

it('uses passed date time format', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" show-time date-format="Y/m/d" time-format="H-i" />')
        ->assertSee('"dateFormat":"Y\/m\/d H-i"', false)
        ->assertDontSee('"dateFormat":"Y\/m\/d H:i"', false);
});

it('shows the time', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" show-time />')
        ->assertSee('"enableTime":true', false)
        ->assertSee('"dateFormat":"Y-m-d H:i"', false)
        ->assertSee('"altFormat":"Y-m-d H:i"', false);
});

it('shows the alt format when passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" alt-format="F j, Y, H:i" />')
        ->assertSee('"altFormat":"F j, Y, H:i"', false);
});

it('uses min date when passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :min-date="today()" />')
        ->assertSee('"minDate":' . today()->getTimestampMs(), false);
});

it('uses max date when passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :max-date="today()" />')
        ->assertSee('"maxDate":' . today()->getTimestampMs(), false);
});

it('uses min time when passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" min-time="12:11" />')
        ->assertSee('"minTime":"12:11"', false);
});

it('uses max time when passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" max-time="12:11" />')
        ->assertSee('"maxTime":"12:11"', false);
});

it('uses first day of week as passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :first-day-of-week="2" />')
        ->assertSee('data-first-day-of-week="2"', false);
});

it('can disable the weekend', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" disable-weekend />')
        ->assertSee('data-disable-weekend="1"', false);
});

it('can disable passed dates', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :disable="[today(), today()->addDays(2)]" />')
        ->assertSee('"disable":[' . today()->getTimestampMs() . ',' . today()->addDays(2)->getTimestampMs() . ']', false);
});

it('can enable passed dates', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :enable="[today(), today()->addDays(2)]" />')
        ->assertSee('"enable":[' . today()->getTimestampMs() . ',' . today()->addDays(2)->getTimestampMs() . ']', false);
});

it('can pick multiple dates', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" multiple />')
        ->assertSee('"mode":"multiple"', false);
});

it('can pick date range', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" range />')
        ->assertSee('"mode":"range"', false);
});

it('shows 2 months as visible by default when mode is range', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" range />')
        ->assertSee('"mode":"range"', false)
        ->assertSee('"showMonths":2', false);
});

it('shows passed months as visible when mode is range', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" range :visible-months="3" />')
        ->assertSee('"mode":"range"', false)
        ->assertSee('"showMonths":3', false);
});

it('shows date range when both multiple and range is passed', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" range multiple />')
        ->assertSee('"mode":"range"', false)
        ->assertDontSee('"mode":"multiple"', false);
});

it('show the passed date as the default value', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :value="today()" />')
        ->assertSee('"defaultDate":' . today()->getTimestampMs(), false);
});

it('show the passed date as the default value in multiple mode', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :value="[today(), today()->addDays(2)]" multiple />')
        ->assertSee('"defaultDate":[' . today()->getTimestampMs() . ',' . today()->addDays(2)->getTimestampMs() . ']', false);
});

it('show the passed date as the default value in array range mode', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" :value="[today(), today()->addDays(2)]" range />')
        ->assertSee('"defaultDate":[' . today()->getTimestampMs() . ',' . today()->addDays(2)->getTimestampMs() . ']', false);
});

it('show the passed date as the default value in string range mode', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" value="2022-02-16 to 2022-02-19" range />')
        ->assertSee('"defaultDate":"2022-02-16 to 2022-02-19"', false);
});

it('can be shown as inline date picker', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" inline />')
        ->assertSee('"inline":true', false);
});

it('can show week numbers', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" show-week-numbers />')
        ->assertSee('"weekNumbers":true', false);
});

it('shows 24 hr time format by default', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" show-time />')
        ->assertSee('"time_24hr":true', false);
});

it('shows 12 hr time format when 24 hr is false', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" show-time :time24hr="false" />')
        ->assertSee('"time_24hr":false', false);
});

it('can be clearable', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" clearable />')
        ->assertSee('class="flatpickr-clearable"', false)
        ->assertSee('data-clear', false)
        ->assertSee('"wrap":true', false);
});

it('makes the container as selector id when clearable', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" clearable />')
        ->assertSee('data-selector-id="laravel-flatpickr-container"', false)
        ->assertDontSee('data-selector-id="laravel-flatpickr"', false);
});

it('the clearer can be changed by using slot', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" clearable><x-slot name="clearer">Clear It</x-slot></x-flatpickr>')
        ->assertSee('data-selector-id="laravel-flatpickr-container"', false)
        ->assertSee('Clear It', false)
        ->assertDontSee('data-selector-id="laravel-flatpickr"', false);
});

it('prints the event attributes as it is', function () {
    test()->blade('<x-flatpickr id="laravel-flatpickr" onChange="() => alert()" />')
        ->assertSee('onChange="() => alert()"', false);
});
