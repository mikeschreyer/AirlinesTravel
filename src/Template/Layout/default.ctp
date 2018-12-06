<?php
$loguser = $this->request->getSession()->read('Auth.User');
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?php
        echo $this->Html->css([
            'base.css',
            'style.css',
            'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        ]);
        ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

        <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js',
            'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
                ], ['block' => 'scriptLibraries']
        );
        ?>
    </head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
             <li class="Apropos">
                                <h1> <?php echo $this->Html->link(__('A propos'), ['controller' => 'Apropos', 'action' => 'index']) ?></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
             <li>
                                    <?php
                                    $loguser = $this->request->session()->read('Auth.User');
                                    if ($loguser) {
                                        $user = $loguser['username'];
                                        echo $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]);
                                        ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
                                    </li>
                                    <?php
                                } else {
                                    echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']);
                                }
                                ?>
            <li><?=
                   $this->Html->link('Listes dynamiques', [
                   'controller' => 'Flights',
                   'action' => 'add'
                   ]);
                   ?>

                   </li>
                   <li><?=
                   $this->Html->link('Autocomplete', [
                   'controller' => 'Airports',
                   'action' => 'autocomplete'
                   ]);
                   ?>
                </li>


                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
    <?= $this->fetch('script'); ?>
    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
