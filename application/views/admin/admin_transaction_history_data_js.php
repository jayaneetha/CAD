<script type="text/javascript">
    $(function () {
        var lineData = {
            labels: [
                <?php foreach($funds as $fund): ?>
                "<?=substr($fund->timestamp,0,10)?>",
                <?php endforeach; ?>
            ],
            datasets: [
                {
                    label: "Total",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [
                        <?php foreach($funds as $fund): ?>
                        <?=$fund->amount?>,
                        <?php endforeach; ?>
                    ]
                },
                {
                    label: "Accepted",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [28, 48, 40, 19, 86, 27, 90,]
                }
            ]
        };

        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: false,
            responsive: true,
        };


        var ctx = document.getElementById("transactionHistoryLineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
    });
</script>