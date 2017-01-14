<?php
    session_start();
    
    $max = 0;
    $min = 0;
    $somma = 0;
    $media = 0;
    $quantita = 0;

    if(!isset($_SESSION['numbers']))
        $_SESSION['numbers'] = array();
    else
    {
        if(isset($_POST['reset']))  
        {
            $_SESSION['numbers'] = array();
        }
        else if(isset($_POST['add']))
        {
            $temp = $_REQUEST['number'];
            if(is_numeric($temp))
            {
                array_push($_SESSION['numbers'], $temp); 
                $quantita = count($_SESSION['numbers']);
                $max = max($_SESSION['numbers']);
                $min = min($_SESSION['numbers']);
            
                foreach ($_SESSION['numbers'] as &$n) 
                    $somma = $somma + $n;
                    
                $media = $somma / $quantita;
            }
        }
    }
?>

<html>
<head>
            <title>
                Numbers
            </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
            <div class="table-responsive">
			
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				    
				    <div class="container">
    					
    					<div class="row">
    						<div class="jumbotron text-center"><h2>Numeri</h2></div>
    					</div>
    					
    					<div class="row">
                            <div class="col-sm-1"><p>Numero: <p></div>
                            <div class="col-sm-3"><input type="text" class="form-control" align="center" name="number"></div>
                            <div class="col-sm-2"><input class="btn btn-default" align="center" type="submit" name="add" value="Insert"></div>
                            
    				    </div>
				
				        <br>
				
    				    <div class="row">
    					
                            <div class="col-sm-6">
                                <?php
                                    if(count($_SESSION['numbers'])>0)
                                    {
                                        echo "Numeri Inseriti: " . $quantita . "<br>";
                                        echo "Numero Massimo: " . $max . "<br>";
                                        echo "Numero Minimo: " . $min . "<br>";
                                        echo "Somma: " . $somma . "<br>";
                                        echo "Media: " . $media . "<br>";
                                    
                                        echo "<input class='btn btn-default' align='center' type='submit' name='reset' value='Reset'>";
                                    }
                                ?>
                            </div>
                        
                        </div>
                        
    				</div>		
				
				</form>
			
            </div>
	</body>
</html>