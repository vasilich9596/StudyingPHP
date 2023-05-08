<?php include __DIR__.'/Fragment/header.php' ?>

<h1>calculator</h1>
<form method="post" action="/calculator">
    <div>
        <label>Command</label>
        <select name="command">
            <option value="add">Add</option>
            <option value="sub">Sub</option>
            <option value="pi">PI</option>
            <option value="div">Div</option>
            <option value="mul">Mul</option>
            <option value="abs">Abs</option>
            <option value="cube">Cube</option>
            <option value="cos">Cos</option>
            <option value="sin">Sin</option>
            <option value="sqrt">sqrt</option>
        </select>
    </div>

    <div>
        <label>Left</label>
        <input type="text" name="left" value="<?php print $leftOperand; ?>"/>
    </div>

    <div>
        <label>Right</label>
        <input type="text" name="right" value="<?php print $rightOperand; ?>"/>
    </div>
    <div>
        <input type="submit" value="Calculate"/>
    </div>
    <?php if ($result !== null): ?>
        <div>
            Execution result: <?php print $result; ?>
        </div>
    <?php endif; ?>
</form>

<?php include __DIR__.'/Fragment/footer.php' ?>