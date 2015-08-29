<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position)); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2><span class="fa fa-pencil"></span> Manage Subjects</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>School</a>
                    </li>
                    <li class="active">
                        <strong>Manage Subjects</strong>
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
                            <h5>Add New Subject
                                <small>Add a new subject level to the system.</small>
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
                            <form id="add_subject_form" action="<?= base_url('/index.php/schools/add_subject')?>" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Subject Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"> <span
                                            class="help-block m-b-none">A unique name for the subject should be given. <br/>E.g Mathematics</span>
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
                            <h5>Manage Subjects
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
                                    <th>Name</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($subjects as $subject): ?>
                                    <tr>
                                        <td><?= $subject->subject_name ?></td>
                                        <td>
                                            <div class="btn-group-sm">
                                                <button class="btn btn-sm btn-default edit"
                                                        data-subject-id="<?= $subject->id ?>"
                                                        data-toggle="modal"
                                                        data-target="#modelSubject">Edit
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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

<!--Subject Modal -->
<?php $this->load->view('partial/modals/subject'); ?>

<!-- Delete modal -->
<div class="modal inmodal" id="modelDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-pencil modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Delete Subject</h4>
            </div>
            <form action="<?php echo base_url('index.php/schools/delete_subject') ?>" method="POST">
                <input type="text" id="delete-subject-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <p class="text-danger text-center">Do you really want to delete the Subject?<br/>This cannot
                                be reversed.</p>

                            <div class="form-group">
                                <label class="text-center" for="password">Please enter your password to continue</label>
                                <input id="delete-class-password" type="password" class="form-control" name="password"
                                       value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delete-class-delete" type="submit" class="btn btn-danger">Delete</button>
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

<!-- Data Tables -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {

        var success = <?= $success ?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        switch (success) {
            case 0:
                break;
            case 1:
                toastr.success('Successfully Added');
                break;
            case 2:
                toastr.error('Failed to add the subject');
                break;
            case 3:
                toastr.success('Successfully updated the subject');
                break;
            case 4:
                toastr.success('Successfully deleted the subject');
                break;
            case 5:
                toastr.error('Failed to delete the subject');
                break;
            default:
                toastr.error('Something went wrong');
        }


        $('.dataTables-classes').dataTable({
            responsive: true,
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });


        $('.edit').click(function (e) {
            e.preventDefault();
            var subjectID = $(this).data('subject-id');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('schools/get_single_subject/'); ?>",
                data: {
                    subject_id: subjectID
                }, success: function (data) {
                    show_subject_modal('admin_manage_subjects', data);
                }
            });
        });

        $('#subject-delete').click(function (e) {
            e.preventDefault();
            var subjectID = $(this).data('subject-id');
            $('#delete-subject-id').val(subjectID);
            $('#modelDelete').modal('show');
        });

        $("#add_subject_form").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 3
                }
            }
        });

    });
</script>
</body>

</html>
