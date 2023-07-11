<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 處理表單提交的內容
    require_once('connect.php');
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO pet.vendor (account, password, name) VALUES ('$account', '$hashedPassword', '$name');";
    // 執行 SQL 語句並將資料插入資料庫
    $result = $conn->query($sql);
    if ($result) {
        // 延遲兩秒後跳轉至其他頁面
        echo '<script>setTimeout(function() { window.location = "log-in.php"; }, 2000);</script>';
    } else {
        // 插入失敗
        echo '<script>alert("提交失敗，請重新操作一次");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

      
    <style>
    dialog{
        width: 400px;
        height: 250px;
        margin-top: 5rem;
        box-shadow: 2px 2px 10px gray;
    }
    </style>
</head>

<body>

    <dialog>
      <h2>帳號已註冊成功，<br/>兩秒後自動跳轉登入畫面。。。</h2>
    </dialog>

<script>
      const dialog = document.querySelector("dialog");
      const open = document.querySelector(".open");
      const close = document.querySelector(".close");
        dialog.showModal();
    
      close.addEventListener("click", (e) => {
        dialog.close();
      });
    </script>
</body>


</html>