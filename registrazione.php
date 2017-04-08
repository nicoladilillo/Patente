<?php}

	$nome = $_POST["nome"];
	$cognome = $_POST["cognome"];
	$giorno = $_POST["giorno"];
	$mese = $_POST["mese"];
	$anno = $_POST["anno"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confermapassword = $_POST["confermapassword"];
	if ( isset($_POST[' patente']) )
		$patente = true;
	else
		$patente = false;

	$file = fopen("utenti.txt", "a+");
	$i = 0;
	$trovato = false;
	if ( !$file ) die ("Errore");
	else {
		while ( !feof($file) ) {
			if( fgetc($file) == ':' ) {
			$s = fgets($file);
			if( $i%9 == 0 && strcmp($s, $username."\r\n") == 0  ) {
				$trovato = true;
			}
			$i++;
		}
	}

	if ( $trovato == false ) {
		if( $password == $confermapassword ) {
			//Controllare se l'utente è maggiorenne
			$then = strtotime("$giorno.$mese.$anno");
			$min = strtotime('+18 years', $then);

			if ( time() < $min )
				echo "Sei minorenne";
			else {
				fwrite ($file, "username:".$username."\r\n
							password:".$password."\r\n
							giorno:".$giorno."\r\n
							mese:".$mese."\r\n
							anno:".$anno."\r\n
							nome:".$nome."\r\n
							cognome:".$cognome."\r\n
							sesso:".$sesso."\r\n
							patente:".$patente."\r\n");

				session_start();
				$_SESSION['login_user'] = $username; // Inizializzazione Sessione
				header( "location: index.php" );
			}
		}
		else {
			echo "Le password sono diverse";
		}
	}
	else
		echo "L'username esiste già";

	fclose($file);
{?>