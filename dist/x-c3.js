$(function() {
    $('.x-c3').each(function() {

        let bindTo = '#' + $(this).attr('id'),
            dataType = $(this).data('type'),
            dataX = $(this).data('x'),
            chart = {};

        chart.bindto = bindTo;

        chart.data = {};
        chart.data.columns = $(this).data('columns');

        if(dataType) {
            chart.data.type = dataType;
        }

        if(dataX) {
            chart.data.x = dataX;
        }

        c3.generate(chart);
    });
});
