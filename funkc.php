
	<?php include("head.php");?>
			
	<?php include("header.php");?>
			
	<?php include("nav.php");?>

			
			<main>
				<content>
					<img class="centar" src="img/platforms.gif" width="400" height="300" />
					<article>
					<h2>OK, kako funkcionise ?</h2>

						<p> Waka je bazirana i radi na istom principu kao i messanger, sa tim ja kada korisnik sync-uje sve socijalne mreze i apikacije, moze jednim dugmetom da odgovori bilo kome na bilo kojoj aplikaciji. Waka radi i na desktopu, tako da ne morate skidati viber ili messanger na desktop vec kroz waku mozete se dopisivati sve kroz jednu aplikaciju.</p>

						<p> - Trenutno aplikaciju mozete preuzeti samo sa App Stora na iOS. <br>
							<img src="img/iOS_Logo.png" width="80" height="80" /> </p>

						<p> - Uskoro stize i za Google Play za Android !</p>
						<p> - Waka pruza mogucnost slanja vecih fajlova i to odlicnom brzinom, koristeci TCP pouzdan protokol.
							<img class="levo" src="img/waka4.png" /></p>
						<p> - Radi na tabletu, mobilnom i desktopu.</p>
						<br>
						<br>
						<br>	
						<hr>

						<p>Richard Stallman: "Waka je odlicna ideja, veoma sam zadovoljan radom aplikacije do sad."</p> <hr>

						<p>Bill Gates: "Nije bas nesto."</p> <hr>

						<p>Komsija: "Super je stvar."</p>

						<hr>

						<?php 

							if (file_exists("text.txt")) {
								$fp = fopen("text.txt","r");
								while (!feof($fp)) {
									$line = fgets($fp, 2048);
									echo $line . "<br>";
								}
								fclose($fp);
							} else {
								echo "Error";
							}
					
						?>

						<br>

					</article>	
					
				
				</content>
			
		
					<?php include("aside.php");?>
		
			</main>
		

	<?php include("footer.php");?>
	