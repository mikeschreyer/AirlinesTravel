<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Modele",
    "action" => "getModele",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Flights/add', ['block' => 'scriptBottom']);
?>
<?php
$this->start('tb_actions');
?>
      <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?></li>
<?php
$this->end();
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



<div class="flights form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="modeleController">


    <?= $this->Form->create($flight) ?>
    <fieldset>
        <legend><?= __('Add Flights') ?></legend>
        <div>
            Modeles:
            <select name="Modele_id"
                    id="modele-id"
                    ng-model="unModele"
                    ng-options="unModele.name for unModele in modele track by unModele.id">
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            Colors:
            <select name="color_id"
                    id="color-id"
                    ng-model="color"
                    ng-disabled="!unModele"
                    ng-options="color.color for color in unModele.colors track by color.id">
                <option value=''>Select</option>
            </select>
        </div>
        <?php
        echo $this->Form->control('passenger', ['options' => $passengers]);
        echo $this->Form->control('airport');
        echo $this->Form->control('depart');
        echo $this->Form->control('arrival');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save Flight')) ?>
    <?= $this->Form->end() ?>
</div>


