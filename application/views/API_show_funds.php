<html>
<body>
<table width="100%">
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
</body>
</html>