<?php $this->load->view('partial/header'); ?>
<!-- Morris -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
</head>

<body>
<div id="wrapper">

    <?php $this->load->view('partial/donor_navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2><span class="fa fa-user"></span> Student Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Student</a>
                    </li>
                    <li class="active">
                        <strong>Student Profile</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content profile-content">
                                <h3><strong>Monica Smith</strong></h3>

                                <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>

                                <p><i class="fa fa-institution"></i> A/ Kuda wewa M.V</p>
                                <h5>
                                    About me
                                </h5>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitat.
                                </p>

                                <div class="row m-t-lg">
                                    <div class="col-md-6">
                                        <h5 class="text-right"> Past Test Marks</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                    </div>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                                    class="fa fa-envelope"></i> Send Message
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"><i
                                                    class="fa fa-coffee"></i> Buy a coffee
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 animated fadeInRightBig">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Overall Progress</h5>

                            <div class="ibox-tools">
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <div id="student-overall-performance"></div>
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

<!-- Peity -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/peity/jquery.peity.min.js"></script>

<!-- Peity -->
<script src="<?php echo base_url('assets'); ?>/js/demo/peity-demo.js"></script>

<!-- Morris -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/morris/morris.js"></script>

<?php
$this->load->view('donor/donor_student_profile_data');
?>

</body>

</html>
