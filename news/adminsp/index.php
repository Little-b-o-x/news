<?php
  if(!empty($_POST['user']) && !empty($_POST['pass'])){
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
	    FROM `user`
		WHERE `username`='$_POST['user']'
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
  }




?>


<html>
	<head>
		<title>Login - Class 22</title>
		<link rel="stylesheet" href="../lib/boot.css">
		<link rel="stylesheet" href="./css/main.css">
	</head>
	<body>
		<form method="POST" class="loginform">
			<div class="form-group">
				<label for="">UserName:</label>
				<input name="user" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Password:</label>
				<input name="pass" type="text" class="form-control">
			</div>
		</form>
	</body>
</html>