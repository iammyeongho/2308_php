<?php



$file = fopen("test.txt", "w");

	for($i=1; $i <= 19; $i++) {
		// echo $i."단"."\n";
		fwrite($file, $i."단"."\n");
		for($l=1; $l <= 19; $l++) {
			// echo "{$i}x{$l}=".$i*$l."\n";
			fwrite($file, "{$i}x{$l}=".$i*$l."\n");
		}
	}

	fclose($file);






?>