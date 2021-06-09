<?php
$arr = [12, 4, 182, 1, 2.587];
$min = null;
$min_key = null;
$max = null;
$max_key = null;
$i = 0;

while($v = current($arr))
{
    if($v > $max or $max === null)
    {
        $max = $v;
        $max_key = key($arr);
    }

    if($v < $min or $min === null)
    {
        $min = $v;
        $min_key = key($arr);
    }

    next($arr);
}

echo "Min value: $min <br> Min key: $min_key <br>";
echo "Max value: $max <br> Max key: $max_key";
?>