<?php
include_once ("db.php");

include("head.php");


function dropPO($conn, $id_po){
	// Dropdown lista 
		$sql_dr="SELECT `id_ocena`, ocena_o  FROM `ocena` ORDER BY ocena_o" ;

    $result_dr = mysqli_query($conn, $sql_dr);
		if (!$result_dr) {
			die ("Doslo je do greske nad upitom Lista Baze!");
		}	
		$lista="<option value=0>Izaberi</option>";	
    while($row_po = mysqli_fetch_assoc($result_dr)){
			$lista.="<option value=".$row_po['id_ocena'];
			if($id_po==$row_po['id_ocena']){
				$lista.=" selected='selected'";
			}
			$lista.=">".$row_po['ocena_o']."</option>\n";
		}
		return $lista;
}	

include("header.php");
include("nav.php");

?> 
	<main>
		<content>
			<article>
				<h2>Baza podataka</h2>
<?php	
//Aktivnosti - POST
if(isset($_POST['send'])){
  // Novi slog	
	if($_POST['send']=="Sačuvaj"){
    //Proveravamo da li su sva polja popunjena
    if($_POST['f_ime']=="" and $_POST['f_prezime']=="" and $_POST['f_email']=="" and $_POST['f_lozinka']=="" and $_POST['f_id_ocena']==""){
			echo "<p class='poruka' >Morate popuniti obavezna polja!</p>";
		} else {
			//Dodavanje sloga 
			$sql = "INSERT INTO member (`id_member`, `ime_m`, `prezime_m`, `lozinka_m` , `id_ocena`)
			  VALUES (0,'".$_POST['f_ime']."','".$_POST['f_prezime']."','".$_POST['f_email']."','".$_POST['f_lozinka']."', ".$_POST['f_id_ocena'].");";

      $result = mysqli_query($conn, $sql);
			if (!$result) {
				die ("Doslo je do greske nad upitom INSERT!");
			}	
			echo "<p class='poruka' >Uspešno ste dodali.</p>";
		}
  }	

  //Izmene sloga
	if($_POST['send']=="Izmeni"){
    $sql = "UPDATE member SET ime_m='".$_POST['f_ime']."', prezime_m='".$_POST['f_prezime']."', email_m='".$_POST['f_email']."', lozinka_m='".$_POST['f_lozinka']."',id_ocena=".$_POST['f_id_ocena']." WHERE id_member = ".$_POST['f_id_member'].";";

		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die ("Doslo je do greske nad upitom za IZMENU!");
		}
		echo "<p class='poruka' >Uspešno ste izmenuli.</p>";	
  }
  //Brisanje sloga
	if($_POST['send']=="Brisanje"){
    $sql="DELETE FROM member WHERE id_member=".$_POST['f_id_member'].";";
		
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die ("Doslo je do greske nad upitom za BRISANJE!");
		}	
		echo "<p class='poruka' >Uspešno ste obrisali.</p>";
  }

} 

 //AKCIJA - GET
if(isset($_GET['akcija'])) {
	// Novi slog
	if($_GET['akcija']=="new"){
		echo "<h2>Novi</h2>";
		$data["btn_submit"] = "Sačuvaj";
    //prazni kontrole
    $data["id_member"] = "";
		$data["ime"] = "";
		$data["prezime"] = "";
		$data["email"] = "";
		$data["lozinka"] = "";
		$data["id_ocena"] = "";
    $lista=dropPO($conn, 0);
	}
	// Izmena sloga
	if($_GET['akcija']=="edit"){
		echo "<h2>Izmena</h2>";
		$data["btn_submit"] = "Izmeni";
	}
	// Brisanje sloga
	if($_GET['akcija']=="del"){	
		echo "<h2>Brisanje</h2>";
		$data["btn_submit"] = "Brisanje";
	}
  // Puni kontrole sadržajem
  if($_GET['akcija']=="edit" or $_GET['akcija']=="del"){
		$sql="SELECT * FROM member WHERE id_member=".$_GET['id'];
		$result = mysqli_query($conn, $sql) or die (mysqli_error($conn)." $sql");
		$row = mysqli_fetch_assoc($result);
		$data["id_member"] = $row['id_member'];
		$data["ime"] = $row['ime_m'];
		$data["prezime"] = $row['prezime_m'];
		$data["email"] = $row['email_m'];
		$data["lozinka"] = $row['lozinka_m'];
		$data["id_ocena"] = $row['id_ocena'];
    $lista=dropPO($conn, $row['id_ocena']);
	}
  

	
?>			
  <!-- Formular -->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<input type="hidden" name="f_id_member" value="<?php echo $data["id_member"]; ?>"><br>
		
		<label>Ime:</label>
		<input type="text" name="f_ime" value="<?php echo $data["ime"]; ?>"><br>

		<label>Prezime:</label>
		<input type="text" name="f_prezime" value="<?php echo $data["prezime"]; ?>"><br>
		
		<label>Email:</label>
		<input type="text" name="f_email" value="<?php echo $data["email"]; ?>"><br>

		<label>Lozinka:</label>
		<input type="text" name="f_lozinka" value="<?php echo $data["lozinka"]; ?>"><br>

		<label>Ocena:</label>
		
    <select name="f_id_ocena"><?php echo $lista; ?></select><br>

		<input type="submit" name="send" value="<?php echo $data["btn_submit"]; ?>">
		<button type="link"  href="<?php echo $_SERVER['PHP_SELF']; ?>">Odustani</button>
		
	</form>

<?php


}	else {
  //sortiranje
  if (isset($_GET['sort'])){
		if ($_GET['sort']=="ime"){
			$sort = "ime_m";
		}
		if ($_GET['sort']=="prezime"){
			$sort = "prezime_m";
		}
	} else {
		$sort = "id_member desc";
	}

	$sql="select *, ocena_o ";
	$sql.="from member ";
	$sql.="LEFT JOIN ocena on member.id_ocena = ocena.id_ocena ";
    $sql.="order by ".$sort;

	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die ("Doslo je do greske nad upitom Listanje!");
	}
?>
  <!-- Listing sadržaja -->
  <table border=0>
		<tr>
			<th>Šifra</th>
			<th><a href="<?php echo $_SERVER['PHP_SELF'].'?sort=ime' ?>" >Ime</a></th>
			<th><a href="<?php echo $_SERVER['PHP_SELF'].'?sort=prezime' ?>" >Prezime</a></a></th>
			<th>Email</a></th>
			<th>Lozinka</th>
			<th>Ocena</th>
      <th> </th>
			<th><a href="<?php echo $_SERVER['PHP_SELF'].'?akcija=new' ?>" class=btn>Novi</a></th>
		</tr>
	<?php
		foreach($result as $row){
			echo "<tr>";
        echo "<td>".$row['id_member']."</td>";
				echo "<td>".$row['ime_m']."</td>";
				echo "<td>".$row['prezime_m']."</td>";
        		echo "<td>".$row['email_m']."</td>";
        		echo "<td>".$row['lozinka_m']."</td>";
				echo "<td>".$row['ocena_o']."</td>";
        echo "<td><a href='". $_SERVER['PHP_SELF']."?akcija=edit&id=".$row['id_member']."' class=btn>Izmeni</a></td>";
				
				echo "<td><a href='". $_SERVER['PHP_SELF']."?akcija=del&id=".$row['id_member']."' class=btn>Brisanje</a></td>";
			echo "</tr>";	
		}
	echo "</table>";
	echo "<p>Ukupan broj: ". mysqli_num_rows($result)."</p>";
}
  ?>

   </article>
        </content>
        
        <?php include("aside.php"); ?>
      </main>

<?php
include("footer.php");

mysqli_close($conn);
?>  