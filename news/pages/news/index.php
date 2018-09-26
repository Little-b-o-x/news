<?php 
  //$id = $_GET['id'];
  $dbms='mysql';     //数据库类型
  $host='localhost'; //数据库主机名
  $dbName='news';    //使用的数据库
  $user='root';      //数据库连接用户名
  $pass='';          //对应的密码
  $dsn="$dbms:host=$host;dbname=$dbName";
  $ros;
  try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    $statement = <<<SQL
    SELECT *
    FROM `news`
SQL;

    $rows = $dbh->query($statement);
    /*你还可以进行一次搜索操作
    foreach ($dbh->query("SELECT * FROM `news`") as $row) {
    		echo($row); //你可以用 echo($GLOBAL); 来看到这些值
        global $a = $row;
    }
    */
    $ros=$rows;
    
    $dbh = null;
  } catch (PDOException $e) {
    die ("错误!: " . $e->getMessage() . "<br/>");
  };
?>

<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>news</title>

  <link rel="stylesheet" href="../../lib/normalize.css">
  <link rel="stylesheet" href="./css/main.css">

</head>
<body>
  <div class="news">
    <!-- <div class="item">
      <a href="./article/" class="title">班上两位同学使用原子弹打架！</a>
      <div class="author">Littlebox</div>
      <div class="date">2018.10.1</div>
    </div> -->
    <?php
    foreach($rows->FetchAll(PDO::FETCH_ASSOC) as $row) {
    	echo '<div class="item">';
    	echo "<a href='./article?id=" . $row['id'] . "' class='title'>" . base64_decode($row['title']) . "</a>";
      echo "<div class='author'>" . base64_decode($row['author']) . "</div>";
      echo "<div class='date'>" . base64_decode($row['date']) . "</div>";
    }
    ?>
  </div>
  
</body>
</html>
