<?php
    require_once __DIR__ . '/../config/config.php';
    $datafile =  __DIR__ . '/../storage/data.json';
    $list = json_decode(file_get_contents($datafile), true);
    $id = ($_GET['id'] ?? 0);

?>

<?php include('../shared/header.php'); ?>

<?php 
    function returnItemValue() {
    global $list, $id;
    foreach ($list as $item) {
        if ($item['id'] == $id) {
            return $item['value'];
        }
    }
    return '';

    };
?>

<div class="container">
    <h3>Edit Item</h3>

    <form class="edit-item-form" action="../action.php" method="post">
        <label class="spacer" for="item">New To Do</label>
        <textarea class="spacer" name="item" type="text" value="<?php echo htmlspecialchars(returnItemValue()); ?>"><?php echo htmlspecialchars(returnItemValue()); ?></textarea>
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>


<?php include('../shared/footer.php'); ?>