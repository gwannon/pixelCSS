<?php
  $imageUrls[0] = "temp/stan0.png";
  $imageUrls[1] = "temp/stan1.png";
  $imageUrls[2] = "temp/stan2.png";
  $imageUrls[3] = "temp/stan3.png";
  $imageUrls[4] = "temp/stan4.png";
  $imageUrls[5] = "temp/stan5.png";
  $imageUrls[6] = "temp/stan6.png";
  $imageUrls[7] = "temp/stan7.png";
  $imageUrls[8] = "temp/stan8.png";
  $imageUrls[9] = "temp/stan9.png";
  $imageUrls[10] = "temp/stan10.png";
  $imageUrls[11] = "temp/stan11.png";
  $imageUrls[12] = "temp/stan12.png";
  $pixel_size = 5;
  list($width, $height, $type, $attr) = getimagesize($imageUrls[0]);
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
        </g>
      <?php } ?>
    </svg>
  </body>
</html>