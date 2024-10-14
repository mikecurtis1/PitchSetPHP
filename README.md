# PitchSet

A PHP application to generate musical pitch sets such as chords, scales, tetrachords, etc. A PitchSet object takes a base pitch along with a series of interval sizes defined in pitch_set_intervals.json and identified by a keyword then returns a ToneSet of pitches. PitchSet extends the Interval class which is responsible for taking a single pitch along with an interval size to return a pitch matching the interval size. Pitches are encoded using American Standard Pitch Notation (ASPN).

## Classes and method examples

### Instance of a PitchSet for a minor triad:
```
$minor_triad = new PitchSet($tables, 'C4', 'minor_triad');
foreach ( $minor_triad->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
```
Output: `C4 E♭4 G4`

#### Example of a PitchSet object: 
```
PitchSet Object
(
    [_tone_set:protected] => Array
        (
            [0] => Tone Object
                (
                    [_aspn:Tone:private] => C4
                    [_letter:Tone:private] => C
                    [_accidental:Tone:private] => 
                    [_octave:Tone:private] => 4
                    [_piano_key:Tone:private] => 40
                    [_Hz:Tone:private] => 261.626
                    [_natural:Tone:private] => C4
                    [_sharp:Tone:private] => B♯4
                    [_flat:Tone:private] => D𝄫4
                )

            [1] => Tone Object
                (
                    [_aspn:Tone:private] => E♭4
                    [_letter:Tone:private] => E
                    [_accidental:Tone:private] => ♭
                    [_octave:Tone:private] => 4
                    [_piano_key:Tone:private] => 43
                    [_Hz:Tone:private] => 311.127
                    [_natural:Tone:private] => 
                    [_sharp:Tone:private] => D♯4
                    [_flat:Tone:private] => E♭4
                )

            [2] => Tone Object
                (
                    [_aspn:Tone:private] => G4
                    [_letter:Tone:private] => G
                    [_accidental:Tone:private] => 
                    [_octave:Tone:private] => 4
                    [_piano_key:Tone:private] => 47
                    [_Hz:Tone:private] => 391.995
                    [_natural:Tone:private] => G4
                    [_sharp:Tone:private] => F𝄪4
                    [_flat:Tone:private] => A𝄫4
                )

        )

    [_root:PitchSet:private] => C
    [_type:PitchSet:private] => minor_triad
    [_pitch_set_tone_index:PitchSet:private] => Array
        (
            [0] => root
            [1] => third
            [2] => fifth
        )

)
```
### Instance of a PitchSet for a major scale:
```
$major_scale = new PitchSet($tables, 'E♭4', 'major_scale');
foreach ( $major_scale->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
```
Output: `E♭4 F4 G4 A♭4 B♭4 C5 D5 E♭5`

## Additional examples of more complex musical sets: 
```
$harmonic_tetrachord = new PitchSet($tables, 'C4', 'harmonic_tetrachord');
...
```
Output: `C4 D♭4 E4 F4`
```
$French_augmented_sixth_chord = new PitchSet($tables, 'C4', 'French_augmented_sixth_chord');
...
```
Output: `C4 E4 F♯4 A♯4`
```
$lydian_dominant_scale = new PitchSet($tables, 'C4', 'lydian_dominant_scale');
...
```
Output: `C4 D4 E4 F♯4 G4 A4 B♭4 C5`
```
$melodic_minor_scale = new PitchSet($tables, 'C4', 'melodic_minor_scale');
...
```
Output: `C4 D4 E♭4 F4 G4 A4 B4 C5 C5 B♭4 A♭4 G4 F4 E♭4 D4 C4`

### Instance of Dyad:
The Dyad class extends the abstract Interval class
```
$dyad = new Dyad($tables, 'C♭4', 'A2');
foreach ( $dyad->getToneSet() as $tone ) {
	echo $tone->getASPN() . ' ';
}
```
Output: `C♭4 D4`

### A static method: 
```
$tables::getASPNValue('C4', 'Hz')
```
Output: `261.626`
```
$tables::getASPNValue('C4', 'piano_key')
```
Output: `40`
