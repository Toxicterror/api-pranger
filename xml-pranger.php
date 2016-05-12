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


<?php
#######
# Default Universe to find all Universes of a Country
$uni = ["de" => "s1-de", "en" => "s1-en"];
#######


$xml['de']['universes'] = simplexml_load_file("https://".$uni['de'].".ogame.gameforge.com/api/universes.xml");
$xml['en']['universes'] = simplexml_load_file("https://".$uni['en'].".ogame.gameforge.com/api/universes.xml");

foreach ($xml['de']['universes']->children() as $universe) {
	echo '<a href="'.$universe['href'].'">DE-'.$universe['id'].'</a><br/>';
}

foreach ($xml['en']['universes']->children() as $universe) {
	echo '<a href="'.$universe['href'].'">EN-'.$universe['id'].'</a><br/>';
}

?>
