<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Passenger $passenger
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passenger'), ['action' => 'edit', $passenger->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passenger'), ['action' => 'delete', $passenger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passengers view large-9 medium-8 columns content">
    <h3><?= h($passenger->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($passenger->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($passenger->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($passenger->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($passenger->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($passenger->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($passenger->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($passenger->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($passenger->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Flights') ?></h4>
        <?php if (!empty($passenger->flights)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Passenger Id') ?></th>
                <th scope="col"><?= __('Airport Id') ?></th>
                <th scope="col"><?= __('Depart') ?></th>
                <th scope="col"><?= __('Arrival') ?></th>
                <th scope="col"><?= __('Date Reservation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($passenger->flights as $flights): ?>
            <tr>
                <td><?= h($flights->id) ?></td>
                <td><?= h($flights->user_id) ?></td>
                <td><?= h($flights->passenger_id) ?></td>
                <td><?= h($flights->airport_id) ?></td>
                <td><?= h($flights->depart) ?></td>
                <td><?= h($flights->arrival) ?></td>
                <td><?= h($flights->date_reservation) ?></td>
                <td><?= h($flights->created) ?></td>
                <td><?= h($flights->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Flights', 'action' => 'view', $flights->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Flights', 'action' => 'edit', $flights->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Flights', 'action' => 'delete', $flights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flights->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
