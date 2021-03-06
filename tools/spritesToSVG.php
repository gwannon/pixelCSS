<?php
  $imageUrls[1] = "temp/gg1.png";
  $imageUrls[2] = "temp/gg2.png";
  $imageUrls[3] = "temp/gg3.png";
  $imageUrls[4] = "temp/gg4.png";
  $pixel_size = 5;
  list($width, $height, $type, $attr) = getimagesize($imageUrls[1]);
?>
<!doctype html>
<html>
  <head>
    <title>spritesToSVG</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <link href="../src/css/cssPixel.css" rel="stylesheet">
  </head>
  <body class="black">
    <svg width="<?php echo ($width * $pixel_size); ?>" height="<?php echo ($height * $pixel_size); ?>" class="animation frames<?php echo (isset($imageUrls[0]) ? count($imageUrls)-1 : count($imageUrls)); ?>">
      <?php
        foreach ($imageUrls as $key => $imageUrl) {
          list($width, $height, $type, $attr) = getimagesize($imageUrl);
          $im = imagecreatefrompng($imageUrl);
          ?>
        <g class="sprite"  animation="<?php echo $key; ?>">
          <?php
            $size = 1;
            for($r = 1; $r <= $height; $r++) {
              for($c = 1; $c <= $width; $c++) {          
                $rgb = imagecolorat($im, $c-1, $r-1);
                $colors = imagecolorsforindex($im, $rgb);
                $rgb = imagecolorat($im, $c, $r-1);
                $prev_colors = imagecolorsforindex($im, $rgb);
                if($colors['alpha'] != 127) {
                  /*if ($colors['red'] != $prev_colors['red'] || $colors['green'] != $prev_colors['green'] || $colors['blue'] != $prev_colors['blue']) {*/
                    echo "\t".'<rect x="'.(($c - $size)* $pixel_size).'" y="'.($r * $pixel_size).'" width="'.($size * $pixel_size).'" height="'.(1 * $pixel_size).'" style="fill:rgb('.$colors['red'].','.$colors['green'].','.$colors['blue'].');" />'."\n";
                    $prev_colors = $colors;
                    $size = 1;
                    
                  /*} else {
                  	$size++; 
                  }    */           
                }     
              }
              $size = 1;
              unset($prev_colors);
            }
          ?>
        </g>
      <?php } ?>
    </svg>
  </body>
</html>
