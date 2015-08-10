<div class="mail-box-content animated fadeInRight">
    <div class="mail-box-header">
        <h2>
            Inbox
        </h2>
    </div>
    <div class="mail-box">
        <div style="padding-left: 20px;padding-right: 20px">
            <table id="inbox" class="table table-hover table-mail">
                <thead>
                <th>Sender</th>
                <th>Subject</th>
                <th>Date</th>
                </thead>
                <tbody>
                <?php foreach ($inbox_messages as $message):
                    $class = "";
                    if ($message->read == 0) {
                        $class = "unread";
                    } else {
                        $class = "read";
                    }
                    ?>

                    <tr class="<?= $class ?>">
                        <td data-message-id="<?= $message->id ?>" class="mail-contact"><?= $message->first_name . " " . $message->last_name ?></td>
                        <td data-message-id="<?= $message->id ?>" class="mail-subject"><?= $message->subject ?></td>
                        <td class="text-right mail-date"><?= $message->timestamp ?></td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>