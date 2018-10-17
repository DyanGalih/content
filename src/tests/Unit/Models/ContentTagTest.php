<?php

namespace WebAppId\Content\Tests\Unit\Models;

use WebAppId\Content\Tests\Unit\Models\ContentTest;
use WebAppId\Content\Tests\Unit\Models\TagTest;
use WebAppId\Content\Repositories\ContentTagRepository;
use WebAppId\Content\Tests\TestCase;

class ContentTagTest extends TestCase
{
    private $contentTest;
    private $tagTest;
    private $contentTag;
    private $resultTagTest;

    private $objContentTag;

    public function setUp(){
        parent::setUp();
        $this->start();
    }

    public function start(){
        $this->contentTest = new ContentTest;
        $this->contentTest->setUp();
        $this->tagTest = new TagTest;
        $this->tagTest->setUp();
        $this->contentTag = new ContentTagRepository;
        $this->objContentTag = new \StdClass;
    }

    public function createDummyContent(){
        return $this->contentTest->createContent();
    }

    public function createDummyTag(){
        return $this->tagTest->createTag();
    }

    public function createDummy(){
        $resultContentTest = $this->createDummyContent();
        $this->resultTagTest = $this->createDummyTag();

        $this->objContentTag->content_id = $resultContentTest->id;
        $this->objContentTag->tag_id = $this->resultTagTest->id;
        $this->objContentTag->user_id = '1';
        return $this->objContentTag;
    }

    public function createContentTag(){
        $this->createDummy();
        $resultContentTag = $this->contentTag->addContentTag($this->objContentTag);
        if(!$resultContentTag){
            $this->assertTrue(false);
        }else{
            return $resultContentTag;
        }
    }

    public function testAddContentTag(){
        $resultContentTag = $this->createContentTag();
        if($resultContentTag!=false){
            $this->assertTrue(true);
        }
    }

    public function testCheckContentTag(){
        $resultContentTag = $this->createContentTag();
        if($resultContentTag!=false){
            $this->assertTrue(true);
            $contentData = $this->contentTest->getContent()->find(1);
            $this->assertEquals($contentData->tag[0]->name, $this->resultTagTest->name);
        }
    }
}