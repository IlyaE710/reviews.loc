<?php
$title = "Главная страница";
include_once "header.php";
?>
<div class="wrapper">
    <div class="form">
        <form action="addFeedback" method="post" id="_form" class="form__body">
            <h1 class="form__title">Оставить отзыв</h1>
            <div class="form__item">
                <label for="formName" class="form__label">Имя*</label>
                <input type="text" id="formName" class="form__input _req _name" name="name">
            </div>
            <div class="form__item">
                <label for="formEmail" class="form__label">Email*</label>
                <input type="text" id="formEmail" class="form__input _req _email" name="email">
            </div>
            <div class="form__item">
                <label for="formMessage" class="form__label">Отзыв</label>
                <textarea name="text" id="formMessage" class="form__input _req _text"></textarea>
            </div>
            <button type="submit" class="form__button">Отправить</button>
        </form>
    </div>
</div>

<?php /** @var array $params */
foreach($params['models'] as $model){ ?>
<section class="feedback">
    <div class="feedback__wrapper">
        <div class="feedback__data">
            <p><?= $model->author; ?></p>
        </div>
        <p><?= $model->text; ?></p>
        <p><?= $model->email; ?></p>
    </div>
</section>
<?php } ?>
<?php include_once "footer.php" ?>
