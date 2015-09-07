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
                <h4 style="font-weight: bold">Fund Summary Report</h4>
                <label>From: <?= $start ?> To: <?= $end ?></label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="table-responsive m-t">
                <table class="table">
                    <tbody>
                    <tr>
                        <td style="width: 70%" class="text-right"><strong>Total No. Transactions :</strong></td>
                        <td style="width: 30%"><?= count($funds_all) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 70%" class="text-right"><strong>Total No. Accepted Transactions :</strong>
                        </td>
                        <td style="width: 30%"><?= count($funds_accepted) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 70%" class="text-right"><strong>Total No. Transferred Transactions :</strong>
                        </td>
                        <td style="width: 30%"><?= count($funds_transferred) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="table-responsive m-t">
                <table class="table">
                    <tbody>
                    <tr>
                        <td style="width: 70%" class="text-right"><strong>Total Amount :</strong></td>
                        <td style="width: 30%">Rs. <?= get_sum($funds_all) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 70%" class="text-right"><strong>Total Accepted Amount :</strong>
                        </td>
                        <td style="width: 30%">Rs. <?= get_sum($funds_accepted) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 70%" class="text-right"><strong>Total Transferred Amount :</strong>
                        </td>
                        <td style="width: 30%">Rs. <?= get_sum($funds_transferred) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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