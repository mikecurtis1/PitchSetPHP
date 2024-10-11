<?php 

class Dyad extends Interval implements ToneSet
{
	public function __construct(MusicTables $tables, $aspn='', $interval=''){
		if ( ! $tables::isASPN($aspn) ) {
			throw new Exception($aspn . ' is NOT an ASPN value.');
		} else {
			$this->addTones(Tone::create($tables, $aspn));
		}
		try {
			$this->addTones($this->_getToneByIntervalAsc($aspn, $interval, $tables));
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
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
