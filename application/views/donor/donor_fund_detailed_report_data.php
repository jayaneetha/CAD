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
                <h4 style="font-weight: bold">Fund Detailed Report</h4>
                <label>From: <?= $start ?> To: <?= $end ?></label>
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
                <th>Amount</th>
                <th>Transaction No.</th>
                <th class="text-center">Accepted</th>
                <th class="text-center">Transferred</th>
                <th class="text-center">Transfer Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($funds_all as $transaction):

                if ($transaction->accepted == 1) {
                    $accepted = "Accepted";
                    $accepted_colour = "primary";
                } else {
                    $accepted = "Not Accepted";
                    $accepted_colour = "danger";
                }

                if ($transaction->transferred == 1) {
                    $transferred = 'Transferred';
                    $transferred_colour = 'primary';
                    $transferred_date = $transaction->transfer_timestamp;
                } else {
                    $transferred = 'Not Transferred';
                    $transferred_colour = 'danger';
                    $transferred_date = "-";
                }
                ?>
                <tr>
                    <td><?= $transaction->timestamp ?></td>
                    <td><?= $transaction->amount ?></td>
                    <td><?= $transaction->transaction_no ?></td>
                    <td class="text-center"><span class="badge badge-<?= $accepted_colour ?>"><?= $accepted ?></span></td>
                    <td class="text-center"><span class="badge badge-<?= $transferred_colour ?>"><?= $transferred ?></span>
                    </td>
                    <td class="text-center"><span class="badge badge-white"><?= $transferred_date ?></span>
                    </td>
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
            <td><?= get_sum($funds_accepted) ?></td>
        </tr>
        <tr>
            <td><strong>Total Transferred :</strong></td>
            <td><?= get_sum($funds_transferred) ?></td>
        </tr>
        </tbody>
    </table>
    <?php $this->load->view('partial/report_footer');?>

    <div class="pull-right">Created at: <?= $now ?></div>
</div>

<?php
function get_sum($array, $field_name = 'amount')
{
    $sum = 0;
    foreach ($array as $element) {
        $sum = $sum + $element->$field_name;
    }
    return $sum;
}

?>