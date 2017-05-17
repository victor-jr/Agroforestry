(function() {
// simple String.includes polyfill
if (!String.prototype.includes) {
    String.prototype.includes = function(search) {
        return this.indexOf(search) !== -1;
    };
}

// Custom Knockout bindings

// "hidden" binding is a shortcut for visible: !x
ko.bindingHandlers.hidden = {
    update: function(element, valueAccessor) {
        var value = ko.unwrap(valueAccessor());
        ko.bindingHandlers.visible.update(element, function() { return !value; });
    }
};
// "arrow" binding displays and updates arrow pointing to el nino calendar
// usage: arrow: {now: currentMonth, width: xxx, offset: xx}
//      now: 0+ month value
//      width: pixel width of the calendar to determine scale
//      offset: pixel position of month 0 in the calendar
ko.bindingHandlers.arrow = {
    init: function(element, valueAccessor) {
        function update() {
            var calendarWidth = document.getElementById("calendar").offsetWidth,
                options = ko.unwrap(valueAccessor()),
                currentMonth = ko.unwrap(options.now),
                scale = calendarWidth/options.width;

            element.style.width = scale*0.8*43 + "px";

            if (currentMonth == null) {
                element.style.visibility = "hidden";
            } else {
                element.style.visibility = "";
                element.style.marginLeft = scale * (options.offset + 30.4*currentMonth) + "px";
            }
        }
        update();
        window.onresize = update;
        ko.computed(update, null, { disposeWhenNodeIsRemoved: element });
    }
}
// "calendar" binding initializes the calendar (calendar.js)
ko.bindingHandlers.calendar = {
    init: function(element) {
        calendar(element, true/*hidetitle*/);
    }
}

// "elninoGauge" binding initializes the ENSO advisory and watch gauges (gauge.js)
var elninoGaugeColors = [
    'rgb(191, 255, 191)',
    'rgb(223, 223, 223)',
    'rgb(255, 255, 191)'
];
var labels = {
    'recent': 'current (advisory)',
    'outlook': 'outlook (watch)'
};
var bandLabels = {
    'recent': [ 'El Niño', 'Neutral', 'La Niña' ],
    'outlook': [ 'El Niño', 'None', 'La Niña' ]
};
ko.bindingHandlers.elninoGauge = {
    init: function(element, valueAccessor) {
        var options = ko.unwrap(valueAccessor()),
            value = ko.unwrap(options.value),
            which = options.which;
        if (value) {
            levelGauge(element, value, labels[which], elninoGaugeColors, dialColors[which], bandLabels[which]);
        }
    }
}

// viewmodel for Knockout; observable values allow to asyncronous updates

var vm = {
    currentMonth: ko.observable(new Date().getMonth()),
    advisory: ko.observable(),
    advisoryDate: ko.observable(),
    display: ko.observable(),
    recentGaugeValue: ko.observable(3),
    outlookGaugeValue: ko.observable(3)
};
ko.applyBindings(vm);


// Helper code to load/parse ENSO status and update viewmodel

var baseUrl = 'data/';
var div = document.createElement('div');

function removeHTML(text) {
    div.innerHTML = text;
    return div.textContent.replace(/\s+/g, ' ');
}

// extract alert and date values from the HTML
function parseEnsoStatus(html) {
    var match = html.match(/[\s\S]*Synopsis:/m),
        head = (match && match[0]) || html,
        alert = head.match(/ENSO Alert[\s\S]*(dvisory|atch|Active)/m),
        date = head.match(/[0-9]+ \w+ 20[0-9][0-9]/);
    alert && (alert = removeHTML(alert[0]));
    date && (date = removeHTML(date[0]));
    alert = alert.replace('ENSO Alert System Status: ', '');
    return {
        alert: alert,
        date: date
    };
}

// update the viewmodel based on the alert status
function processEnsoStatus(data) {
    vm.advisory(data.alert);
    vm.advisoryDate(data.date);
    vm.recentGaugeValue(3);
    vm.outlookGaugeValue(0);

    if (data.alert.includes('La Niña Watch')) {
        vm.outlookGaugeValue(5);
    } else if (data.alert.includes('La Niña Advisory') && !data.alert.includes('Final La Niña Advisory')) {
        vm.recentGaugeValue(5);
    }

    if (data.alert.includes('El Niño Watch')) {
        vm.outlookGaugeValue(1);
        vm.display('watch');
    } else if (data.alert.includes('El Niño Advisory') && !data.alert.includes('Final El Niño Advisory')) {
        vm.currentMonth(null);
        updateAdvisoryMonth();
        vm.recentGaugeValue(1);
        vm.display('advisory');
    } else {
        vm.display('normal');
    }

    if (vm.recentGaugeValue() == 3 && vm.outlookGaugeValue() == 0) {
        vm.advisory('(Normal Conditions)');
    }
}

// for the El Nino Advisory status, load and parse last year's status to see if we're in "year 0" or "year 1"
function updateAdvisoryMonth() {
    $.ajax({
        url: baseUrl + 'lastYearEnso.html',
        success: function(data) {
            if (typeof data === 'string') {
                data = parseEnsoStatus(data);
                var currentMonth = new Date().getMonth();
                if (data.alert.includes('El Niño Advisory')) {
                    vm.currentMonth(currentMonth + 12);
                } else {
                    vm.currentMonth(currentMonth);
                }
            }
        }
    });
}

// load/parse ENSO status and update viewmodel
function loadEnsoStatus() {
    $.ajax({
        url: baseUrl + 'currentEnso.html',
        success: function(data) {
            if (typeof data === 'string') {
                processEnsoStatus(parseEnsoStatus(data));
            }
        }
    });
}

// for testing, if a "teststatus" query string is provided, use it instead of loading the current ENSO status
var testEnsoStatus = $.query.get('teststatus');
if (testEnsoStatus) {
    processEnsoStatus({
        alert: testEnsoStatus.replace(/_/g, ' ').replace(/ Nin/g, ' Niñ'),
        date: ''
    });
} else {
    loadEnsoStatus();
}

})();
