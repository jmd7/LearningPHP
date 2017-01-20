<?php
	define ('LVT', 'last_visit_time');

	if (array_key_exists(LVT, $_COOKIE)) {
		$lv = $_COOKIE[LVT];
		$datelv = date_create();
		date_timestamp_set($datelv, $lv);

		$now = time();
		$datenow = date_create();
		date_timestamp_set($datenow, $now);

		$diff = date_diff($datelv, $datenow);

		$res = setcookie(LVT, $now);
		if ($res) {
			print("Last view : ".$diff->format("%y y %m m %d d %h h %i i %s s ago."));
		} else {
			print("Cookie setting failed");
		}
	} else {
		$res = setcookie(LVT, time(), time()+60*60*24);
		if ($res) {
			print("[NEVER]");
		} else {
			print("Cookie setting failed");
		}
	}
?>