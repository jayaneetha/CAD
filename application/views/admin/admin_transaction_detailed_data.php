<div class="ibox-content p-xl">
    <div class="row">
        <div class="col-sm-8">
            <address class="text-center">
                <h3>&quot;Colour A Dream&quot; Project</h3>
                <strong>International Movement for Community Development</strong><br>
                15, Maya Mawatha<br>
                Nawinna, Maharagama<br>
                <abbr title="Phone">P:</abbr> (071) 630-4052
            </address>
        </div>
        <div class="com-sm-4 text-right">
            <h3>&nbsp;</h3>
            <div class="m-r-lg">
                <h4 style="font-weight: bold">Transaction Detailed Report</h4>
                <label>From: <?= $from ?> To: <?= $to ?></label>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="table-responsive m-t">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Donor</th>
                <th>Amount</th>
                <th>Transaction No.</th>
                <th class="text-center">Accepted</th>
                <th class="text-center">Transferred</th>
                <th class="text-center">Transfer Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction->date ?></td>
                    <td><?= $transaction->donor ?></td>
                    <td><?= $transaction->amount ?></td>
                    <td><?= $transaction->transaction_no ?></td>
                    <td class="text-center"><span class="badge badge-primary"><?= $transaction->accepted ?></span></td>
                    <td class="text-center"><span class="badge badge-primary"><?= $transaction->transfered ?></span></td>
                    <td class="text-center"><span class="badge badge-primary"><?= $transaction->transfer_date ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /table-responsive -->

    <table class="table invoice-total">
        <tbody>
        <tr>
            <td><strong>Total Accepted :</strong></td>
            <td><?= $total_accepted ?></td>
        </tr>
        <tr>
            <td><strong>Total Transferred :</strong></td>
            <td><?= $total_transferred ?></td>
        </tr>
        </tbody>
    </table>
    <div class="well m-t">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam assumenda ex
        harum numquam omnis optio quis! A aliquam, architecto eos ipsam nam nisi nostrum quidem, quo
        ut veniam veritatis.
    </div>
    <div class="pull-right">Created at: <?= $timesatamp ?></div>
</div>