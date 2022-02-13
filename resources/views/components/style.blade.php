<link rel="stylesheet" href="{{ $url ?? asset('vendor/flatpickr/css/flatpickr.css') }}">
@if(config('flatpickr.use_style'))
<style>
.flatpickr-container{display:flex}.flatpickr-input{flex-grow:1;appearance:none;background-color:#fff;border:1px solid #6b7280;padding:.5rem .75rem;line-height:1.5rem}.flatpickr-clearable{cursor:pointer;display:flex;align-items:center;background-color:#fff;border:1px solid #6b7280;border-left-width:0;padding:.5rem 1rem}.flatpickr-clearable>svg{width:1rem}
</style>
@endif