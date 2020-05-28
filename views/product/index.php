<?php

/* @var $this yii\web\View */
/* @var $products Product[] */

use app\models\Product;
use yii\bootstrap4\Html;


?>

<main class="catalog">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?= Html::a('Добавить товар', ["product/create"], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
        <div class="row">
            <?php if (count($products) > 0) :?>
                <?php foreach ($products as $key => $product): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <?= Html::a($product->title, ["product/details", 'id' => $product->id]) ?>
                            </div>
                            <?= Html::img("@web/images/$product->imageUrl", [
                                'alt' => 'image',
                                'style' => ['width' => '200px', 'height' => 'auto'],
                                'class' => 'card-img-top']) ?>
                            <div class="card-body">
                                <div class="card-text">
                                    <?= substr($product->description, 0, 50). '...' ?>
                                </div>
                                <div>Цена: <?=$product->price?>р.</div>
                            </div>
                            <?= Html::a('Изменить', ["product/update", 'id' => $product->id],
                                ['class'=>'btn btn-primary']) ?>
                            <?= Html::a('Удалить', ["product/delete", 'id' => $product->id],
                                ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div>Список пуст</div>
            <?php endif; ?>
        </div>
    </div>
</main>
