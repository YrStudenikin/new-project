<?php

/* @var $this yii\web\View */
/* @var $product Product */


use yii\bootstrap4\Html;
use app\models\Product;
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card text-center">
            <div class="card-header">
                <h1><?=Html::encode($product->title)?></h1>
            </div>
            <div class="card-body">
                <?= Html::img("@web/images/$product->imageUrl", [
                    'alt' => 'image',
                    'style' => ['width' => '200px', 'height' => 'auto'],
                    'class' => 'card-img-top']) ?>
                <div class="card-text">
                    <?= substr($product->description, 0, 50). '...' ?>
                </div>
                <div>Цена: <?=$product->price?>р.</div>
            </div>
            <?= Html::a('Изменить', ["product/update", 'id' => $product->id], ['class'=>'btn btn-primary']) ?>
            <?= Html::a('Удалить', ["product/delete", 'id' => $product->id], ['class'=>'btn btn-primary']) ?>
        </div>
    </div>
</div>


