<?php $this->load->view('partial/header'); ?>
<link href="css/plugins/iCheck/custom.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position)); ?>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-user"></span> Add a CAD User</h2>
                <ol class="breadcrumb">
                    <li>
                        Users
                    </li>
                    <li class="active">
                        <strong>Add CAD User</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add CAD User
                                <small>Add a CAD Team Member</small>
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
                            <form method="post" id="add_cad_user" class="form-horizontal"
                                  action="/users/register_CAD_user">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name</label>

                                    <div class="col-sm-10">
                                        <input name="first_name" required="" type="text" class="form-control"
                                               placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last Name</label>

                                    <div class="col-sm-10">
                                        <input name="last_name" required="" type="text" class="form-control"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">CAD Member Position</label>

                                    <div class="col-sm-10">
                                        <select name="position" id="position" class="form-control">
                                            <option value="Project Manager">Project Manager</option>
                                            <option value="Project Coordinator">Project Coordinator</option>
                                            <option selected value="Team Member">Team Member</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">E-Mail Address</label>

                                    <div class="col-sm-10">
                                        <input name="email" required="" type="email" class="form-control"
                                               placeholder="E-Mail Address">
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
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        var success = <?php if(isset($success)){echo 'true'; }?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }

        if (success) {
            toastr.success('User added successfully');
        }

        $("#add_cad_user").validate({

            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                position: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                }
            }
        });

    });
</script>

</body>

</html>
