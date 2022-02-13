<script src="{{ $url ?? asset('vendor/flatpickr/js/flatpickr.js') }}"></script>
<script>
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

</script>