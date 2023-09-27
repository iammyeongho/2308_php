<?php
    // while
    $base = 10;
    $x = $base;

    while($x >= 1)
    {
        $gap = $x - 1;
        $line = $base;
        while($line >= 1)
        {
			if($gap >= 1) {
				echo " ";
			} else {
				echo "*";
			}
            $line--;
			$gap--;
        }

		$x--;
        echo "\n";
    }

?>