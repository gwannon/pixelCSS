<?php
  $imageUrl = "temp/sonicbg.png";
  list($width, $height, $type, $attr) = getimagesize($imageUrl);
  $im = imagecreatefrompng($imageUrl);
  $pixel_size = 1;
?>
<svg width="<?php echo ($width * $pixel_size); ?>" height="<?php echo ($height * $pixel_size); ?>">
  <?php
    $size = 1;
    for($r = 1; $r <= $height; $r++) {
      for($c = 1; $c <= $width; $c++) {          
        $rgb = imagecolorat($im, $c-1, $r-1);
        $colors = imagecolorsforindex($im, $rgb);
        $rgb = imagecolorat($im, $c, $r-1);
        $prev_colors = imagecolorsforindex($im, $rgb);
        if($colors['alpha'] != 127) {
          if ($colors['red'] != $prev_colors['red'] || $colors['green'] != $prev_colors['green'] || $colors['blue'] != $prev_colors['blue']) {
            echo "\t".'<rect x="'.(($c - $size)* $pixel_size).'" y="'.($r * $pixel_size).'" width="'.($size * $pixel_size).'" height="'.(1 * $pixel_size).'" style="fill:rgb('.$colors['red'].','.$colors['green'].','.$colors['blue'].');" />'."\n";
            $prev_colors = $colors;
            $size = 1;
          } else {
            $size++; 
          }
        }     
      }
      $size = 1;
      unset($prev_colors);
    }
  ?>
</svg>