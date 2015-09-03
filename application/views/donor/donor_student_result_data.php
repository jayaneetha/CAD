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
                <h4 style="font-weight: bold">Student Results Report</h4>
                <label>Student: <?= $student->first_name . " " . $student->last_name ?></label><br/>
                <label>Examination: <?= $stc->year . "-" . $stc->month . " (Term $stc->term)" ?></label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive m-t">
                <table class="table table-striped table-bordered table-hover dataTables-subjects">
                    <thead>
                    <tr>
                        <th class="text-center">Subject</th>
                        <th class="text-center">Mark</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($marks as $mark): ?>
                        <tr>
                            <td class="text-center"><?= $mark->subject_name ?></td>
                            <td class="text-center"><?= $mark->mark ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="well m-t">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam assumenda ex
        harum numquam omnis optio quis! A aliquam, architecto eos ipsam nam nisi nostrum quidem, quo
        ut veniam veritatis.
    </div>
    <div class="pull-right">Created at: <?= $now ?></div>
</div>