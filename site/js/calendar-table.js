// Knockout "calendar-table" component to display the table version of the circular calendar
// Usage: <calendar-table id="table" params="chartOptions: chartOptions"></calendar-table>
//      chartOptions: the options that were provided to HighCharts for the circular calendar

ko.components.register('calendar-table', {
    viewModel: function(params) {
        function numMonths(y) {
            // y = days; convert to months
            return Math.round(y / 30);
        }
        function label(data) {
            // determine whether to display a label based on the space and label length
            var m = numMonths(data.y), l = data.name.length;
            return l > 2 && (m > 2 || (m > 1 && l < 9) || l < 6) ? data.name : '\u00a0';
        }
        function hoverLabel(parent, data) {
            // text to show for each value when hovering
            return data.name.length > 2 ? parent.name + ": " + data.name : null;
        }
        var vm = {
            contrast: Highcharts.SVGRenderer.prototype.getContrast,
            numMonths: numMonths,
            label: label,
            hoverLabel: hoverLabel,
            chartOptions: params.chartOptions
        };
        return vm;
    },
    template: '\
    <table class="calendartable" data-bind="with: chartOptions">\
        <thead><tr>\
            <th style="width: 14.9%;"></th>\
            <!-- ko foreach: series[0].data--><th class="rotate" style="width: 3.7%;"><div><span>{{name}}</span></div></th><!--/ko-->\
        </tr></thead>\
        <tbody>\
            <!-- ko foreach: series.slice(1)-->\
            <tr>\
                <td class="label">{{{$data.tableLabel || name}}}</td>\
                <!-- ko foreach: data--><td style.background="{{color}}" style.color="{{$component.contrast(color)}}" \
                    colspan="{{$component.numMonths(y)}}" title="{{$component.hoverLabel($parent, $data)}}">{{ $component.label($data) }}</td><!--/ko-->\
            </tr>\
            <!-- ko if: $data.space -->\
            <tr><td style="line-height: .6em">&nbsp;</td></tr>\
            <!--/ko-->\
            <!--/ko-->\
        </tbody>\
    </table>'
});
