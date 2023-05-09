<?php
/** @var array<\App\Entity\FaQ> $FaQ */
?>

<?php include __DIR__ . '/../Fragment/header.php' ?>

    <h1>FAQ</h1>
    <hr>
<?php foreach ($FaQ as $item): ?>

<div>
    <h6><?= $item->getId(); ?></h6>
    <h6><?= $item->getCreatedAt()->format('Y,m,d H:i:s'); ?></h6>
    <h2><?= $item->getContentQuestion(); ?></h2>
    <h2><?= $item->getContentAnswer(); ?></h2>
    <hr>
</div>

<?php endforeach;?>
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