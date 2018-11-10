<div class="airports view large-9 medium-8 columns content">
    <h3><?= h($airport->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('name') ?></th>
            <td><?= h($airport->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($airport->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($airport->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Flights for this passenger') ?></h4>
        <?php if (!empty($airport->flights)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('user_id') ?></th>
                <th scope="col"><?= __('passenger_id') ?></th>
                <th scope="col"><?= __('airport_id') ?></th>
                <th scope="col"><?= __('Date depart') ?></th>
                <th scope="col"><?= __('Date arriver') ?></th>
                <th scope="col"><?= __('Date reservation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
            </tr>
            <?php foreach ($airport->flights as $flights): ?>
            <tr>
                <td><?= h($flights->user_id) ?></td>
                <td><?= h($flights->passenger_id) ?></td>
                <td><?= h($flights->airport_id) ?></td>
                <td><?= h($flights->depart) ?></td>
                <td><?= h($flights->arrival) ?></td>
                <td><?= h($flights->date_reservation) ?></td>
                <td><?= h($flights->created) ?></td>
                <td><?= h($flights->modified) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
