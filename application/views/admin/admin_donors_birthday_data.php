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
                <h4 style="font-weight: bold">Donors Birthday List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive m-t">
                <table class="table">
                    <thead>
                    <tr>
                        <th  class="text-center">Name</th>
                        <th  class="text-center">Birthday</th>
                        <th  class="text-center">Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($DOB_list as $DOB): ?>

                        <tr>
                            <td class="text-center"><strong><?= $DOB->first_name . " " . $DOB->last_name ?></strong></td>
                            <td class="text-center"><?= $DOB->DOB ?></td>
                            <td><?= $DOB->address_1 . ', ' . $DOB->address_2 . ', ' . $DOB->city . ', ' . $DOB->country ?></td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php $this->load->view('partial/report_footer');?>

    <div class="pull-right">Created at: <?= $now ?></div>
</div>