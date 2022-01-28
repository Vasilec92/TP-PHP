<?php

class Search
{
   private array $needle;
   private array $pos = [];

   public function __construct(array $needle, array $pos)
   {
      $this->needle = $needle;
      $this->pos = $pos;
   }
}

function sequence_in_array(array $needle, array $haystack): Search
{
   $haystackLength = count($haystack);
   $needleLength = count($needle);
   $pos = [];

   if ($needleLength > $haystackLength) {
      throw new InvalidArgumentException('$needle array must be smaller than $haystack array.');
   }

   for ($i = 0; $i <= $haystackLength - $needleLength; $i++) {
      $match = 0;

      for ($j = 0; $j < $needleLength; $j++) {
         if ($needle[$j] == $haystack[$i + $j]) {
            $match++;
            if ($match == $needleLength) {
               array_push($pos, $i);
            }
         }
      }
   }
   return $search = new Search($needle, $pos);
}


var_dump(sequence_in_array([2, 3, 7], [1, 2, 2, 3, 7, 4, 2, 6, 2, 3, 7]));
