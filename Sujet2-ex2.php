<?php
$products = [['milk', 3, 3], ['butter', 2.5, 2], ['eggs', .7, 10]];

$hydrate = function () use ($products): array {
   $productsArray = [];

   foreach ($products as $product) {
      $product = new class($product[0], $product[1], $product[2])
      {
         public function __construct(
            public string $name,
            public float $price,
            public float $quantity
         ) {
         }
      };

      array_push($productsArray, $product);
   }
   return $productsArray;
};



function myReduce(array $array, callable $callback, int $initial = null): int
{
   $acc = $initial;
   foreach ($array as $a)
      $acc = $callback($acc, $a);
   return $acc;
}


function getListTotalProductsPrice(array $callback)
{

   $list = [];
   foreach ($callback as $product) {
      //var_dump($product);
      $total = $product->price * $product->quantity;

      array_push($list, $total);
   }
   return $list;
}

var_dump(myReduce(getListTotalProductsPrice($hydrate()), function (int $a, int $b) {
   return $a + $b;
}, 0)); 




//var_dump(getListTotalProductsPrice($hydrate()));
