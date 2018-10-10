<?php
$loguser = $this->request->getSession()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight[]|\Cake\Collection\CollectionInterface $flights
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Flight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?></li>
        
         <?php 
            if($loguser['role'] === 'admin') :?> 
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php 
            endif 
        ?>
    </ul>
</nav>
<div class="flights index large-9 medium-8 columns content">
    <h3><?= __('Flights') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passenger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('airport_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('depart') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arrival') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_reservation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flights as $flight): ?>
            <tr>
                <td><?= $this->Number->format($flight->id) ?></td>
                <td><?= $flight->has('user') ? $this->Html->link($flight->user->id, ['controller' => 'Users', 'action' => 'view', $flight->user->id]) : '' ?></td>
                <td><?= $flight->has('passenger') ? $this->Html->link($flight->passenger->name, ['controller' => 'Passengers', 'action' => 'view', $flight->passenger->id]) : '' ?></td>
                <td><?= $flight->has('airport') ? $this->Html->link($flight->airport->name, ['controller' => 'Airports', 'action' => 'view', $flight->airport->id]) : '' ?></td>
                <td><?= h($flight->depart) ?></td>
                <td><?= h($flight->arrival) ?></td>
                <td><?= h($flight->date_reservation) ?></td>
                <td><?= $this->Number->format($flight->created) ?></td>
                <td><?= $this->Number->format($flight->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $flight->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flight->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
