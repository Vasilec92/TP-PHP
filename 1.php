<?php
function sequence_in_array(array $needle, array $haystack)
{
   $haystackLength = count($haystack);
   $needleLength = count($needle);

   if ($needleLength > $haystackLength) {
      throw new InvalidArgumentException('$needle array must be smaller than $haystack array.');
   }

   for ($i = 0; $i <= $haystackLength - $needleLength; $i++) {
      $match = 0;
      for ($j = 0; $j < $needleLength; $j++) {
         if ($needle[$j] == $haystack[$i + $j]) {
            $match++;
            if ($match == $needleLength) {
               var_dump($j);
               return TRUE;
            }
         }
      }
   }
   return FALSE;
}

var_dump(sequence_in_array([2, 3, 7], [2, 1, 2, 4, 2, 6,  2, 3, 7]));
