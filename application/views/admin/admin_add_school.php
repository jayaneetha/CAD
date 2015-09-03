<?php $this->load->view('partial/header'); ?>
<link href="<?php echo base_url('assets'); ?>/css/plugins/iCheck/custom.css" rel="stylesheet">

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
                <h2><span class="fa fa-bank"></span> Add a School</h2>
                <ol class="breadcrumb">
                    <li>
                        School
                    </li>
                    <li class="active">
                        <strong>Add School</strong>

                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add School
                                <small>Add benificiary schools to the system.</small>
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
                            <form id="add_school_form" method="post" class="form-horizontal"
                                  action="<?= base_url('index.php/schools/add') ?>">
                                <div class="form-group tooltip-demo">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input name="name" required="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <input name="address1" required="" type="text" class="form-control"
                                               placeholder="Address Line 1">
                                        <input name="address2" type="text" class="form-control"
                                               placeholder="Address Line 2">
                                        <input name="city" required="" type="text" class="form-control"
                                               placeholder="City">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contact Number</label>

                                    <div class="col-sm-10">
                                        <input name="contact_no" required="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name of Principal</label>

                                    <div class="col-sm-10">
                                        <input name="principal" required="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Add <span
                                                class="fa fa-plus"></span></button>
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

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        var success = <?php if(isset($success)){echo $success; } ?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        if (success) {
            toastr.success('School updated successfully');
        }

        $("#add_school_form").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                address1: {
                    required: true,
                    minlength: 3
                },
                address2: {
                    required: false,
                    minlength: 3
                },
                contact_no: {
                    required: true,
                    number: true
                }

            }
        });

    });
</script>

</body>

</html>
