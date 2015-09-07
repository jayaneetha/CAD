<div class="ibox-content p-xl">
    <div class="row">
        <div class="col-sm-6">
            <h5>From:</h5>
            <address>
                <strong>International Movement for Community Development</strong><br>
                15, Maya Mawatha<br>
                Nawinna, Maharagama<br>
                <abbr title="Phone">P:</abbr> (071) 630-4052
            </address>
        </div>

        <div class="col-sm-6 text-right">
            <h4>Receipt No.</h4>
            <h4 class="text-navy"><?= $receipt->receipt_type . "-" . $receipt->id ?></h4>
            <span>To:</span>
            <address>
                <strong><?= $receiver->first_name . " " . $receiver->last_name ?></strong><br>
                <?= $receiver->address_1 . " " . $receiver->address_2 ?><br>
                <?= $receiver->city . " " . $receiver->country ?><br>
                <abbr title="Phone">P:</abbr> <?= $receiver->contact_no ?>
            </address>
            <p>
                <span><strong>Receipt Date:</strong> <?= substr($receipt->date, 0, 10) ?></span><br/>
            </p>
        </div>
    </div>

    <div class="table-responsive m-t">
        <table class="table invoice-table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div><strong>Donor Payment</strong></div>
                    <small><?= $transaction->description ?></small>
                </td>
                <td>Rs.<?= $transaction->amount ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- /table-responsive -->

    <table class="table invoice-total">
        <tbody>
        <tr>
            <td><strong>Sub Total :</strong></td>
            <td>Rs.<?= $receipt->total ?> </td>
        </tr>
        <tr>
            <td><strong>TOTAL :</strong></td>
            <td>Rs.<?= $receipt->total ?></td>
        </tr>
        </tbody>
    </table>
   <?php $this->load->view('partial/report_footer');?>
</div>