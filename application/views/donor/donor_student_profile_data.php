<script type="text/javascript">
    $(function () {
        Morris.Line({
            element: 'student-overall-performance',
            data: [
                <?php foreach ($marks as $mark ){
                echo "{y: '$mark->year-$mark->month', " . str_replace(" ", "",$mark->subject_name) . ": $mark->mark }," ;
                }?>
            ],
            xkey: 'y',
            ykeys: [
                <?php foreach($subjects as $subject){
                echo "'" . str_replace(" ", "",$subject->subject_name) ."',";
                } ?>
            ],
            labels: [
                <?php foreach($subjects as $subject){
                echo "'" . $subject->subject_name ."',";
                } ?>],
        })
        ;

    })
    ;
</script>