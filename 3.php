<?php
function myReduce(array $array, callable $callback, int $initial = null): int
{
   $acc = $initial;
   foreach ($array as $a)
      $acc = $callback($acc, $a);
   return $acc;
}


echo (myReduce([1, 2, 3], function (int $a, int $b) {
   return $a + $b;
}, 0));
