<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/admin_navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2><span class="fa fa-users"></span> Manage Classes</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>School</a>
                    </li>
                    <li class="active">
                        <strong>Manage Classes</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add New Class
                                <small>Add a new class level to the system.</small>
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
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Class Name</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="name"> <span
                                            class="help-block m-b-none">A unique name for the class should be given. <br/>E.g Grade 8</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="m-r-xl">
                                        <button class="btn btn-primary pull-right" type="submit">Add <span
                                                class="fa fa-plus"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Manage Classes
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
                            <table class="table table-striped table-bordered table-hover dataTables-classes">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Grade 1</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelClass">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade 2</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelClass">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade 3</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelClass">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade 4</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelClass">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade 5</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelClass">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade 6</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelClass">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                                </table>
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

<!-- Model -->
<div class="modal inmodal" id="modelClass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-users modal-icon"></i>
                <h4 class="modal-title">Grade 6</h4>
            </div>
            <form action="/" method="post">
                <input type="text" class="hidden" hidden="hidden" id="class_id" name="class_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Class Name </label>
                                <input name="principal" required="" type="text" class="form-control"
                                       value="Grade 6"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger m-r-xs">Delete</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
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

<!-- Data Tables -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dataTables-classes').dataTable({
            responsive: true,
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
