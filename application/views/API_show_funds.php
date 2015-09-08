<html>
<head>
    <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table class="table table-bordered" width="100%">
    <thead>
    <tr>
        <th>Amount</th>
        <th>Description</th>
        <th>Date</th>
        <th>Accepted</th>
        <th>Transferred</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $fund):
        if($fund->accepted ==1){
            $accepted = "Accepted";
        }else{
            $accepted = "Not Accepted";
        }
        if($fund->transferred ==1){
            $transferred = "Transferred";
        }else{
            $transferred = "Not Transferred";
        }
        ?>
    <tr>
        <td><?=$fund->amount?></td>
        <td><?=$fund->description?></td>
        <td><?=substr($fund->timestamp,0,10)?></td>
        <td><?=$accepted?></td>
        <td><?=$transferred?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
</body>
</html>