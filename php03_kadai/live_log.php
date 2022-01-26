<?php

require_once('funcs.php');

$title   = $_POST['title'];
$artist  = $_POST['artist'];
$memo    = $_POST['memo'];

//2. DB接続
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO practice_a_table(title,artist,memo)VALUES(:title,:artist,:memo");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    header('Location: consert.php');
    exit();
    redirect('consert.php');
}