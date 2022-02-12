<script src="{{ asset('js/flatpickr.js') }}"></script>
<script>
    (function () {
        let supportedEvents = ['onChange', 'onOpen', 'onClose', 'onMonthChange', 'onYearChange', 'onReady', 'onValueUpdate'];

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
            return supportedEvents.reduce((obj, eventName) => {
                if (el.hasAttribute(eventName)) {
                    obj[eventName] = function(selectedDates, dateStr, instance) {
                        eval(el.getAttribute(eventName))(selectedDates, dateStr, instance)
                    }
                }

                return obj;
            }, {})
        }
    })();

</script>