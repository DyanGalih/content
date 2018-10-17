<?php

namespace WebAppId\Content\Tests\Unit\Models;

use WebAppId\Content\Repositories\CategoryRepository;
use WebAppId\Content\Tests\TestCase;

class CategoryTest extends TestCase
{
    private $objCategory;

    private $category;


    public function getObjCategory(){
        return $this->objCategory;
    }

    public function createDummy()
    {
        $this->objCategory->code = $this->faker->word;
        $this->objCategory->name = $this->faker->word;
        $this->objCategory->user_id = '1';
        return $this->objCategory;
    }

    public function start(){
        $this->objCategory = new \StdClass;
        $this->category = new CategoryRepository;
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->start();
    }

    public function createCategory(){
        $this->createDummy();
        return $this->category->addCategory($this->objCategory);
    }

    public function testAddCategory()
    {
        $result = $this->createCategory();
        
        if(!$result){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }

    public function testGetCategoryByCode(){
        $result = $this->createCategory();

        if(!$result){
            $this->assertTrue(false);
        }else{
            $result = $this->category->getCategoryByCode($this->objCategory->code);
            if($result!=null){
                $this->assertTrue(true);
                $this->assertEquals($this->objCategory->code, $result->code);
                $this->assertEquals($this->objCategory->name, $result->name);
            }else{
                $this->assertTrue(false);
            }
        }
    }

    public function testUpdateCategory(){
        $result = $this->createCategory();

        if(!$result){
            $this->assertTrue(false);
        }else{
            $result = $this->category->getOne($result->id);
            if($result==null){
                $this->assertTrue(true);
            }else{
                $this->createDummy();
                $result = $this->category->updateCategory($this->objCategory,$result->id);
                if($result){
                    $this->assertTrue(true);
                }else{
                    $this->assertTrue(false);
                }
            }
        }
    }

    public function testDeleteCategory(){
        $result = $this->createCategory();
        
        if(!$result){
            $this->assertTrue(false);
        }else{
            $result = $this->category->deleteCategory($result->id);
            if($result){
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }
        }
    }
}
