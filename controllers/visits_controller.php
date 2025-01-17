<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class VisitsController extends AppController {

	var $name = 'Visits';
	var $uses = array('Visit');

	function bins($id) {
		# TODO Put this value into a config.
		$bin_count = 10;

		$visits = $this->Visit->find('all', array(
			"conditions" => array("Visit.bookmark_id" => $id)));

		for ($i = 0; $i < $bin_count; $i++) {
			$bins[] = array("hits" => 0);
		}

		foreach ($visits as $v) {
			$time = $v["Visit"]["created"];
			$timestamp = strtotime($time);
			$stamps[] = $timestamp;
		}

		if (count($stamps) <= 1) {
			return null;
		}

		$min = min($stamps);
		$max = max($stamps);

		foreach ($stamps as $stamp) {
			$which = min($bin_count*($stamp-$min)/($max-$min), $bin_count-1);
			$raw_bin[$which][] = $stamp;
			$bins[$which]["hits"]++;
		}
		for ($i = 0; $i < $bin_count; $i++) {
			if (!isset($bins[$i]["title"]) && count($raw_bin[$i]) > 1) {
				$min = min($raw_bin[$i]);
				$max = max($raw_bin[$i]);

				# TODO Put date format into config.
				$bins[$i]["title"] = date("Y-m-d", $min)." &ndash; ".date("Y-m-d", $max);
			}
		}

		return $bins;
	}
}
