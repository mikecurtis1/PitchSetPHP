<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body {
	background-color: #bbbbaa;
	font-family: gill sans, sans-serif;
	margin:1em;
	padding:1em;
}
div.var_dump {
	//line-height:1.5em;
}
div.tones {
	background-color: #ffffff;
	margin:1em;
	padding:1em;
	display:table-cell;
}
div.code {
	background-color: #ffffbb;
	margin:1em;
	padding:1em;
	display:table-cell;
}
div.print_r {
	background-color: #ffffff;
	margin:1em;
	padding:1em;
	white-space: pre;
	font-size:75%;
	font-color:#888888;
	font-family:andale mono, monospace; /* "Lucida Console" */
}
</style>
</head>
<body>
<h1>PitchSet</h1>
<div class="var_dump">
<?php 

require_once('MusicTables.php');
require_once('Interval.php');
require_once('Tone.php');
require_once('ToneSet.php');
require_once('PitchSet.php');
require_once('Dyad.php');

$tables = MusicTables::config();

/* ********** */
echo "<hr />\n";
echo '<div class="code">$tables::getASPNValue(\'C4\', \'piano_key\')' . "</div>\n";
echo var_dump($tables::getASPNValue('C4', 'piano_key'));
echo "\n";

/* ********** */
echo "<hr />\n";
echo '<div class="code">new Dyad($tables, \'C♭4\', \'A2\')' . "</div>\n<div class=\"tones\">";
$dyad = new Dyad($tables, 'C♭4', 'A2');
foreach ( $dyad->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($dyad, true) . "</div>\n";
echo "\n";

/* ********** */
echo "<hr />\n";
echo '<div class="code">new PitchSet($tables, \'C4\', \'minor_triad\')' . "</div>\n<div class=\"tones\">";
$minor_triad = new PitchSet($tables, 'C4', 'minor_triad');
foreach ( $minor_triad->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($minor_triad, true) . "</div>\n";
echo "\n";

echo "<hr />\n";
echo '<div class="code">new PitchSet($tables, \'C4\', \'French_augmented_sixth_chord\')' . "</div>\n<div class=\"tones\">";
$French_augmented_sixth_chord = new PitchSet($tables, 'C4', 'French_augmented_sixth_chord');
foreach ( $French_augmented_sixth_chord->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($French_augmented_sixth_chord, true) . "</div>\n";
echo "\n";

/* ********** */
echo "<hr />\n";
echo '<div class="code">new PitchSet($tables, \'C4\', \'harmonic_tetrachord\')' . "</div>\n<div class=\"tones\">";
$harmonic_tetrachord = new PitchSet($tables, 'C4', 'harmonic_tetrachord');
foreach ( $harmonic_tetrachord->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($harmonic_tetrachord, true) . "</div>\n";
echo "\n";

/* ********** */
echo "<hr />\n";
echo '<div class="code">new PitchSet($tables, \'E♭4\', \'major_scale\')' . "</div>\n<div class=\"tones\">";
$major_scale = new PitchSet($tables, 'E♭4', 'major_scale');
foreach ( $major_scale->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($major_scale, true) . "</div>\n";
echo "\n";

/* ********** */
echo "<hr />\n";
echo '<div class="code">new PitchSet($tables, \'C4\', \'lydian_dominant_scale\')' . "</div>\n<div class=\"tones\">";
$lydian_dominant_scale = new PitchSet($tables, 'C4', 'lydian_dominant_scale');
foreach ( $lydian_dominant_scale->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($lydian_dominant_scale, true) . "</div>\n";
echo "\n";

/* ********** */
echo "<hr />\n";
echo '<div class="code">new PitchSet($tables, \'C4\', \'melodic_minor_scale\')' . "</div>\n<div class=\"tones\">";
$melodic_minor_scale = new PitchSet($tables, 'C4', 'melodic_minor_scale');
foreach ( $melodic_minor_scale->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
echo "</div>\n";
echo "<div class=\"print_r\">" . print_r($melodic_minor_scale, true) . "</div>\n";
echo "\n";

?>
</div>
</body>
</html>
