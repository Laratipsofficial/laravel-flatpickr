<script src="{{ $url ?? config('flatpickr.js_url') ?? asset('vendor/flatpickr/js/flatpickr.js') }}"></script>
{{-- <script>
    (function () {
        let supportedEventNames = ['onChange', 'onOpen', 'onClose', 'onMonthChange', 'onYearChange', 'onReady', 'onValueUpdate', 'onDayCreate'];

        document.addEventListener("DOMContentLoaded", function(event) {
            document.querySelectorAll('.flatpickr-input').forEach((el) => initializeFlatpickr(el))
        })

        function initializeFlatpickr(el) {
            let selectorEl = document.getElementById(el.getAttribute('data-selector-id'));

            flatpickr(selectorEl, config(el))
        }

        function config(el) {
            let config = JSON.parse(el.getAttribute('data-config'));
            let isWeekendDisabled = el.getAttribute('data-disable-weekend') === "1";

            if (isWeekendDisabled) {
                config.disable.push(disableWeekends())
            }

            return {
                ...config,
                ...events(el),
            };
        }

        function disableWeekends() {
            return function(date) {
                return (date.getDay() === 0 || date.getDay() === 6);
            }
        }

        function events(el) {
            let elEvents = el.getAttributeNames().filter(name => name.startsWith('on'));

            return elEvents.reduce((obj, elEventName) => {
                let eventName = supportedEventNames.find(eventName => eventName.toLowerCase() === elEventName);

                if (eventName) {
                    obj[eventName] = function(...params) {
                        eval(el.getAttribute(eventName))(...params)
                    }
                }

                return obj;
            }, {});
        }
    })();

</script> --}}
<script>
    !function(){let supportedEventNames=["onChange","onOpen","onClose","onMonthChange","onYearChange","onReady","onValueUpdate","onDayCreate"];function initializeFlatpickr(e){let t=document.getElementById(e.getAttribute("data-selector-id"));flatpickr(t,config(e))}function config(e){let t=JSON.parse(e.getAttribute("data-config"));return"1"===e.getAttribute("data-disable-weekend")&&t.disable.push(disableWeekends()),{...t,...events(e)}}function disableWeekends(){return function(e){return 0===e.getDay()||6===e.getDay()}}function events(el){let elEvents=el.getAttributeNames().filter(e=>e.startsWith("on"));return elEvents.reduce((obj,elEventName)=>{let eventName=supportedEventNames.find(e=>e.toLowerCase()===elEventName);return eventName&&(obj[eventName]=function(...params){eval(el.getAttribute(eventName))(...params)}),obj},{})}document.addEventListener("DOMContentLoaded",function(e){document.querySelectorAll(".flatpickr-input").forEach(e=>initializeFlatpickr(e))})}();
</script>