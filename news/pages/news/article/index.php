<?php 
  $id = $_GET['id'];
  $dbms='mysql';     //数据库类型
  $host='localhost'; //数据库主机名
  $dbName='news';    //使用的数据库
  $user='root';      //数据库连接用户名
  $pass='';          //对应的密码
  $dsn="$dbms:host=$host;dbname=$dbName";
  $ros;
	$wow;
  try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    $statement = <<<SQL
    SELECT *
    FROM `news`
    WHERE `id` = 1
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
<?php
foreach($rows->FetchAll(PDO::FETCH_ASSOC) as $row) {
  $wow=$row;
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>art</title>

  <link rel="stylesheet" href="../../../lib/normalize.css">
  <link rel="stylesheet" href="./css/main.css">

</head>
<body>
  <div class="view">
    <div class="title"><?php echo(base64_decode($wow['title'])) ?></div>
    <div class="subtitle"><?php echo(base64_decode($wow['subtitle'])) ?></div>
    <div class="author"><?php echo(base64_decode($wow['author'])) ?></div>
    <div class="content">
      <?php echo(base64_decode($wow['content'])) ?>
    </div>
  </div>
</body>
</html>
