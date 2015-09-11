<?php $this->load->view('partial/header'); ?>
<link href="<?php echo base_url('assets'); ?>/css/plugins/iCheck/custom.css" rel="stylesheet">

<!-- Summernote -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-quote-left"></span> Add a Student</h2>
                <ol class="breadcrumb">
                    <li>
                        Users
                    </li>
                    <li class="active">
                        <strong>Add Student</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Student
                                <small>Add a student to the system.</small>
                            </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal"
                                  action="<?= base_url('/index.php/users/register/student') ?>">
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">First Name</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="first_name" required="" type="text" class="form-control"
                                               placeholder="First Name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">Last Name</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="last_name" required="" type="text" class="form-control"
                                               placeholder="Last Name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">E-Mail Address</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="email" required="" type="text" class="form-control"
                                               placeholder="E-Mail Address" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">Contact No.</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="contact_no" required="" type="text" class="form-control"
                                               placeholder="Contact No."
                                               value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">Address</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="address_1" required="" type="text" class="form-control"
                                               placeholder="Address Line 1"
                                               value="">
                                        <input name="address_2" required="" type="text" class="form-control"
                                               placeholder="Address Line 2"
                                               value="">
                                        <input name="city" required="" type="text" class="form-control"
                                               placeholder="City"
                                               value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">School</label>

                                    <div class="col-sm-8 m-xs">
                                        <select name="school_id" id="school_id" class="form-control">
                                            <?php foreach ($schools as $school): ?>
                                                <option value="<?= $school->id ?>"><?= $school->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">Class</label>

                                    <div class="col-sm-8 m-xs">
                                        <select name="class_id" id="class_id" class="form-control">
                                            <?php foreach ($classes as $class): ?>
                                                <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">Assigned Teacher</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="assigned_teacher" required="" type="text" class="form-control"
                                               placeholder="Assigned Teacher"
                                               value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 m-xs control-label">Contact No. of Teacher</label>

                                    <div class="col-sm-8 m-xs">
                                        <input name="teacher_contact" required="" type="text" class="form-control"
                                               placeholder="Contact No. of Teacher"
                                               value="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-outline" type="submit"><span
                                                        class="fa fa-plus"></span> Add
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
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

<!-- SUMMERNOTE -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/summernote/summernote.min.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {

        $('#body').summernote(
            {
                height: 250,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true,
            }
        );

        $("#form-register").validate({

            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    minlength: 3,
                    email: true
                },
                contact_no: {
                    required: false,
                    minlength: 3
                },
                address_1: {
                    required: true,
                    number: true
                },
                city: {
                    required: true,
                    number: true
                },
                assigned_teacher: {
                    required: true,
                    number: true
                },
                teacher_contact: {
                    required: true,
                    number: true,
                    equalTo: '#password'
                }

            }
        });

        var success = <?= 'false' ?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        switch (success) {
            case 0:
                break;
            case 1:
                toastr.success("Article added successfully");
                break;
            case 2:
                toastr.error("Error in adding article");
                break;
            default:
                toastr.error("Something wrong happened");
        }
    });
</script>

</body>

</html>
