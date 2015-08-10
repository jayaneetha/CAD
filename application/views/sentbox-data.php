<div class="mail-box-content animated fadeInRight">
    <div class="mail-box-header">
        <h2>
            Sent
        </h2>
    </div>
    <div class="mail-box">
        <div style="padding-left: 20px;padding-right: 20px">
            <table id="sentbox" class="table table-hover table-mail">
                <thead>
                <th>Recipient</th>
                <th>Subject</th>
                <th>Date</th>
                </thead>
                <tbody>
                <?php foreach ($sentbox_messages as $message):?>
                    <tr class="read>">
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