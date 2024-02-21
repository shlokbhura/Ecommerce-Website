<!DOCTYPE html>
<html>
<head>
	<title>Simple Calculator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="calculator">
        <?php
        // include("dp.php");
        SESSION_START(); // there should be no space between session and start
		if(isset($_POST['submit'])) {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$operator = $_POST['operator'];
			switch ($operator) 
            {
				case '+':
					$result = $num1 + $num2;
					break;
				case '-':
					$result = $num1 - $num2;
					break;
				case '*':
					$result = $num1 * $num2;
					break;
				case '/':
					$result = $num1 / $num2;
					break;
				default:
					echo "Invalid operator";
					break;
			}
			// echo "<h2>Result: $result</h2>";
            // $q =" INSERT INTO calculator(num1,num2,operation,result)VALUES('$num1','$num2','$operation','$result')";
            // $r =mysqli_connect($conn,$q);
            // if($r==TRUE){
            $_SESSION['result'] = $result;
            // header("Location: c1.php");
            // there should be no space between location and colon
            // }
            // else{
            //     echo "connection failed";
            // }
		}
		?>
        <?php
        if(isset($_SESSION['result'])){
        }
        ?>
        <h1>RESULT = <?php echo $_SESSION['result'] ?></h1>
	</div>
</body>
</html> 