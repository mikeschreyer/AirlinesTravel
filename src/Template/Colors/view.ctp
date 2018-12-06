<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Color $color
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Colors'), ['action' => 'edit', $color->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Colors'), ['action' => 'delete', $color->id], ['confirm' => __('Are you sure you want to delete # {0}?', $color->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Colors'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="color view large-9 medium-8 columns content">
    <h3><?= h($color->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Colors') ?></th>
            <td><?= h($color->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($color->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modele Id') ?></th>
            <td><?= $this->Number->format($color->modele_id) ?></td>
        </tr>
    </table>
</div>
