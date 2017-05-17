(function() {
// Code to load/parse the CSV and update the gauges on the main page

// these colors are shared with the El Nino gauges, which is why they are global
window.dialColors = {
    'recent': 'rgb(47, 47, 47)',
    'outlook': 'rgb(192, 192, 192)'
};

var gaugeColors = {
    'rain': [
        'rgb(180, 187, 245)',
        'rgb(123, 136, 238)',
        'rgb(54, 75, 228)'
    ],
    'wind': [
        'rgb(252, 226, 197)',
        'rgb(241, 179, 112)',
        'rgb(232, 143, 46)'
    ],
    'sealevel': [
        'rgb(190, 249, 224)',
        'rgb(112, 211, 170)',
        'rgb(34, 172, 116)'
    ]

};
var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
];

function gauge(variable, when, value, date) {
    var label = date ? monthNames[date.getMonth()] + ' ' + date.getFullYear() : when;
    levelGauge('#' + variable + '_' + when, value, label, gaugeColors[variable], dialColors[when]);
}

var baseUrl = 'data/'; // 'http://iprc.soest.hawaii.edu/users/mwidlans/Marshall_Islands/';
var urls = {
    rain: 'prec_gauge.csv',
    wind: 'wspd_gauge.csv',
    sealevel: 'ssh_gauge.csv'
};

ko.utils.objectForEach(urls, function(variable, url) {
    $.ajax({
        url: baseUrl + url,
        success: function(data) {
            if (typeof data === 'string') {
                data = CSV.parse(data);
                // the first row of data should be labeled "Majuro", which is the one we're using (what should we do if it's not?)
                if (data[0].Region === "Majuro") {
                    // use the computer time to display the recent and outlook date values; later we can get these from the data for better accuracy
                    var date = new Date();
                    date.setDate(1);    // set the date to the first, so moving between months always works (otherwise it can fail at the end of months)

                    date.setMonth(date.getMonth()-1);   // recent is for the previous month
                    gauge(variable, 'recent', data[0].Now * 2 + 3, date);

                    date.setMonth(date.getMonth()+3);   // outlook is for three months after recent
                    gauge(variable, 'outlook', data[0].Outlook * 2 + 3, date);
                }
            }
        }
    });
});

})();
