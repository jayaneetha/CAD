<?php $this->load->view('partial/header'); ?>
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation', array('user' => $user, 'position' => $position)); ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>

        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget navy-bg p-md text-center">
                        <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                <?= $user->first_name . " " . $user->last_name ?>
                            </h2>
                            <small><?= $position ?></small>
                        </div>
                        <img src="<?php echo base_url('profile_pictures/' . $user->profile_pic); ?>"
                             class="img-circle circle-border m-b-md"
                             alt="profile">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div style="padding-top: 25px" class="row">
                        <div class="col-lg-6">
                            <a href="inbox">
                                <div class="widget style1 lazur-bg">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-envelope-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <span> New messages </span>

                                            <h2 class="font-bold"><?= $inbox_count ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget style1 red-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-dollar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Pending Transactions </span>

                                        <h2 class="font-bold"><?= $pending_transaction_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="widget style1 yellow-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-quote-left fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Articles </span>

                                        <h2 class="font-bold"><?= $published_article_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget style1 blue-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Registration Requests </span>

                                        <h2 class="font-bold"><?= $registration_request_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget white-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <br/><br/><br/>
                                <i class="fa fa-dollar fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Total Monthly Transactions </span>

                                <h2 class="font-bold">Rs. <?= $sum_all ?>.00</h2>
                                <br/>
                                <span> Total Monthly Donations </span>

                                <h2 class="font-bold">Rs. <?= $sum_accepted ?>.00</h2>
                                <br/>
                                <span> Total Monthly Transfers </span>

                                <h2 class="font-bold">Rs. <?= $sum_transferred ?>.00</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="widget gray-bg no-padding">
                        <div style="margin-top: 10px;height: 190px" class="flot-chart dashboard-chart">
                            <span class="h3"> Fund Status </span>

                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- Jvectormap -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Flot -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.spline.js"></script>


<!-- ChartJS-->
<script src="<?php echo base_url('assets'); ?>/js/plugins/chartJs/Chart.min.js"></script>
<script>
    $(document).ready(function () {


        var data1 = [
            <?php
            $i =0;
            foreach($funds as $fund):?>
            [<?=$i++?>, <?=$fund->amount?>],
            <?php  endforeach;?>
        ];

        var data2 = [
            <?php
             $i =0;
             foreach($accepted as $fund): ?>
            [<?=$i++?>, <?=$fund->amount?>],
            <?php  endforeach;?>
        ];
        var data3 = [
            <?php
            $i =0;
            foreach($transferred as $fund): ?>
            [<?=$i++?>, <?=$fund->amount?>],
            <?php  endforeach;?>
        ];

        var data1 = [
            [0, 4], [1, 8], [2, 5], [3, 10], [4, 4], [5, 16], [6, 5], [7, 11], [8, 6], [9, 11], [10, 30], [11, 10], [12, 13], [13, 4], [14, 3], [15, 3], [16, 6]
        ];
        var data2 = [
            [0, 1], [1, 0], [2, 2], [3, 0], [4, 1], [5, 3], [6, 1], [7, 5], [8, 2], [9, 3], [10, 2], [11, 1], [12, 0], [13, 2], [14, 8], [15, 0], [16, 0]
        ];

        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2, data3
            ],
            {
                series: {
                    lines: {
                        show: true,
                        fill: true
                    },
                    splines: {
                        show: false,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
//                colors: ["#1ab394", "#464f88"],
                xaxis: {},
                yaxis: {
                    ticks: 4
                },
                tooltip: true
            }
        );


        /*var doughnutData = [
         {
         value: 300,
         color: "#a3e1d4",
         highlight: "#1ab394",
         label: "App"
         },
         {
         value: 50,
         color: "#dedede",
         highlight: "#1ab394",
         label: "Software"
         },
         {
         value: 100,
         color: "#b5b8cf",
         highlight: "#1ab394",
         label: "Laptop"
         }
         ];

         var doughnutOptions = {
         segmentShowStroke: true,
         segmentStrokeColor: "#fff",
         segmentStrokeWidth: 2,
         percentageInnerCutout: 45, // This is 0 for Pie charts
         animationSteps: 100,
         animationEasing: "easeOutBounce",
         animateRotate: true,
         animateScale: false,
         };
         var ctx = document.getElementById("doughnutChart").getContext("2d");
         var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);
         */
    });
</script>


</body>

</html>
