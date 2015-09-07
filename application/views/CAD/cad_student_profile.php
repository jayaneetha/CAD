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
                                <h3><strong><?= $student->first_name . " " . $student->last_name ?></strong></h3>

                                <p><i class="fa fa-map-marker"></i> <?= $student->address_1 . "<br/>"
                                    . $student->address_2 . "<br/>"
                                    . $student->city ?></p>

                                <p><i class="fa fa-birthday-cake"></i> <?= $student->DOB ?></p>

                                <p><i class="fa fa-institution"></i> <?= $student->name ?></p>

                                <p><i class="fa fa-users"></i> <?= $student->class_name ?></p>

                                <p><i class="fa fa-link"></i> <?= $student->assigned_teacher ?></p>

                                <p><i class="fa fa-phone"></i> <?= $student->teacher_contact ?></p>


                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button id="change-class" type="button" class="btn btn-primary btn-sm btn-block"><i
                                                    class="fa fa-users"></i> Change Class
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button id="change-school" type="button" class="btn btn-primary btn-sm btn-block"><i
                                                    class="fa fa-users"></i> Change School
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


<div class="modal inmodal" id="modelClass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn tada">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Change Class</h4>
            </div>
            <form action="<?php echo base_url('/index.php/users/update_student/class') ?>" method="POST">
                <input type="text" id="user-id" name="id" value="<?= $student->id ?>" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label class="text-center" for="password">Class:</label>
                                <select class="form-control" name="class" id="class">
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modelSchool" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn tada">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Change School</h4>
            </div>
            <form action="<?php echo base_url('/index.php/users/update_student/school') ?>" method="POST">
                <input type="text" id="user-id" name="id" value="<?= $student->id ?>" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label class="text-center" for="password">Class:</label>
                                <select class="form-control" name="school" id="school">
                                    <?php foreach ($schools as $school): ?>
                                        <option value="<?= $school->id ?>"><?= $school->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
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

<script>
    $(document).ready(function () {
        $('#change-class').click(function(){
            $('#modelClass').modal('show');

        });
        $('#change-school').click(function(){
            $('#modelSchool').modal('show');

        });
    });

</script>

<?php
$this->load->view('cad/cad_student_profile_data');
?>

</body>

</html>
