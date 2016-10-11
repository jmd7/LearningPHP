<!DOCTYPE html>
<!--?php print_post(); ?-->
<?php if ($errors) { ?>
    <tr>
        <td>You need to correct the following errors:</td>
        <td><ul>
            <?php foreach ($errors as $error) { ?>
                <li><?= $form->encode($error) ?></li>
            <?php } ?>
        </ul></td>
<?php }  ?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<?= $form->input("text", ["name" => "left"]); ?>
	<?= $form->select($GLOBALS["ops"], ["name" => "op"]); ?>
	<?= $form->input("text", ["name" => "right"]); ?>
	<?= $form->input("submit", ["value" => " = "]); ?>
	<?= $form->input("text", ["name" => "result", "readonly" => "true"]); ?>
</form>
</html>