<?php
    // index.phpからPOSTされた項目に未入力があれば項目内容をパラメータにしてリダイレクトさせる

    $err_item = array();
    $err_to_params = "";

    if (empty($_POST['text1'])) {
        array_push($err_item, 'text1');
    }

    if (empty($_POST['textarea1'])) {
        array_push($err_item, 'textarea1');
    }

    if(!empty($err_item)) {
        $err_to_params = implode("-", $err_item);
        if (isset($err_item)) {
            header("Location: http://localhost:3000/index.php?err={$err_to_params}");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="fin.php" method="post">
        <div>
            <label for="text1">text1</label>
            <div>
                <span name="text1"><?php echo ($_POST['text1']); ?></span>
            </div>
        </div>
        <div>
            <label for="textarea1">textarea1</label>
            <div>
                <span name="textarea1"><?php echo ($_POST['textarea1']); ?></span>
            </div>
        </div>
        <div>
            <input type="submit" value="submit">
        </div>
    </form>
</body>

</html>