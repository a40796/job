<?php
require_once('./conn.php');
$sql = 'select * from jobs order by create_at desc';
$result = $conn->query($sql);

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
        <h1>Job board</h1>
        <div class="jobs">
            <?php  while( $row = $result->fetch_assoc()){ ?>
                 
                       <div class='job'>
                        <h2 class='job_title'><?php echo $row['title'] ?></h2>
                         <p class='job_desc'><?php echo $row['description'] ?></p>
                         <p class='job_salary'><?php echo $row['salary'] ?></p>
                     </div>;
                
                 
            <?php   } ?>
        
        </div>

    </div>
</body>

</html>