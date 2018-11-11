<?php
$urlToAirportsAutocompleteJson = $this->Url->build([
    "controller" => "Airports",
    "action" => "findAirports",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToAirportsAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Airports/autocomplete', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Airport'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Airports') ?>
<fieldset>
    <legend><?= __('Search Airport') ?></legend>
    <?php
    echo $this->Form->input('airport', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>
