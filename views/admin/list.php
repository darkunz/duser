<div class="span12">
    <h2>Users</h2>
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => '{items}',
    'columns' => array(
        array(
            'name' => 'id', 'header' => '#',
            'htmlOptions' => array(
                'style' => 'width:30px',
            )
        ),
        array(
            'name' => 'username', 'header' => 'Username',
        ),
        array(
            'name' => 'lastLogin', 'header' => 'Last Login',
        ),
        array(
            'class' => 'application.widgets.ButtonsColumn',
        )
    )
)) ?>
</div>
<div class="span12">
    <a href="<?= $this->createUrl('create') ?>" class="btn">Create</a>
</div>