<?php

/**
 * Function Helper
 */

class FuncHelp {

	public function getDateTime($time, $secs = null) {
		$startTime = 1423771200;
		if(is_numeric($time)) {
			$getTime = $time - $startTime;
			if($getTime > 0) {
				$return = '';
				foreach($this->secondsToTime($getTime, $secs) as $key => $value) {
					$return .= $value . $key . ' ';
				}
				return substr($return, 0, -1);
			} else {
				return 'Waiting&hellip;';
			}
		} else {
			return $time;
		}
	}

	private function secondsToTime($inputSeconds, $secs = null) {

		$secondsInAMinute = 60;
		$secondsInAnHour = 60 * $secondsInAMinute;
		$secondsInADay = 24 * $secondsInAnHour;

		$days = floor($inputSeconds / $secondsInADay);

		$hourSeconds = $inputSeconds % $secondsInADay;
		$hours = floor($hourSeconds / $secondsInAnHour);

		$minuteSeconds = $hourSeconds % $secondsInAnHour;
		$minutes = floor($minuteSeconds / $secondsInAMinute);

		$remainingSeconds = $minuteSeconds % $secondsInAMinute;
		$seconds = ceil($remainingSeconds);

		$obj['d'] = (int) $days;
		$obj['h'] = (int) $hours;
		$obj['m'] = (int) $minutes;
		if(!is_null($secs)) {
			$obj['s'] = (int) $seconds;
		}
		return $obj;
	}

}
