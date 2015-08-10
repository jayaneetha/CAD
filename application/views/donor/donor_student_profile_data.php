<script type="text/javascript">
    $(function () {
        Morris.Line({
            element: 'student-overall-performance',
            data: [{y: '2006', a: 100, b: 100, c: 100},
                {y: '2007', a: 75, b: 65, c: 55},
                {y: '2008', a: 50, b: 40, c: 30},
                {y: '2009', a: 75, b: 75, c: 75},
                {y: '2010', a: 50, b: 40, c: 30},
                {y: '2011', a: 75, b: 65, c: 55},
                {y: '2012', a: 100, b: 100, c: 100}],
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true,
            lineColors: ['#54cdb4', '#1ab394', '#6ab394'],
        });

    });
</script>