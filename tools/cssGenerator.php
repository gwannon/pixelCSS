<?php

$size = 24;

for ($i = 1; $i <= $size; $i ++) {
  echo ".sprite > p.w".$i.", .sprite.w".$i.", .animation.w".$i." { width: calc(var(--pixel-size) * ".$i."); }\n";
  echo ".sprite > p.h".$i.", .sprite.h".$i.", .animation.h".$i." { height: calc(var(--pixel-size) * ".$i."); }\n";
  echo ".sprite:hover > p.hover-w".$i." { width: calc(var(--pixel-size) * ".$i."); }\n";
  echo ".sprite:hover > p.hover-h".$i." { height: calc(var(--pixel-size) * ".$i."); }\n\n";
}

echo ".r1 { top: 0%; }\n";
echo ".c1 { left: 0%; }\n\n";

for ($i = 2; $i <= $size; $i ++) {
  for ($y = 2; $y <= $i; $y ++) {
    $step = (100 / $i);
    echo ".h".$i." p.r".$y.", .h".$i.":hover p.hr".$y." { top: ".round(($step * ($y-1)), 2, PHP_ROUND_HALF_DOWN)."%; }\n";
    echo ".w".$i." p.c".$y.", .w".$i.":hover p.hc".$y." { left: ".round(($step * ($y-1)), 2, PHP_ROUND_HALF_DOWN)."%; }\n";
  }
}

?>
