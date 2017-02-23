
	<?php include("head.php");?>
			
	<?php include("header.php");?>
			
	<?php include("nav.php");?>
			
			<main>
				<content>
					<article>
					 <p>Aplikacija je trenutno 5 dollara na App Storu, ako sto iz Srbije ili iz Evrope moete iracunati koliko je to trenutno u vasoj valuti.</p>
		<?php
  $kl = array (
    "RSD" => array(
      "RSD" => 1,
      "EUR" => 0.00807,
      "USD" => 0.00864,
    ),
    "EUR" => array(
      "RSD" => 123.960,
      "EUR" => 1,
      "USD" => 1.07060,    
    ),
    "USD" => array(
      "RSD" => 115.785,
      "EUR" => 0.93406,
      "USD" => 1,
    ),
  );

  $r="";
  if(isset($_POST['submit'])){
    if ($_POST['v1']=='-' OR $_POST['v2']=='-' OR $_POST['iznos']==""){
      $r= "Sve mora da se unese!";
    } else {
      $v1=$_POST['v1'];
      $v2=$_POST['v2'];
      $i = $_POST['iznos'];
      $r = number_format($_POST['iznos'],2,",",".")." ".$v1." = ".number_format($kl[$v1][$v2]*$i,2,",",".")." ".$v2;
    }
  }
   ?>
<html>
	<head>
		<title>Naplata</title>
	</head>
  <style>
    h1 {
      text-align:center;
      font-size:30px;
    }
    label {
      display: inline-block;
      width:80px;
      margin:5px 5px 5px 50px;
    }
    .rez {
      border:3px solid #555;
      border-radius:10px;
      background:#3A2C0E;
      margin:0px 30px 20px 30px;
      height:40px;
      text-align:center;
      font-size:20px;
      padding-top:10px;
    }
    .s {
      margin:30px 5px 5px 50px;
    }
    .k {
      border:3px solid #555;
      border-radius:10px;
      width:400px;
      margin:30px;
      background:#A67E29;
    }
  </style>
	
  <div class="k">  
    <h1>Konvertovanje valute</h1>

    
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      
      <p class="rez"><?php echo $r; ?></p>
      
      <label>Iznos:</label>
      <input type="number" name="iznos"><br>
      
      <label>Iz valute:</label>
      <select name="v1">
        <option value='-'>-</option>
        <?php
        foreach($kl as $k => $v){
          echo "<option value='$k'>$k</option>";
        }
        ?>
      </select><br>
      
      <label>U valutu:</label>
      <select name="v2">
        <option value='-'>-</option>
        <?php
        foreach($kl as $k => $v){
          echo "<option value='$k'>$k</option>";
        }
        ?>
      </select><br>
      
      <input type="submit" name="submit" value="Konvertuj" class="s">
      
    </form>


	</article>	
					
				
	</content>
			
		<?php include("aside.php");?>
	
	</main>
		
	
	<?php include("footer.php");?>
	