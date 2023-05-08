<?php
/** @var App\Controller\FaQ\FaqController $FaQ */
?>

<?php include __DIR__ . '/../Fragment/header.php' ?>

    <h1>FAQ</h1>
    <hr>
    <h6><?= $FaQ['id']; ?></h6>
    <h6><?= $FaQ['created_at']; ?></h6>
    <h2><?= $FaQ['content_question']; ?></h2>
    <h2><?= $FaQ['content_answer']; ?></h2>
    <hr>

<!--    <form method="post" action="/FaQ/Question">-->
<!--        <div>-->
<!--        <textarea name="content_question" placeholder="enter question"></textarea>-->
<!--        </div>-->
<!---->
<!--        <div>-->
<!--            <input type="submit" value="create question">-->
<!--        </div>-->
<!--    </form>-->
<?php include __DIR__ . '/../Fragment/footer.php' ?>