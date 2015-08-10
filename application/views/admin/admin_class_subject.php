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
                <h2><span class="fa fa-pencil"></span> Add Subject to Class</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>School</a>
                    </li>
                    <li class="active">
                        <strong>Add Subject to Class</strong>
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
                            <h5>Add Subject
                                <small>Add a new subject to a class.</small>
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
                                <div class="form-group"><label class="col-sm-2 control-label">Class</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="class_id" id="class_id">
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                            <option value="6">Grade 6</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="form-group"><label class="col-sm-2 control-label">Subject</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="subject_id" id="subject_id">
                                            <option value="1">Sinhalese</option>
                                            <option value="2">Mathematics</option>
                                        </select>
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
                            <h5>Manage Subject-Class Relation
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
                            <table class="table table-striped table-bordered table-hover dataTables-subjects">
                                <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Class 1</td>
                                    <td>Sinhalese</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-danger edit" data-class-id="1" data-subject-id="1" >Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Class 1</td>
                                    <td>Sinhalese</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-danger edit" data-class-id="1" data-subject-id="1" >Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Class 1</td>
                                    <td>Sinhalese</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-danger edit" data-class-id="1" data-subject-id="1" >Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Class 1</td>
                                    <td>Sinhalese</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-danger edit" data-class-id="1" data-subject-id="1" >Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Class 1</td>
                                    <td>Sinhalese</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-danger edit" data-class-id="1" data-subject-id="1" >Delete</button>
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
<div class="modal inmodal" id="modelSubject" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-pencil modal-icon"></i>
                <h4 class="modal-title">Mathematics</h4>
            </div>
            <form action="/" method="post">
                <input type="text" class="hidden" hidden="hidden" id="subject_id" name="subject_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Subject Name </label>
                                <input name="principal" required="" type="text" class="form-control"
                                       value="Mathematics"/>
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
