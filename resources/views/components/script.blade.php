<script src="{{ $url ?? config('flatpickr.js_url') ?? asset('vendor/flatpickr/js/flatpickr.js') }}"></script>
@if(config('flatpickr.locale'))
    <script src="https://npmcdn.com/flatpickr/dist/l10n/{{ config('flatpickr.locale') }}.js"></script>
@endif
{{-- <script>
    {!! file_get_contents(base_path('vendor/asdh/laravel-flatpickr/resources/to-be-minified/laravel-flatpickr.js')) !!}
</script> --}}
{{-- check /resources/to-be-minified/ folder for not minified scripts --}}
<script>
    window.LaravelFlatpickr={__supportedEventNames:["onChange","onOpen","onClose","onMonthChange","onYearChange","onReady","onValueUpdate","onDayCreate"],initializeFlatpickr:function(e){flatpickr(document.getElementById(e.getAttribute("data-selector-id")),this.__config(e))},__config:function(e){let t=JSON.parse(e.getAttribute("data-config")),a="1"===e.getAttribute("data-disable-weekend");a&&t.disable.push(this.__disableWeekends());let i=e.getAttribute("data-locale"),n=Number(e.getAttribute("data-first-day-of-week")),r=flatpickr.l10ns[i]||{};return{...t,locale:{...r,firstDayOfWeek:n},...this.__events(e)}},__disableWeekends:function(){return function(e){return 0===e.getDay()||6===e.getDay()}},__events:function(el){let elEvents;return el.getAttributeNames().filter(e=>e.startsWith("on")).reduce((obj,elEventName)=>{let eventName=this.__supportedEventNames.find(e=>e.toLowerCase()===elEventName);return eventName&&(obj[eventName]=function(...params){eval(el.getAttribute(eventName))(...params)}),obj},{})}},document.addEventListener("DOMContentLoaded",function(e){document.querySelectorAll(".flatpickr-input").forEach(e=>window.LaravelFlatpickr.initializeFlatpickr(e))});var observer=new MutationObserver(e=>{e.forEach(e=>{e.removedNodes.length>0&&window.LaravelFlatpickr.initializeFlatpickr(e.previousSibling)})});document.querySelectorAll(".flatpickr-container").forEach(e=>{observer.observe(e,{childList:!0})});
</script>
