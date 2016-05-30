<?php
// Inkluderer koblingsinformasjonen
include "kobling.php";

// Hvis man har kommit til denne siden etter å ha lagt 
// til noe. Allt i denne iftesten kan legges i en egen fil 
// for å gjøre denne filen litt penere.
if(isset($_POST["leggtil"])) {

	$sql_insert = "";

	// Hvis vi har lagt til et fjell
	if ($_POST["leggtil"] == "Legg til kommentar") {
		$navn = $_POST["navn"];
		$kommentar = $_POST["kommentar"];
		$sql_insert = "INSERT INTO chat (commenter, comment) VALUES ('$navn', '$kommentar')";
	}

	// Prøver å legge inn dataene i databasen
	if ($sql_insert && !$kobling->query($sql_insert)) {
		$feil = $kobling->error;
		echo "Noe gikk galt med spørring: $sql_insert ($feil)";
	} else {

		// Vi er ferdige med oppdateringen av databasen. Vi
		// bruker php kommandoen header til å lade den
		// siden som kalte på oss med en rent url:
		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Fjell bestigninger</title>
	<link rel="stylesheet" type="text/css" href="foundation.css">
	<link rel="stylesheet" type="text/css" href="drexstyle.css">
	<style type="text/css">
body {
	width: 50%;
	margin: 0px auto;
}
	</style>
</head>
<body>

<h1>Chatroom!</h1>
<?php

// Lager SQL spørring for å vise frem de ulike fjellene
$sql = "SELECT * FROM chat";

$resultat = $kobling->query($sql);

echo "<table>\n";
echo "  <tr class='tabletitle'>\n";
echo "    <th>Navn</th><th>Kommentar</th>\n";
echo "  </tr>\n";

while ($rad = $resultat->fetch_assoc()) {
	$navn = $rad["commenter"];
	$kommentar = $rad["comment"];
	$kommentar_id = $rad["comment_id"];
	echo "  <tr class='kommentarer'>\n";
	echo "    <td class='names'>$navn</td><td class='comments'>$kommentar</td>\n";
	echo "  </tr>\n";
}

echo "</table>";
?>

<h3>Legg til kommentar</h3>
<form method="POST"> <!-- Bruker post for å ikke risikere å legge til et fjell to ganger -->
	<label>Navn <input type="text" name="navn"></label>
	<label>Kommentar <input type="text" name="kommentar"></label>
	<button type="submit" name="leggtil" value="Legg til kommentar">Legg til kommentar</button>
</form>


</body>
</html>