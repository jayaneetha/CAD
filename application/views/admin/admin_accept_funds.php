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
                <h2><span class="fa fa-dollar"></span> Accept Incoming Funds</h2>
                <ol class="breadcrumb">
                    <li>
                        Funds
                    </li>
                    <li class="active">
                        <strong>Accept Funds</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
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
                                    <th>Donor Name</th>
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
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-sm btn-default view"
                                                        data-fund-id="<?= $fund->id ?>"
                                                        data-toggle="modal"
                                                        data-target="#modalAcceptFund">View
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger reject"
                                                        data-fund-id="<?= $fund->id ?>"
                                                        data-toggle="modal" data-target="#modalReject">Reject
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

<!-- Accept Fund Modal -->
<div class="modal inmodal" id="modalAcceptFund" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-dollar modal-icon"></i>
                <h4 class="modal-title">Accept Fund</h4>
            </div>
            <form action="<?= base_url('/index.php/funds/accept_fund') ?>" method="post">
                <input type="text" class="hidden" hidden="hidden" id="fund-id" name="fund_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control disabled" disabled name="name" id="name"
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount </label>
                                <input type="text" name="amount" class="form-control disabled" disabled id="amount"
                                       value=""/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="transaction_no">Transaction No. </label>
                                <input type="text" name="transaction_no" id="transaction-no"
                                       class="form-control disabled" disabled
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="date_time">Date/Time </label>
                                <input type="text" name="date_time" id="date-time" class="form-control disabled"
                                       disabled
                                       value=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea disabled class="form-control disabled" name="description" id="description"
                                      cols="30" rows="4"></textarea>
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


<div class="modal inmodal fade" id="modalReject" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-dollar modal-icon"></i>
                <h4 class="modal-title">Reject Fund</h4>
            </div>
            <form action="<?= base_url('/index.php/funds/reject_fund') ?>" method="post">
                <input type="text" class="hidden" hidden="hidden" name="fund_id" id="reject-fund-id"/>

                <div class="modal-body">
                    <h4 class="text-center text-danger">Do you really want to reject the Fund? </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Reject Fund</button>
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
                url: "<?php echo base_url('funds/get_single_fund/'); ?>",
                data: {
                    fund_id: fundID
                }, success: function (data) {
                    $('#fund-id').val(data.id);
                    $('#name').val(data.first_name + " " + data.last_name);
                    $('#amount').val(data.amount);
                    $('#transaction-no').val(data.transaction_no);
                    $('#date-time').val(data.timestamp);
                    $('#description').val(data.description);
                }
            });

        });

        $('.reject').click(function (e) {
            e.preventDefault();
            var fundID = $(this).data('fund-id');
            $('input').val("");
            $('#reject-fund-id').val(fundID);
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
            case 2:
                toastr.success("Successfully rejected");
                break;
            default:
                toastr.error("Something wrong happened");
        }

    })
    ;
</script>

</body>

</html>
