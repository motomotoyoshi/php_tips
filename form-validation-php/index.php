<?php
    // URLパラメータにエラー項目があったらJSでアラートを出力
    if (isset($_GET['err'])) {
        $msgs = "";
        parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $err_content);

        foreach (explode("-", $err_content['err']) as $msg) {
            $msg = "「".$msg."」";
            $msgs .= $msg;
        }

        $alert_msg = '
                <script type="text/javascript">
                    alert("以下の項目を入力してください\n'.$msgs.'");
                </script>
                ';
        echo ($alert_msg);
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
    <form action="check.php" method="post">
        <div>
            <label for="text1">text1</label>
            <div>
                <input type="text" name="text1" id="">
            </div>
        </div>
        <div>
            <label for="textarea1">textarea1</label>
            <div>
                <textarea name="textarea1" id="" cols="20" rows="5"></textarea>
            </div>
        </div>
        <div>
            <input type="submit" value="submit">
        </div>
    </form>
</body>

</html>