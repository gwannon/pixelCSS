<?php

$color[] = "aliceblue";
$color[] = "antiquewhite";
$color[] = "aqua";
$color[] = "aquamarine";
$color[] = "azure";
$color[] = "beige";
$color[] = "bisque";
$color[] = "black";
$color[] = "blanchedalmond";
$color[] = "blue";
$color[] = "blueviolet";
$color[] = "brown";
$color[] = "burlywood";
$color[] = "cadetblue";
$color[] = "chartreuse";
$color[] = "chocolate";
$color[] = "coral";
$color[] = "cornflowerblue";
$color[] = "cornsilk";
$color[] = "crimson";
$color[] = "cyan";
$color[] = "darkblue";
$color[] = "darkcyan";
$color[] = "darkgoldenrod";
$color[] = "darkgray";
$color[] = "darkgreen";
$color[] = "darkkhaki";
$color[] = "darkmagenta";
$color[] = "darkolivegreen";
$color[] = "darkorange";
$color[] = "darkorchid";
$color[] = "darkred";
$color[] = "darksalmon";
$color[] = "darkseagreen";
$color[] = "darkslateblue";
$color[] = "darkslategray";
$color[] = "darkturquoise";
$color[] = "darkviolet";
$color[] = "deeppink";
$color[] = "deepskyblue";
$color[] = "dimgray";
$color[] = "dodgerblue";
$color[] = "firebrick";
$color[] = "floralwhite";
$color[] = "forestgreen";
$color[] = "fuchsia";
$color[] = "gainsboro";
$color[] = "ghostwhite";
$color[] = "gold";
$color[] = "goldenrod";
$color[] = "gray";
$color[] = "green";
$color[] = "greenyellow";
$color[] = "honeydew";
$color[] = "hotpink";
$color[] = "indianred";
$color[] = "indigo";
$color[] = "ivory";
$color[] = "khaki";
$color[] = "lavender";
$color[] = "lavenderblush";
$color[] = "lawngreen";
$color[] = "lemonchiffon";
$color[] = "lightblue";
$color[] = "lightcoral";
$color[] = "lightcyan";
$color[] = "lightgoldenrodyellow";
$color[] = "lightgreen";
$color[] = "lightgray";
$color[] = "lightpink";
$color[] = "lightsalmon";
$color[] = "lightseagreen";
$color[] = "lightskyblue";
$color[] = "lightslategray";
$color[] = "lightsteelblue";
$color[] = "lightyellow";
$color[] = "lime";
$color[] = "limegreen";
$color[] = "linen";
$color[] = "magenta";
$color[] = "maroon";
$color[] = "mediumaquamarine";
$color[] = "mediumblue";
$color[] = "mediumorchid";
$color[] = "mediumpurple";
$color[] = "mediumseagreen";
$color[] = "mediumslateblue";
$color[] = "mediumspringgreen";
$color[] = "mediumturquoise";
$color[] = "mediumvioletred";
$color[] = "midnightblue";
$color[] = "mintcream";
$color[] = "mistyrose";
$color[] = "moccasin";
$color[] = "navajowhite";
$color[] = "navy";
$color[] = "navyblue";
$color[] = "oldlace";
$color[] = "olive";
$color[] = "olivedrab";
$color[] = "orange";
$color[] = "orangered";
$color[] = "orchid";
$color[] = "palegoldenrod";
$color[] = "palegreen";
$color[] = "paleturquoise";
$color[] = "palevioletred";
$color[] = "papayawhip";
$color[] = "peachpuff";
$color[] = "peru";
$color[] = "pink";
$color[] = "plum";
$color[] = "powderblue";
$color[] = "purple";
$color[] = "red";
$color[] = "rosybrown";
$color[] = "royalblue";
$color[] = "saddlebrown";
$color[] = "salmon";
$color[] = "sandybrown";
$color[] = "seagreen";
$color[] = "seashell";
$color[] = "sienna";
$color[] = "silver";
$color[] = "skyblue";
$color[] = "slateblue";
$color[] = "slategray";
$color[] = "snow";
$color[] = "springgreen";
$color[] = "steelblue";
$color[] = "tan";
$color[] = "teal";
$color[] = "thistle";
$color[] = "tomato";
$color[] = "turquoise";
$color[] = "violet";
$color[] = "wheat";
$color[] = "white";
$color[] = "whitesmoke";
$color[] = "yellow";
$color[] = "yellowgreen ";

$color[] = array("label" => "gb-background", "code" => "#cadc9f");
$color[] = array("label" => "gb-darkgreen", "code" => "#0f380f");
$color[] = array("label" => "gb-green", "code" => "#306230");
$color[] = array("label" => "gb-palegreen", "code" => "#8bac0f");
$color[] = array("label" => "gb-lightgreen", "code" => "#9bbc0f");

foreach ($color as $key => $c) {
  if (is_array($c)) {
    echo ".".trim($c["label"])." { background: ".trim($c["code"])."; }\n";
    echo ".to_".trim($c["label"])." { animation-name: tc".$key."; }\n";
    echo "@keyframes tc".$key." { to { background: ".trim($c["code"])."; } }\n";
    $colors[] = $c["label"];
  } else {
    echo ".".trim($c)." {  background: ".trim($c)."; }\n";
    echo ".to_".trim($c)." { animation-name: tc".$key."; }\n";
    echo "@keyframes tc".$key." { to { background: ".trim($c)."; } }\n";
    $colors[] = $c;
  }
}

echo ".to_".implode(", .to_", $colors)."\n{ animation-duration: var(--color-animation-duration); animation-iteration-count: infinite; animation-direction: alternate; }\n";

?>