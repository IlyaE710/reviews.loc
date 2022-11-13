<?php
$title = "Главная страница";
include_once "header.php";
?>
<section class="contact__from">
    <div class="contact__wrapper">
        <form action="action" name="send-review" method="post">
            <div class="form__input">
                <p>Name <span class="red">*</span><input name="name" type="text"></p>
                <p>Email address <span class="red">*</span><input name="email" type="text"></p>
            </div>
            <p>Message <span class="red">*</span></p>
            <textarea name="text"></textarea>
            <div class="button__block">
                <button type="submit">SEND</button>
            </div>
        </form>
    </div>
</section>

<section class="feedback">
    <div class="feedback__wrapper">
        <div class="feedback__data">
            <p>NAME</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint delectus recusandae nesciunt debitis ipsa nostrum non perferendis excepturi. Hic temporibus sapiente, amet sed tempora provident tempore! Veritatis rerum dicta minus!</p>
    </div>
</section>
<?php foreach($params['data'] as $param){ ?>
<section class="feedback">
    <div class="feedback__wrapper">
        <div class="feedback__data">
            <p><?= $param["author"]; ?></p>
        </div>
        <p><?= $param["text"]; ?></p>
    </div>
</section>
<?php } ?>
<?php include_once "footer.php" ?>
