$(function() {
    $('.x-c3').each(function() {

        let bindTo = '#' + $(this).attr('id'),
            type = $(this).data('type'),
            chart = {};

        chart.bindto = bindTo;

        chart.data = {};
        chart.data.columns = $(this).data('columns');

        if(type) {
            chart.data.type = type;
        }

        c3.generate(chart);
    });
});
