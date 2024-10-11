# PitchSet

A PHP application implementing musical intervals to generate pitch sets such as chords, scales, tetrachords, etc. Pitches are encoded using American Standard Pitch Notation (ASPN).

## Classes and method examples

A static method: 
```
$tables::getASPNValue('C4', 'Hz')
```
Output: `261.626`
```
$tables::getASPNValue('C4', 'piano_key')
```
Output: `40`

Instance of a PitchSet for a two-pitch dyad: 
```
$dyad = new Dyad($tables, 'C♭4', 'A2');
foreach ( $dyad->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
```
Output: `C♭4 D4`

Instance of a PitchSet for a minor triad:
```
$minor_triad = new PitchSet($tables, 'C4', 'minor_triad');
foreach ( $minor_triad->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
```
Output: `C4 E♭4 G4`
