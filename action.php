<?php 
require_once __DIR__ . '/config/config.php';
$datafile =  __DIR__ . '/storage/data.json';
$list = json_decode(file_get_contents($datafile), true);

$action = $_POST['action'] ?? '';

switch($action) {
    
    case 'add':
        $item = trim($_POST['item']);
        
        if($item !== '') {
            $postItem = [
                'id' => uniqid(),
                'value' => trim($_POST['item'])
            ];

            $list[$postItem['id']] = [
                'id' => uniqid(),
                'value' => trim($_POST['item'])
            ];
        }
        break;

    case 'remove': 
        $id = $_POST['id'];
        $list = array_values(array_filter(
            $list,
            fn($item) => $item['id'] !== $id
        ));
        break;
    
    case 'edit':
        $id = $_POST['id'];
        $newValue = trim($_POST['item']);   
        foreach ($list as &$item) {
            if ($item['id'] === $id) {
                $item['value'] = $newValue;
                break;
            }
        }
        unset($item); // Break reference
        break;

    default:
        break;
}

file_put_contents($datafile, json_encode($list, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;
?>