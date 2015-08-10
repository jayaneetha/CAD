<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/donor_navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-dollar"></span> Fund Status</h2>
                <ol class="breadcrumb">
                    <li>
                        Funds
                    </li>
                    <li class="active">
                        <strong>Fund Status</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Accepted Funds </h5>

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
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Date Added</th>
                                    <th>Amount</th>
                                    <th>Transaction No.</th>
                                    <th>Transferred</th>
                                    <th>Transfer Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2015-04-23</td>
                                    <td>Rs. 2500.00</td>
                                    <td>33918200282-287292</td>
                                    <td class="text-center"><label class="label label-danger">Not Transferred</label>
                                    </td>
                                    <td class="text-center"> -</td>
                                </tr>
                                <tr>
                                    <td>2015-04-23</td>
                                    <td>Rs. 2500.00</td>
                                    <td>33918200282-287292</td>
                                    <td class="text-center"><label class="label label-danger">Not Transferred</label>
                                    </td>
                                    <td class="text-center"> -</td>
                                </tr>
                                <tr>
                                    <td>2015-04-23</td>
                                    <td>Rs. 2500.00</td>
                                    <td>33918200282-287292</td>
                                    <td class="text-center"><label class="label label-success">Transferred</label>
                                    </td>
                                    <td class="text-center"> 2015-05-23</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Pending Funds </h5>

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
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Date Added</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Transaction No.</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2015-04-23</td>
                                    <td>Rs. 2500.00</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                    <td>33918200282-287292</td>
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
<div class="modal inmodal" id="edit-model" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-dollar modal-icon"></i>
                <h4 class="modal-title">Accept Fund</h4>
            </div>
            <form action="/" method="post">
                <input type="text" class="hidden" hidden="hidden" id="fund_id" name="fund_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control disabled" disabled name="name" id="name"
                                       value="D.M Perera"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Amount </label>
                                <input type="text" name="amount" class="form-control disabled" disabled id="amount"
                                       value="Rs. 2500.00"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="transaction_no">Transaction No. </label>
                                <input type="text" name="transaction_no" id="transaction_no"
                                       class="form-control disabled" disabled
                                       value="33918200282-287292"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Date/Time </label>
                                <input type="text" name="date_time" id="date_time" class="form-control disabled"
                                       disabled
                                       value="2015-07-23 07:34 PM"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Accept Fund</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal inmodal fade" id="reject_fund" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-dollar modal-icon"></i>
                <h4 class="modal-title">Reject Fund</h4>
            </div>
            <div class="modal-body">
                <h4 class="text-center text-danger">Do you really want to reject the Fund? </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-danger">Reject Fund</a>
            </div>
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

<script>
    $(document).ready(function () {
        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

    });
</script>

</body>

</html>
