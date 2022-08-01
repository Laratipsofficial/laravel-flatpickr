<link rel="stylesheet" href="{{ $url ?? config('flatpickr.css_url') ?? asset('vendor/flatpickr/css/flatpickr.css') }}">
@if(config('flatpickr.use_style'))
{{-- check /resources/to-be-minified/ folder for not minified styles --}}
<style>
    .flatpickr-container{display:flex}.flatpickr-container .form-control,.flatpickr-input{flex-grow:1;appearance:none;background-color:#fff;border:1px solid #6b7280;padding:.5rem .75rem;line-height:1.5rem}.flatpickr-container .form-control[readonly],.flatpickr-input[readonly]{cursor:pointer}.flatpickr-container .form-control[disabled],.flatpickr-input[disabled]{cursor:not-allowed;background:#ededed}.flatpickr-clearable{cursor:pointer;display:flex;align-items:center;background-color:#fff;border:1px solid #6b7280;border-left-width:0;padding:.5rem 1rem}.flatpickr-clearable>svg{width:1rem}
</style>
@endif
