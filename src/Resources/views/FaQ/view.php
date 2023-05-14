<?php
/** @var array<\App\Entity\FaQ> $FaQ */
?>

<?php include __DIR__ . '/../Fragment/header.php' ?>

    <h1>FAQ</h1>
    <hr>

    <form method="post" action="/FAQ/Question/new">
        <div>
            <textarea name="content_question" placeholder="enter question"></textarea>
        </div>

        <div>
            <input type="submit" value="create question">
        </div>
    </form>
<?php foreach ($FaQ as $item): ?>

<div>
    <hr>
    <h6><?= $item->getId(); ?></h6>
    <h6><?= $item->getCreatedAt()->format('Y,m,d H:i:s'); ?></h6>
    <h2><?= $item->getContentQuestion(); ?></h2>
    <h2><?= $item->getContentAnswer(); ?></h2>
    <hr>
</div>

<?php endforeach;?>

<?php include __DIR__ . '/../Fragment/footer.php' ?>