<!DOCTYPE html>
<html>
    <head>
        <title>PHP To-Do</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <style>
            .spacer {
                margin-bottom: .5rem;
            }
            .add-item-form {
                max-width: 20rem;
                display: flex;
                flex-direction: column;
            }
            .list-item {
                display: flex;
                margin-bottom: .5rem;
            }
            .list-item-view {
                margin: auto 0;
            }
            .remove-item-form {
                margin-right: 1rem;
            }
        </style>
</head>
<body>
    
    <?php
        require_once __DIR__ . '/config/config.php';

        session_start();

        if (!isset($_SESSION['list'])) {
            $datafile = DATA_FILE;
            if (file_exists($datafile)) {
                $json = file_get_contents($datafile);
                $_SESSION['list'] = json_decode($json, true) ?? [];
            } else {
                $_SESSION['list'] = [];
            }
        }

        $my_list = $_SESSION['list'];
    ?>

    <div class="container">
        <h1>PHP To-Do</h1>

        <h3>Add Item</h3>

        <form class="add-item-form" action="action.php" method="post">
            <label class="spacer" for="item">New item</label>
            <input class="spacer" name="item" type="text">
            <input type="hidden" name="action" value="add">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <br>
    
        <h3>Items</h3>
        <?php if(empty($my_list)) :  ?>
            <p class="text-muted">No items yet.</p>
        <?php else : ?>
            <?php foreach ($my_list as $item): ?>
                <div class=list-item>
                    <form class="remove-item-form" action="action.php" method="post">
                        <input type="hidden" name="action" value="remove">
                        <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">-</button>
                    </form>
                    <p class="list-item-view"><?php echo htmlspecialchars($item['value'])?></p>
                </div>
            <?php endforeach; ?>
         <?php endif; ?>
    </div>
</body>