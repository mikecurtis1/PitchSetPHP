<?php 

class MusicTables
{
	private static $_aspn = array();
	private static $_intervals = array();
	private static $_letter_sequence_asc = array();
	private static $_pitch_set_intervals = array();
	
	public static function config($json_path='',$type=''){
		self::$_aspn = json_decode(file_get_contents('American_standard_pitch_notation.json'),TRUE);
		self::$_intervals = json_decode(file_get_contents('intervals.json'),TRUE);
		self::$_letter_sequence_asc = json_decode(file_get_contents('letter_sequence_asc.json'),TRUE);
		self::$_pitch_set_intervals = json_decode(file_get_contents('pitch_set_intervals.json'),TRUE);
		static $instance = null;
		if ( NULL === $instance ) {
			$instance = new static();
		}
		return $instance;
	}
	
	public static function getASPNValue($key1='',$key2=''){
		if ( isset(self::$_aspn[$key1][$key2]) ) {
			return self::$_aspn[$key1][$key2];
		} else {
			return FALSE;
		}
	}
	
	public static function getIntervalValue($key1='',$key2=''){
		if ( isset(self::$_intervals[$key1][$key2]) ) {
			return self::$_intervals[$key1][$key2];
		} else {
			return FALSE;
		}
	}
	
	public static function getNextLetter($aspn,$interval){
		if ( ! self::isASPN($aspn) ) {
			return FALSE;
		}
		if ( ! self::isInterval($interval) ) {
			return FALSE;
		}
		$ordinal = self::$_letter_sequence_asc[substr($aspn,0,1)];
		$steps = self::$_intervals[$interval]['diatonic_steps'];
		$sum = $ordinal + $steps;
		if ( $sum > 7 ) {
			$end = ( $sum ) % 7;
		} else {
			$end = $sum;
		}

		return self::$_letter_sequence_asc[$end];
	}
	
	public static function getPianoKeySpelling($piano_key,$letter){
		foreach ( self::$_aspn as $aspn => $data ) {
			if ( $data['piano_key'] === $piano_key && $data['letter'] === $letter ) {
				return $aspn;
			}
		}
		
		return FALSE;
	}
	
	public static function getPitchSetIntervals($pitch_set_type){
		if ( isset(self::$_pitch_set_intervals[$pitch_set_type]) ) {
			return self::$_pitch_set_intervals[$pitch_set_type];
		} else {
			return FALSE;
		}
	}
	
	public static function isASPN($aspn){
		if ( isset(self::$_aspn[$aspn]) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public static function isInterval($interval){
		if ( isset(self::$_intervals[$interval]) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public static function isPitchSetType($pitch_set_type){
		if ( isset(self::$_pitch_set_intervals[$pitch_set_type]) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>
