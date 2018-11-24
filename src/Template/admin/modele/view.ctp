<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit modele'), ['action' => 'edit', $modele->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete modele'), ['action' => 'delete', $modele->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modele->id)]) ?> </li>
<li><?= $this->Html->link(__('List modele'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New modele'), ['action' => 'add']) ?> </li>
<li><?=
    $this->Html->link('Section publique en JS', [
        'prefix' => false,
        'controller' => 'modele',
        'action' => 'index'
    ]);
    ?>
</li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($modele->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($modele->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($modele->id) ?></td>
        </tr>
    </table>
</div>

