<?php
  $imageUrls[] = "image1.png";
  $imageUrls[] = "image2.png";
  $imageUrls[] = "image3.png";
?>
<!doctype html>
<html>
  <head>
    <title>spritesToHTML</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <link href="../src/css/cssPixel.css" rel="stylesheet">
  </head>
  <body class="white">
    <h1>Original</h1>
    <img src="<?php echo $imageUrl; ?>" />
    <h1>HTML</h1>
    <?php
      foreach ($imageUrls as $imageUrl) {
        list($width, $height, $type, $attr) = getimagesize($imageUrl);
        $im = imagecreatefrompng($imageUrl);
        ?>
      <div class="sprite w<?php echo $width; ?> h<?php echo $height; ?> gray">
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
                  echo '<p class="r'.$r.' c'.($c + 1 - $size).''.($size > 1 ? " w".$size : "").'" style="background-color: rgb('.$colors['red'].','.$colors['green'].','.$colors['blue'].');"></p>'."\n";
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
      </div>
        <?php } ?>
    <a href="https://github.com/gwannon/pixelCSS" style="position: absolute; bottom: 10px; left: 10px; color: #00000; font-family: Arial;">GitHub pixelCSS</a>
  </body>
</html>