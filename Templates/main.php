<?php
$title = "Главная страница";
include_once "header.php";
?>
<main class="wrapper">
    <section class="form">
        <form action="addFeedback" id="_form" class="form__body" method="post" novalidate>
            <h1 class="form__title">Оставить отзыв</h1>
            <div class="form__item">
                <label for="formName" class="form__label">Имя*</label>
                <input type="text" id="formName" class="form__input _name" name="name" required max="30">
            </div>
            <div class="form__item">
                <label for="formEmail" class="form__label">Email*</label>
                <input type="email" id="formEmail" class="form__input _email" name="email" required max="30">
            </div>
            <div class="form__item">
                <label for="formMessage" class="form__label">Отзыв*</label>
                <textarea name="text" id="formMessage" class="form__input _text" required minlength="5"></textarea>
            </div>
            <button type="submit" class="form__button">Отправить</button>
            <span class="error _error" aria-live="polite"></span>
        </form>
    </section>
</main>

<?php /** @var array $params */
foreach($params['models'] as $model){ ?>
    <section class="feedbacks">
        <div class="feedback">
            <div class="feedback__body">
                <div class="feedback__row">
                    <h3 class="feedback__name"><?= $model->author ?></h3>
                    <h3 class="feedback__email"><?= $model->email ?></h3>
                </div>
                <div class="feedback__text">
                    <p>
                        <?= $model->text ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<?php include_once "footer.php" ?>
