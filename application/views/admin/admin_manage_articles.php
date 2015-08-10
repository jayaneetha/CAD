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

    <?php $this->load->view('partial/admin_navigation'); ?>

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
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>The CAD</td>
                                    <td>There are a lot of under privilege children throughout the ...</td>
                                    <td>28-02-2015</td>
                                    <td class="text-center"><span class="badge badge-primary"> Published </span></td>
                                    <td class="text-center">
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-article-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelArticle">View
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-outline view" data-article-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelArticle">Unpublish
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>What We Do</td>
                                    <td>Being an exemplary social service organization, IMCD ...</td>
                                    <td>28-02-2015</td>
                                    <td class="text-center"><span class="badge badge-danger"> Unpublished </span></td>
                                    <td class="text-center">
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-article-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelArticle">View
                                            </button>
                                            <button class="btn btn-sm btn-primary
                                             btn-outline view" data-article-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelArticle">Publish
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>The IMCD Family</td>
                                    <td>nternational Movement for Community Development (IMCD) is a ...</td>
                                    <td>28-02-2015</td>
                                    <td class="text-center"><span class="badge badge-primary"> Published </span></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-article-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelArticle">View
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-outline view" data-article-id="1"
                                                    data-toggle="modal"
                                                    data-target="#modelArticle">Unpublish
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
<div class="modal inmodal" id="modelArticle" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-quote-left modal-icon"></i>
                <h4 class="modal-title">The IMCD Family</h4>
                <small>28-02-2015</small>
            </div>
            <form action="/" method="post">
                <input type="text" class="hidden" hidden="hidden" id="article_id" name="article_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Title </label>
                                <input type="text" class="form-control" name="title"
                                       value="The IMCD Family"/>
                            </div>
                            <div class="form-group">
                                <label for="body">Content </label>
                               <textarea class="form-control" name="body" id="body" cols="30"
                                         rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores, aut dolor eligendi harum id maiores modi, nam non perferendis quam quas quo quos ratione, reprehenderit sint totam unde voluptatem!</textarea>
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
        $('.edit').click(function (e) {
            e.preventDefault();
            var article = $(this).data('article-id');
            alert(article);
            //console.log(school);
            /*$.ajax({
             type: "POST",
             dataType: 'json',
             url: "
            <?php //echo base_url('administrator/get_single_classroom/'); ?>",
             data: {classroom_id: classroom},
             success: function (data) {
             //console.log(data);
             //console.log(data.total);
             for (var i = 0; i < data.total.length; i++) {
             var school_name = data.total[i].sch_id;
             $("select option").filter(function () {
             //may want to use $.trim in here
             return $(this).val() == school_name;
             }).attr('selected', true);
             $('#classroom_name').val(data.total[i].classroom_name);
             $('#class_teacher_name').val(data.total[i].teacher_name);
             $('#classroom_id').val(data.total[i].classroom_id);
             }
             ;

             }
             });*/


        });

        $('#body').summernote(
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

        var success = <?php echo 'true';?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }

        if (success) {
            toastr.success('Notification');
        }

    });
</script>

</body>

</html>
