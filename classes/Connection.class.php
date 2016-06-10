<?php
class Connection {
	public static $user = 'root';
	public static $pass = '';

	private static $connection = null;
	private $dbh = null;

	private function __construct () { }
	private function __clone () { }
	private function __wakeup () { }

	public static function getInstance(){
		if (empty(self::$connection)) {
			self::$connection = new self();
			return self::$connection;
		}
	}
	public function connect() {

		if (!(self::$connection->dbh instanceof PDO)) {

			try {
				$dsn = "mysql:host=localhost;dbname=signup";
				self::$connection->dbh = new PDO($dsn, self::$user, self::$pass);
				self::$connection->dbh->exec("SET CHARACTER SET utf8");
				self::$connection->dbh->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
				return self::$connection->dbh;
			}
			catch (PDOException $e) {
				echo '<br>Не удалось установить соединения с базой данных: ' . $e->getMessage(). '<br>';
			}
		}
		else {
			return self::$connection->dbh;
		}
	}

	public static function  login() {
		if(isset($_POST['login']))
		{
			$username=$_POST['user'];
			$password=md5($_POST['pass']);

			$dbh = Connection::getInstance()->connect();

			$stmt= $dbh->prepare("SELECT 1 FROM users WHERE username='$username'AND password='$password'");
			$stmt->execute();

			$stmt = $stmt->fetch();

			if($stmt)
			{
				header("Location: ../db.php");

				$_SESSION['username']=$username;

			}
			else
			{

				echo "<script>alert('Username or password is incorrect!')</script>";
				echo "<script>window.open('../enter.php','_self')</script>";
			}
		}
	}
}
