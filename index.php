<?php include('./shared/header.php'); ?>

<?php
    require_once __DIR__ . '/config/config.php';
    $datafile =  __DIR__ . '/storage/data.json';
    $list = json_decode(file_get_contents($datafile), true);
?>

<div class="container">
    <h3>Add Item</h3>

    <form class="add-item-form" action="action.php" method="post">
        <label class="spacer" for="item">New item</label>
        <input class="spacer" name="item" type="text">
        <input type="hidden" name="action" value="add">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br>

    <h3>Items</h3>
    <?php if(empty($list)) :  ?>
        <p class="text-muted">No items yet.</p>
    <?php else : ?>
        <?php foreach ($list as $item): ?>
            <div class=list-item>
                <form class="remove-item-form" action="action.php" method="post">
                    <input type="hidden" name="action" value="remove">
                    <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                    <a class="btn btn-primary btn-sm" href="./views/edit_item.php?id=<?= $item['id'] ?>">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                </form>
                <p class="list-item-view"><?php echo htmlspecialchars($item['value'])?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include('./shared/footer.php'); ?>