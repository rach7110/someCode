<?php 

use PHPUnit\Framework\TestCase;
use App\CategoryTree;

class CategoryTreeTest extends TestCase
{

    protected $category_tree;
    
    public function setUp() 
    {
        $this->category_tree = new CategoryTree;
    }

    /** @test */
    public function a_category_has_a_name()
    {
        $this->category_tree->addCategory('music', 'sound');
        $this->assertEquals('music', $this->category_tree->tree[0]['category']);
    }

    /** @test */
    public function a_category_has_a_parent()
    {
        $this->category_tree->addCategory('music', 'sound');
        $this->assertEquals('sound', $this->category_tree->tree[0]['parent']);
    }

    /** 
        @test 
        @expectedException Exception
    */
    public function a_category_must_have_parent_or_be_be_root()
    {
        $this->category_tree->addCategory('music', '');        
    }

    /** 
        @test 
        @expectedException Exception
    */
        public function a_cateogry_has_unique_name()
        {
            $this->category_tree->addCategory('rock', 'music');
            $this->category_tree->addCategory('classical', 'music');
            $this->category_tree->addCategory('rock', 'music');
        }
    
    /** @test */
    public function a_parent_returns_its_children()
    {
        $this->category_tree->addCategory('rock', 'music');
        $this->category_tree->addCategory('classical', 'music');

        $parent = 'music';
        $children = $this->category_tree->getChildren($parent);

        $this->assertEquals(['rock','classical'], $children );
    }
    
}

