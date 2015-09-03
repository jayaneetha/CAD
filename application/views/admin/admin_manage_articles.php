<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
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
                <h2><span class="fa fa-quote-left"></span> Manage Articles</h2>
                <ol class="breadcrumb">
                    <li>
                        Articles
                    </li>
                    <li class="active">
                        <strong>Manage Articles</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Current Articles
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
                            <table id="articles-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($articles as $article) :
                                    if ($article->published == 1) {
                                        $published = 'Published';
                                        $badge = "primary";
                                        $action = 'Unpublish';
                                        $action_colour = 'danger';
                                        $action_url = '/index.php/articles/unpublish/' . $article->id;
                                    } else {
                                        $published = 'Unpublished';
                                        $badge = "danger";
                                        $action = 'Publish';
                                        $action_colour = 'primary';
                                        $action_url = '/index.php/articles/publish/' . $article->id;
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $article->title ?></td>
                                        <td><?= substr($article->timestamp, 0, 10) ?></td>
                                        <td class="text-center"><span
                                                class="badge badge-<?= $badge ?>"> <?= $published ?> </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group-sm">
                                                <button class="btn btn-sm btn-default btn-outline view"
                                                        data-article-id="<?= $article->id ?>"
                                                        data-toggle="modal"
                                                        data-target="#modelArticle">View
                                                </button>
                                                <a href="<?= base_url($action_url) ?>"
                                                   class="btn btn-sm btn-<?= $action_colour ?> btn-outline"><?= $action ?></a>
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

<!-- Model -->
<div class="modal inmodal" id="modelArticle" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-quote-left modal-icon"></i>
                <h4 id="article-modal-title" class="modal-title"></h4>
                <small id="article-modal-title-small"></small>
            </div>
            <form action="<?= base_url('/index.php/articles/update_article') ?>" method="post">
                <input type="text" class="hidden" hidden="hidden" id="article-id" name="article_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Title </label>
                                <input id="article-title" type="text" class="form-control" name="title"
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="body">Content </label>
                               <textarea class="form-control" name="body" id="article-body" cols="30"
                                         rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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

<!-- SUMMERNOTE -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/summernote/summernote.min.js"></script>

<script>
    $(document).ready(function () {
        $('.view').click(function (e) {
            e.preventDefault();
            var articleID = $(this).data('article-id');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/articles/get_single_article/'); ?>",
                data: {
                    article_id: articleID
                }, success: function (data) {
                    $('#article-modal-title').text(data.title);
                    $('#article-modal-title-small').text(data.timestamp.substring(0, 10));
                    $('#article-title').val(data.title);
                    $('#article-body').code(data.body);
                    $('#article-id').val(data.id);
                }
            });
        });

        $('#article-body').summernote(
            {
                height: 250,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null            // set maximum height of editor
            }
        );

        $('#articles-table').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

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
                toastr.success("Article updated successfully");
                break;
            case 3:
                toastr.error("Article update unsuccessfull");
                break;

            default:
                toastr.error("Something wrong happened");
        }

    });
</script>

</body>

</html>
