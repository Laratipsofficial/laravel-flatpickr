<?php

namespace Asdh\LaravelFlatpickr\Components;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Flatpickr extends Component
{
    public function __construct(
        public array $config = [],
        public string|int|null $id = null,
        public bool $showTime = false,
        public string $dateFormat = 'Y-m-d',
        public string $timeFormat = 'H:i',
        public ?string $altFormat = null,
        public string|Carbon|null $minDate = null,
        public string|Carbon|null $maxDate = null,
        public string|null $minTime = null,
        public string|null $maxTime = null,
        public int $firstDayOfWeek = 0,
        public array $disable = [],
        public bool $disableWeekend = false,
        public array $enable = [],
        public bool $multiple = false,
        public bool $range = false,
        public ?int $visibleMonths = null,
        public string|array|Carbon|null $value = null,
        public bool $inline = false,
        public bool $showWeekNumbers = false,
        public bool $time24hr = true,
        public bool $clearable = false,
        public bool $disableMobile = true,
    ) {
        $this->id = $this->id ?: Str::random(16);

        if ($this->mode() === 'range' && $this->visibleMonths === null) {
            $this->visibleMonths = 2;
        }

        $this->throwValueExceptions();
    }

    public function config(): array
    {
        return collect([
            'enableTime' => $this->showTime ?: null,
            'dateFormat' => $this->dateFormat(),
            'altInput' => true,
            'altFormat' => $this->altFormat ?: $this->dateFormat(),
            'time_24hr' => $this->time24hr(),
            'minDate' => $this->minDate(),
            'maxDate' => $this->maxDate(),
            'minTime' => $this->minTime,
            'maxTime' => $this->maxTime,
            'enable' => count($this->enable) > 0 ? $this->enable() : null,
            'disable' => $this->disable(),
            'mode' => $this->mode(),
            'defaultDate' => $this->value(),
            'inline' => $this->inline ?: null,
            'weekNumbers' => $this->showWeekNumbers ?: null,
            'wrap' => $this->clearable ?: null,
            'showMonths' => $this->visibleMonths,
            'disableMobile' => $this->disableMobile ?: false,
        ])
            ->merge($this->config)
            ->filter(fn ($item) => $item !== null)
            ->toArray();
    }

    public function disable(): array
    {
        return $this->formatDates($this->disable);
    }

    public function enable(): array
    {
        return $this->formatDates($this->enable);
    }

    private function dateFormat(): string
    {
        return $this->showTime ? "{$this->dateFormat} {$this->timeFormat}" : $this->dateFormat;
    }

    private function minDate(): ?int
    {
        return $this->minDate ? Carbon::parse($this->minDate)->getTimestampMs() : $this->minDate;
    }

    private function maxDate(): ?int
    {
        return $this->maxDate ? Carbon::parse($this->maxDate)->getTimestampMs() : $this->maxDate;
    }

    private function mode()
    {
        if ($this->range) {
            return 'range';
        }

        return $this->multiple ? 'multiple' : null;
    }

    private function value(): string|int|array|null
    {
        if (! $this->value) {
            return null;
        }

        if ($this->multiple) {
            return $this->formatDates($this->value);
        }

        if ($this->range) {
            if (is_array($this->value)) {
                return $this->formatDates($this->value);
            }

            return $this->value;
        }

        return Carbon::parse($this->value)->getTimestampMs();
    }

    private function formatDates(array $items): array
    {
        return collect($items)
            ->filter()
            ->map(fn ($item) => Carbon::parse($item)->getTimestampMs())
            ->values()
            ->toArray();
    }

    public function containerId(): string
    {
        return "{$this->id}-container";
    }

    public function selectorId(): string
    {
        return $this->clearable ? $this->containerId() : $this->id;
    }

    private function time24hr(): ?bool
    {
        if (! $this->showTime) {
            return null;
        }

        return $this->time24hr;
    }

    public function render()
    {
        return view('flatpickr::flatpickr.index');
    }

    public function defaultClearer()
    {
        return view('flatpickr::flatpickr.clear');
    }

    private function throwValueExceptions()
    {
        if (! $this->value) {
            return;
        }

        switch ($this->mode()) {
            case 'multiple':
                if (! is_array($this->value)) {
                    throw new \Exception("The value must be array of dates or Carbon instances when multiple is set.");
                }

                break;

            case 'range':
                if (is_array($this->value)) {
                    if (count($this->value) !== 2) {
                        throw new \Exception("The value must be an array with only 2 dates when range is set.");
                    }

                    return;
                }

                if (! is_string($this->value)) {
                    throw new \Exception("The value must be string when range is set.");
                }

                if (! Str::contains($this->value, ' to ')) {
                    throw new \Exception("The two dates must be string and separated by ' to ' in between.");
                }

                break;

            default:
                if (is_array($this->value)) {
                    throw new \Exception("The value cannot be array. Please provide a date string or Carbon instance.");
                }

                break;
        }
    }
}
