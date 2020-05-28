<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $productTypes array */
?>

<div class="row">
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'title') ?>

                <?= $form->field($model, 'price') ?>

                <?= $form->field($model, 'description')
                    ->textarea ( ['rows'=> 6] ) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>




