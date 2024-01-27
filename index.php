<?php require("./config.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="importData.php" enctype="multipart/form-data" method="post">
        <input type="file" name="Excel" required value="">
        <button type="submit" name="import">Import</button>
    </form>
</body>
</html>