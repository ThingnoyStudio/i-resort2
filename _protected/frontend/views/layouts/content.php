<?php

use yii\widgets\Breadcrumbs;
use yii2mod\alert\Alert;

//use dmstr\widgets\Alert;

?>
<div class="section">
    <div class="container">
        <section class="content-header">
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

            <?= Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
            ) ?>
        </section>

        <section class="mycontent">
            <!--            <= Alert::widget() ?>-->
            <?= $content ?>
        </section>
    </div>

</div>

<!--Sweet Alert-->
<?php if (Yii::$app->getSession()->hasFlash('Oops')): ?>
    <?= \yii2mod\alert\Alert::widget([
        'useSessionFlash' => false,
        'options' => [
//                                'icon' => "warning",
            'timer' => null,
            'type' => \yii\helpers\ArrayHelper::getValue(Yii::$app->getSession()->getFlash('Oops'), 'type'),
//                            'type' => \yii2mod\alert\Alert::TYPE_INPUT,
            'title' => "แจ้งเตือน!",
            'text' => \yii\helpers\ArrayHelper::getValue(Yii::$app->getSession()->getFlash('Oops'), 'body'),
            'confirmButtonText' => "ตกลง",
            'closeOnConfirm' => true,
//                            'showCancelButton' => true,
            'animation' => "slide-from-top",
//                            'inputPlaceholder' => "Write something"
        ],]) ?>

<?php endif; ?>


<footer class="footer footer-default">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="#">
                        I-Resort
                    </a>
                </li>
                <li>
                    <a href="#">
                        About Us
                    </a>
                </li>
                <!--                    <li>-->
                <!--                        <a href="http://blog.creative-tim.com">-->
                <!--                            Blog-->
                <!--                        </a>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md">-->
                <!--                            MIT License-->
                <!--                        </a>-->
                <!--                    </li>-->
            </ul>
        </nav>
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            , Designed by
            <a href="#" target="">I-Resort Team</a>
            <!--                <a href="#" target="_blank">Creative Tim</a>.-->
        </div>
    </div>
</footer>
