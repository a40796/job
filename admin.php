<?php
require_once('./conn.php');
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
        <h1>Job board管理後台</h1>
        <a href="./add.php">新增職缺</a>
        <div class="jobs">
        <?php
              $sql = 'select * from jobs order by create_at desc';
              $result = $conn->query($sql);
              if($result ->num_rows > 0){
                  while( $row = $result->fetch_assoc()){
                     echo "<div class='job'>";
                     echo "<h2 class='job_title'>".$row['title']."</h2>";
                     echo "<p class='job_desc'>".$row['description']."</p>";
                     echo "<p class='job_salary'>".$row['salary']."</p>";
                     echo "<a class='job_link' href='./update.php?id=".$row['id']."'>編輯職缺</a>";
                     echo "  <a class='job_link' href='./delete.php?id=".$row['id']."'>刪除職缺</a>";
                     echo "</div>";
                  }
                 
              }
            ?>
        </div>

    </div>
</body>

</html>