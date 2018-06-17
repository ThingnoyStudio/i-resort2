<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('appRoot', '/'.basename(dirname(dirname(dirname(__DIR__)))));





Yii::setAlias('appRoot1', (dirname(dirname(dirname(__FILE__)))));//for upload

Yii::setAlias('appRoot2', (dirname(dirname(dirname(dirname(__FILE__))))));//for upload
Yii::setAlias('appRoot3', '/'.basename(dirname(dirname(dirname(dirname(__FILE__))))));//for show