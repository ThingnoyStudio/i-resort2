<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content" id="mycontent" style="margin-top: 40px;">
    <section class="content-header" >
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1 style="display: none;"><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1 style="display: none;">
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="footer">
    <!-- <div class="pull-right hidden-xs" style="margin-right: 12px;">
        <b>Version</b> 2.0
    </div>
    <strong style="margin-left: 12px;">Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved. -->
</footer>
