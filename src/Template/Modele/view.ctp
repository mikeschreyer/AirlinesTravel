<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\modele $modele
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit modele'), ['action' => 'edit', $modele->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete modele'), ['action' => 'delete', $modele->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modele->id)]) ?> </li>
        <li><?= $this->Html->link(__('List modele'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New modele'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modele view large-9 medium-8 columns content">
    <h3><?= h($modele->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($modele->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modele->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($modele->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($modele->modified) ?></td>
        </tr>
    </table>
</div>
