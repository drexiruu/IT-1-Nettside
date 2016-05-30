<?php
// Koblingsinformasjon
$tjeneren = "localhost";
$brukernavn = "root";
$passord = "";
$database = "chatroom";

// Oppretter ny kobling
$kobling = new mysqli($tjeneren, $brukernavn, $passord, $database);

// Sjekker for feil
if ($kobling->connect_error) {
	die("Noe gikk galt: ".$kobling->connect_error);
}

$kobling->set_charset("utf8");

?>