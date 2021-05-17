<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title)? $title : ""; ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?php echo isset($Student)? $Student : ""; ?></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?= $this->Html->link("Logout","/Users/logout",["class"=>"btn btn-info pull-right","style"=>"margin-top:-6px;"]);
?></li>
				<li><?= $this->Html->link("Create","/Courses/create",["class"=>"btn btn-info pull-right","style"=>"margin-top:-6px;"]);
?></li>
				<li><?= $this->Html->link("Index","/login/index",["class"=>"btn btn-info pull-right","style"=>"margin-top:-6px;"]);
?></li>
                
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>

</html>
