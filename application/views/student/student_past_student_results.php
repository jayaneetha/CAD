<?php $this->load->view('partial/header'); ?>
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
                <h2><span class="fa fa-newspaper-o"></span> Past Results</h2>
                <ol class="breadcrumb">
                    <li>
                        Results
                    </li>
                    <li class="active">
                        <strong>Past Results</strong>

                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                <div class="title-action">
                    <form target="_blank" class="form-inline m-sm"
                          action="<?= base_url('/index.php/reports/student_results/past/print') ?>"
                          method="post">
                        <input hidden="hidden" type="text" class="hidden input-sm form-control" name="stc_id"
                               value="<?= $stc->id ?>"/>

                        <div class="form-group m-l-sm pull-right">
                            <button type="submit" class="btn btn-primary btn-outline"><i
                                    class="fa fa-print"></i> Print Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="wrapper white-bg row">
            <div class="col-sm-12">
                <form class="form-inline m-sm" action="<?= base_url('/index.php/reports/student_results/past') ?>"
                      method="post">
                    <div class="form-group">
                        <label>Select Examination: </label>
                        <select class="form-control" name="stc_id" id="stc-id">
                            <?php foreach ($stc_list as $stc_element): ?>
                                <option
                                    value="<?= $stc_element->id ?>"><?= $stc_element->year . "-" . $stc_element->month . " (Term $stc_element->term)" ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group m-l-sm pull-right">
                        <button type="submit" class="btn btn-success btn-outline pull-right ">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated bounceIn">
                    <?php $this->load->view('student/student_student_result_data'); ?>
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

<!-- Data picker -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

    });

</script>
</body>

</html>
