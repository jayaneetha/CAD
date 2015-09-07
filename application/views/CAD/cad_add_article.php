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
                <h2><span class="fa fa-quote-left"></span> Add an Article</h2>
                <ol class="breadcrumb">
                    <li>
                        Article
                    </li>
                    <li class="active">
                        <strong>Add Article</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Article
                                <small>Add an article to the landing page.</small>
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
                                  action="<?= base_url('/index.php/articles/create_article') ?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>

                                    <div class="col-sm-10">
                                        <input name="title" required="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Content</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="body" id="body" cols="30"
                                                  rows="10"></textarea>
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
                                                <button class="btn btn-danger btn-outline" type="button"><span
                                                        class="fa fa-trash"></span> Discard
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

        var success = <?= $success ?>;

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
