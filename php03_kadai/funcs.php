<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function db_conn(){
    try {
        $db_name = 'practice_db';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);

        return $pdo; //返り値として使用したいので
        
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));  //exit = これ以上処理するな的な関数
}

//リダイレクト関数: redirect($file_name)

function redirect($file_name){   //$file_nameが{}の中のものと置き換わるイメージ
    header('Location:' . $file_name);
    exit();
}