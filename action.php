<?php 
require_once __DIR__ . '/config/config.php';

session_start();

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

$action = $_POST['action'] ?? '';

switch($action) {
    
    case 'add':
        $item = trim($_POST['item']);
        if($item !== '') {
            $_SESSION['list'][] = [
                'id' => uniqid(),
                'value' => trim($_POST['item'])
            ];
        }
        break;

    case 'remove': 
        $id = $_POST['id'];
        $_SESSION['list'] = array_values(array_filter(
            $_SESSION['list'],
            fn($item) => $item['id'] !== $id
        ));
        break;

    default:
        break;
}

$datafile =  __DIR__ . '/storage/data.json';
$list = $_SESSION['list'];
file_put_contents($datafile, json_encode($list, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;
?>