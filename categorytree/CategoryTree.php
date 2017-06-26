<?php 

namespace App;

use Exception;

class CategoryTree
{
    public $tree = [];    
    
    public function addCategory($category, $parent)
    {
        if(!is_null($parent) && empty($parent)){
            throw new Exception('A parent category must be supplied or parent must be root.');
        }

        foreach($this->tree as $t){
            if($t['category'] == $category){
                throw new Exception('A category name must be unique.');
            }   
        }

        $this->tree[] = ['category' => $category,'parent' => $parent];
    }
    
    public function getChildren($parent)
    {
        $children = [];

        foreach ($this->tree as $category) {
            if($category['parent'] == $parent){
                $children[] = $category['category'];
            } 
        }
        return $children;
    }
}


$c = new CategoryTree;
$c->addCategory('A', null) ;
$c->addCategory('B', 'A');
$c->addCategory('C', 'A');
echo implode(',', $c->getChildren('A'));

//throw Exception if name is duplicated
// throw Exception if category has no parent and is not root.

