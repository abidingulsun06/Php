<?php

header('Access-Control-Allow-Origin: *');

try {
  $db = new PDO("mysql:host=localhost;dbname=test", 'root', '');
} catch (PDOException $p) {
  die($p->getMessage());
}

$data = json_decode(file_get_contents('php://input'), true);

$action = $_POST['action'];
$response = [];


switch ($action) {
  case 'todos':
    $response = $db->query('SELECT * FROM todos order by id desc')->fetchAll(PDO::FETCH_OBJ);
    break;

    //yeni todo ekleme
  case 'add-todo':
    $todo = $_POST['todo'];

    $data = [
      'todo' => $todo,
      'done' => 0
    ];

    $query = $db->prepare("INSERT INTO todos SET todo = :todo, done = :done");
    $insert = $query->execute($data);

    if ($insert) {
      $data['id'] = $db->lastInsertId();
      $response = $data;
    } else {
      $response['error'] =  'bir sorun oluştu';
    }

    break;

  case 'delete-todo':

    $id = $_POST['id'];

    if (!$id) {
      $response['error'] = 'Id eksik olamaz.';
    } else {

      $delete = $db->exec('DELETE from todos where id ="' . $id . '"');

      if ($delete) {
        $response['deleted'] = true;
      } else {
        $response['error'] =  'Todo silinemedi';
      }
    }

    break;

  case 'done-todo':

    $id = $_POST['id'];
    $done = $_POST['done'];

    if (!$id) {
      $response['error'] = 'Id eksik olamaz.';
    } else {

      $query = $db->prepare('SELECT id from todos where id = :id');
      $query->execute([
        'id' => $id
      ]);

      $todo = $query->fetch(PDO::FETCH_OBJ);

      if (!$todo) {
        $response['error'] = 'Gönderdiğiniz id bulunamadı';
      } else {
        $query = $db->prepare('UPDATE todos SET done= :done WHERE id = :id');
        $update = $query->execute([
          'id' => $id,
          'done' => $done
        ]);

        if ($update) {
          $response['done'] = 1;
        } else {
          $response['error'] = 'todo güncellenirken bir hata oldu';
        }
      }
    }

    break;
}

echo json_encode($response);
