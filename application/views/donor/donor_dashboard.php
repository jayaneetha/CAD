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
                             alt="profile"
                             width="128px">
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
                                        <span> Accepted Transactions </span>

                                        <h2 class="font-bold"><?= $accepted_transaction_count ?></h2>
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
                                        <i class="fa fa-pencil fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Student Tests </span>

                                        <h2 class="font-bold"><?= $student_test_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget style1 blue-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-dollar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Transferred Transactions </span>

                                        <h2 class="font-bold"><?= $transferred_transaction_count ?></h2>
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
                <div class="col-lg-8">
                    <div class="widget navy-bg">
                        <div class="row">
                            <div class="col-xs-2">
                                <br/><br/><br/>
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-10 text-right">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span>Name </span>

                                        <h2 class="font-bold"><?= $student->first_name . ' ' . $student->last_name ?></h2>
                                        <br/>
                                        <span>Address </span>

                                        <h2 class="font-bold"><?= $student->address_1 . "<br/>"
                                            . $student->address_2 . "<br/>"
                                            . $student->city ?></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>School </span>

                                        <h2 class="font-bold"><?= $student->name ?></h2>
                                        <br/>
                                        <span>Class </span>

                                        <h2 class="font-bold"><?= $student->class_name ?></h2>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php $this->load->view('partial/footer'); ?>
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

    });
</script>


</body>

</html>
