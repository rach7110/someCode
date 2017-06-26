<?php
class Products
{
    public static function sortByPriceAscending($jsonString)
    {
        $products = json_decode($jsonString, true);

        // Obtain a list of columns
        foreach ($products as $key => $row) {
            $name[$key]  = $row['name'];
            $price[$key] = $row['price'];
        }
        
        array_multisort($price, SORT_ASC, $name, SORT_ASC, $products);

        return json_encode($products);
        
    }
}

echo Products::sortByPriceAscending('[{"name":"eggs","price":1},{"name":"bread","price":1},{"name":"coffee","price":9.99},{"name":"rice","price":4.04}]');




// INSTRUCTIONS:
//sort ascending by price
//if two prodcuts have the same price, sort by product name
//return a json object with the above sorted.