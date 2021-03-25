<?php
require_once("./conn.php");
$id = $_GET['id'];
$sql ="select * from jobs where id =".$id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width: 1024px;
            margin: 0 auto;
            text-align: center;
    
        }
        .job {
            border: 1px solid gray;
            padding: 10px;
            width: 400px;
            margin: 0 auto;
           text-align: left;
        }
        .job ~ .job{
           margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Job board管理後台－編輯職缺</h1>
        <a href="./admin.php">回到管理頁</a>
        <form action="./handle_update.php" method="POST">
            <div>職缺名稱:<input name="title" value="<?php echo $row['title'] ?>"></div>
            <div>職缺描述:<textarea name="description" rows="10"><?php echo $row['description'] ?></textarea></div>
            <div>薪水範圍:<input name="salary" value="<?php echo $row['salary'] ?>" ></div>
            <div>職缺連結:<input name="link" value="<?php echo $row['link'] ?>"  ></div>
            <input type="hidden"name="id" value="<?php echo $row['id'] ?> ">
            <input type="submit" value="送出">
        </form>
    </div>
</body>

</html>