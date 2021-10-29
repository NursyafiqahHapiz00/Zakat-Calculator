<?php
//Start the session to store information
session_start();
?>

<!DOCTYPE html>
<?php
#Notes for <html> and <head>
//Language is in English
//Use UTF-8 which covers almost all of the characters and symbols in the world
//Enable the user's visible area depends on their device, small for smartphone and large for computers
//Allows web authors to choose what version of Internet Explorer and ie=edge display the content in the highest mode available
//Rel Stylesheet specifies the relationship between current document with imported style sheet from href. Href specifies the link's destination
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Zakat Calculator</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<?php
#Notes for id wrapper
//Wrapper allows to center the content within a webpage
?>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>Zakat Calculator</h1>
        </div>
		
        <?php 
                if (isset($_POST['reset'])) {
					//Destroys all the data associated with the current session
                    session_destroy();
                    header('location:index.php');
                }
				
				//Returns true if the variable exists and not null, otherwise returns false
                if (isset($_POST['calculate'])) {
                    
                    session_destroy();

                    $num1    = $_POST['num1'];
                    $num2    = $_POST['num2'];
                    $num3    = $_POST['num3'];
                    $num4    = $_POST['num4'];
                    $num5    = $_POST['num5'];
                    $num6    = $_POST['num6'];
                    $num7    = $_POST['num7'];
					$num8    = $_POST['num8'];

					//Session variables hold the information about 1 single user and available to all pages in one application
                    if(empty($_SESSION['num1'])){
                            $_SESSION['num1'] = $num1;
                        }
						
                    if(empty($_SESSION['num2'])){
                            $_SESSION['num2'] = $num2;
                        }
						
                    if(empty($_SESSION['num3'])){
                            $_SESSION['num3'] = $num3;
                        }
						
                    if(empty($_SESSION['num4'])){
                            $_SESSION['num4'] = $num4;
                        }
						
                    if(empty($_SESSION['num5'])){
                            $_SESSION['num5'] = $num5;
                        }
						
                    if(empty($_SESSION['num6'])){
                            $_SESSION['num6'] = $num6;
                        }
						
                    if(empty($_SESSION['num7'])){
                            $_SESSION['num7'] = $num7;
                        }
						
					if(empty($_SESSION['num8'])){
                            $_SESSION['num8'] = $num8;
                        }	
					
					//If number empty, field must not be empty and if otheriwse, the number is summed  up and mention total payable zakat
                    if ($num1 == "" || $num2 == "" || $num3 == "" || $num4 == "" || $num5 == "" || $num6 == "" || $num7 == "" || $num8 == "" ) {?>
					
                        <div id="menu">
                            <ul>
                                <li>
                                    <a style="color:red;">Field Must Not be empty!</a>
                                </li>
                            </ul>
                        </div>
						
						
                <?php    }else{
						$total_deduct = $num2 + ($num3 * 5000) + ($num4 * 2000) + ($num5 * 5000) + $num6 + $num7 + $num8 ;
						$annual_inc = $num1 * 12 ;
						//Window.print to print the current page  
						?>
						
                        <div id="menu">
                            <ul>
                                <li>
                                    <a style="color:#fff;">Total payable Zakat per year is RM <?php echo number_format (($annual_inc - $total_deduct) /100*2.5, 2);?> (updated <?php echo date('Y-m-d'); ?> )</a>
                                </li>
								<li>
                                    <a style="color:#fff;">Total payable Zakat per month is RM <?php echo number_format (($num1 - ($total_deduct / 12)) /100*2.5, 2);?> (updated <?php echo date('Y-m-d'); ?> )</a>
                                </li>
                                <li>
                                    <button style="cursor: pointer; width: 70px;" onClick="window.print()">Print</button>
                                </li>
                            </ul>
                        </div>

                 <?php    }
                } //HTML comment below is for conditional comments where link to index.php for home
             ?>
			 
        <!-- <div id="menu">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
            </ul>
        </div> -->
		
        <div id="main-content">
            <form class="post-form" action="" method="post">
                <div class="form-group">
                    <label>Monthly Gross Income (RM):</label>
                    <input type="number" name="num1" step="0.01" min="0" value="<?php if(empty($_SESSION['num1'])){
    echo '0';
  }else{
    echo $_SESSION['num1'];
  } ?>"	/>
                </div>
				
				<br>
				<?php //to make the text between the horizontal line ?>
				
				<div style="width: 100%; height: 10px; border-bottom: 1px solid black; text-align: center">
					<span style="font-size: 18px; background-color: #F4DCD6; padding: 0 5px;">
						<b>Total Deduction</b>
					</span>
				</div>
				
				<br><br>
			
                <div class="form-group">
                    <label>Self-Deduction :</label>
                    <input type="number" name="num2" min="12000" max="12000" readonly value="12000"
		/>
                </div>
				
                <div class="form-group">
                    <label>Number of Wife(s) (RM5,000 per wife) :</label>
                    <input type="number" name="num3" min="0" value="<?php if(empty($_SESSION['num3'])){
    echo '0';
  }else{
    echo $_SESSION['num3'];
  } ?>" />
                </div>
				
                <div class="form-group">
                    <label>Number of Children-Below 18 (RM2,000 per children) :</label>
                    <input type="number" name="num4" min="0" value="<?php if(empty($_SESSION['num4'])){
    echo '0';
  }else{
    echo $_SESSION['num4'];
  } ?>" />
                </div>
				
                <div class="form-group">
                    <label>Number of Children-Above 18 (Studying in University - RM5,000 per children) :</label>
                    <input type="number" name="num5" min="0" value="<?php if(empty($_SESSION['num5'])){
    echo '0';
  }else{
    echo $_SESSION['num5'];
  } ?>" />
                </div>
				
                <div class="form-group">
                    <label>Parents Yearly Contribution (RM):</label>
                    <input type="number" name="num6" step="0.01" min="0" value="<?php if(empty($_SESSION['num6'])){
    echo '0';
  }else{
    echo $_SESSION['num6'];
  } ?>" />
                </div>
				
                <div class="form-group">
                    <label>EPF (RM) :</label>
                    <input type="number" name="num7" step="0.01" min="0" value="<?php if(empty($_SESSION['num7'])){
    echo '0';
  }else{
    echo $_SESSION['num7'];
  } ?>" />
                </div>
				
				<div class="form-group">
                    <label>Yearly Self-Education (RM):</label>
                    <input type="number" name="num8" step="0.01" min="0" max="2000" value="<?php if(empty($_SESSION['num8'])){
    echo '0';
  }else{
    echo $_SESSION['num8'];
  } ?>" />
                </div>
				
                <input class="submit" name="calculate" type="submit" value="Calculate"  />
                <input class="submit" name="reset" type="submit" value="Reset"  />
            </form>
        </div>
    </div>
    <p style="text-align:center; margin-top: 100px;">The app is created by <a href="https://www.linkedin.com/in/nursyafiqah-hapiz/" style="color:blue; text-decoration:none;">SYAFIQAH HAPIZ</a></p>
</body>
</html>
