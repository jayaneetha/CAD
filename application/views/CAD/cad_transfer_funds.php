<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
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
                <h2><span class="fa fa-dollar"></span> Transfer Funds</h2>
                <ol class="breadcrumb">
                    <li>
                        Funds
                    </li>
                    <li class="active">
                        <strong>Transfer Funds</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Pending Transfers</h5>

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
                                    <th>Student Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Transaction No.</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($funds as $fund): ?>
                                    <tr>
                                        <td><?= $fund->first_name . " " . $fund->last_name ?></td>
                                        <td>Rs. <?= $fund->amount ?></td>
                                        <td><?= substr($fund->timestamp, 0, 10) ?> </td>
                                        <td><?= $fund->transaction_no ?></td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-sm btn-default btn-outline view"
                                                        data-fund-id="<?= $fund->id ?>"
                                                        data-toggle="modal"
                                                        data-target="#modalFund">View
                                                </button>
                                                <button type="button" class="btn btn-sm btn-success btn-outline transfer"
                                                        data-fund-id="<?= $fund->id ?>"
                                                        data-toggle="modal" data-target="#modalTransfer">Transfer
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

<!-- Fund Modal -->
<?php $this->load->view('partial/modals/fund'); ?>


<div class="modal inmodal fade" id="modalTransfer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-dollar modal-icon"></i>
                <h4 class="modal-title">Transfer Fund</h4>
            </div>
            <form action="<?= base_url('/index.php/funds/transfer_fund') ?>" method="post">
                <input type="text" class="hidden" hidden="hidden" name="fund_id" id="transfer-fund-id"/>

                <div class="modal-body">
                    <h4 class="text-center text-success">Do you really want to transfer the Fund? </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Transfer Fund</button>
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

<script>
    $(document).ready(function () {
        $('.view').click(function (e) {
            e.preventDefault();
            var fundID = $(this).data('fund-id');
            $('input').val("");
            $('textarea').val("");
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/funds/get_single_fund/'); ?>",
                data: {
                    fund_id: fundID
                }, success: function (data) {
                    $('#fund-id').val(data.id);
                    $('#donor-name').val(data.first_name + " " + data.last_name);
                    $('#amount').val(data.amount);
                    $('#transaction-no').val(data.transaction_no);
                    $('#date-time').val(data.timestamp);
                    $('#description').val(data.description);
                }
            });

        });

        $('.transfer').click(function (e) {
            e.preventDefault();
            var fundID = $(this).data('fund-id');
            $('input').val("");
            $('#transfer-fund-id').val(fundID);
        });

        $('.dataTables-example').dataTable({
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
                toastr.success("Successfully Transferred");
                break;
            default:
                toastr.error("Something wrong happened");
        }

    })
    ;
</script>

</body>

</html>
