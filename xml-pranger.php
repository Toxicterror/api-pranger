<?php
###############################################################
# CONFIG

	#Standard-Universum
	$universum = 's138-de';

###############################################################


$xml_player=simplexml_load_file("https://".$universum.".ogame.gameforge.com/api/players.xml") or die("Error: Cannot create object");

$date = new DateTime();
$date->setTimestamp(intval($xml_player->attributes()));
echo '<em>Generiert aus der API vom '.$date->format('d.m.Y - H:i:s').' Uhr</em>';

echo '<h1>Gesperrt</h1><ul>';
foreach ($xml_player->children() as $player) {
	if ($player['status'] == 'vb') {
		echo '<li>'.$player['name'].'</li>';
	}
}
echo '</ul>';

echo '<h1>Gesperrt & 7 Tage inaktiv</h1><ul>';	
foreach ($xml_player->children() as $player) {
	if ($player['status'] == 'vib') {
		echo '<li>'.$player['name'].'</li>';
	}
}
echo '</ul>';

echo '<h1>Gesperrt & 28 Tage inaktiv</h1><ul>';
foreach ($xml_player->children() as $player) {
	if ($player['status'] == 'vIb') {
		echo '<li>'.$player['name'].'</li>';
	}
}
echo '</ul>';
?>