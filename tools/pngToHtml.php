<?php
  $imageUrl = "image.png";
  list($width, $height, $type, $attr) = getimagesize($imageUrl);
  $im = imagecreatefrompng($imageUrl);
?>
<!doctype html>
<html>
  <head>
    <title>pngToHTML</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <link href="../src/css/cssPixel.css" rel="stylesheet">
  </head>
  <body class="white">
    <h1>Original</h1>
    <img src="<?php echo $imageUrl; ?>" />
    <h1>HTML</h1>
    <div class="sprite w<?php echo $width; ?> h<?php echo $height; ?> white">
      <?php
        for($y = 0; $y < $height; $y++) {
          for($x = 0; $x < $width; $x++) {          
            $rgb = imagecolorat($im, $x, $y);
            $colors = imagecolorsforindex($im, $rgb);
            if($colors['alpha'] != 127) echo '<p class="r'.($y+1).' c'.($x+1).'" style="background-color: rgb('.$colors['red'].','.$colors['green'].','.$colors['blue'].');"></p>'."\n";
          }
        }
      ?>
    </div>
    <a href="https://github.com/gwannon/pixelCSS" style="position: absolute; bottom: 10px; left: 10px; color: #ffffff; font-family: Arial;">GitHub pixelCSS</a>
  </body>
</html>