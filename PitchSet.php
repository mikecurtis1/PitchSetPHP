<?php 

class PitchSet extends Interval implements ToneSet
{
	private $_root = '';
	private $_type = '';
	private $_pitch_set_tone_index = array();
	
	public function __construct(MusicTables $tables, $aspn='', $pitch_set_type=''){
		if ( ! $tables::isASPN($aspn) ) {
			throw new Exception($aspn . ' is NOT an ASPN value.');
		}
		if ( ! $tables::isPitchSetType($pitch_set_type) ) {
			throw new Exception($pitch_set_type . ' is NOT a pitch set type.');
		}
		$this->_root = substr($aspn,0,-1);
		$this->_type = $pitch_set_type;
		foreach ( $tables::getPitchSetIntervals($pitch_set_type) as $pitch_set_tone => $interval ) {
			try {
				$this->addTones($this->_getToneByIntervalAsc($aspn, $interval, $tables));
				$this->_pitch_set_tone_index[] = $pitch_set_tone;
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
	}
	
	public function addTones(Tone $tone){
		$this->_tone_set[] = $tone;
	}
	
	public function getToneSet(){
		return $this->_tone_set;
	}
	
	public function permuteSet(){}
	public function retrogradeSet(){}
	public function truncateSet(){}
	public function invertSet(){}
	public function transposeSet(){}
	public function filterByRangeSet(){}
	public function extendRangeSet(){}
}
?>
