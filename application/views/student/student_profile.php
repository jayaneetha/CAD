<?php $this->load->view('partial/header'); ?>
<!-- Morris -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
</head>

<body>
<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>

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
                        <strong>Profile</strong>
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
                                <h3><strong><?= $student->first_name . " " . $student->last_name ?></strong></h3>

                                <p><i class="fa fa-map-marker"></i> <?= $student->address_1 . "<br/>"
                                    . $student->address_2 . "<br/>"
                                    . $student->city ?></p>

                                <p><i class="fa fa-birthday-cake"></i> <?= $student->DOB ?></p>

                                <p><i class="fa fa-institution"></i> <?= $student->name ?></p>

                                <p><i class="fa fa-users"></i> <?= $student->class_name ?></p>

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
