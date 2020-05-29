<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
?>

<div class="row">
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'title') ?>

                <?= $form->field($model, 'price') ?>

                <?= $form->field($model, 'description')
                    ->textarea ( ['rows'=> 6] ) ?>

                 <?= $form->field($model, 'file')->fileInput()->label(false)?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>




