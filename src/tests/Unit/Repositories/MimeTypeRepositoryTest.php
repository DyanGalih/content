<?php
/**
 * Created by LazyCrud - @DyanGalih <dyan.galih@gmail.com>
 */

namespace WebAppId\Content\Tests\Unit\Repositories;

use Illuminate\Contracts\Container\BindingResolutionException;
use WebAppId\Content\Models\MimeType;
use WebAppId\Content\Repositories\MimeTypeRepository;
use WebAppId\Content\Repositories\Requests\MimeTypeRepositoryRequest;
use WebAppId\Content\Tests\TestCase;
use WebAppId\User\Tests\Unit\Repositories\UserRepositoryTest;

/**
 * @author: Dyan Galih<dyan.galih@gmail.com>
 * Date: 04:25:12
 * Time: 2020/04/22
 * Class MimeTypeServiceResponseList
 * @package WebAppId\User\Tests\Unit\Repositories
 */
class MimeTypeRepositoryTest extends TestCase
{

    /**
     * @var MimeTypeRepository
     */
    private $mimeTypeRepository;

    /**
     * @var UserRepositoryTest
     */
    private $userRepositoryTest;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        try {
            $this->mimeTypeRepository = $this->container->make(MimeTypeRepository::class);
            $this->userRepositoryTest = $this->container->make(UserRepositoryTest::class);
        } catch (BindingResolutionException $e) {
            report($e);
        }
    }

    public function getDummy(int $no = 0): ?MimeTypeRepositoryRequest
    {
        $dummy = null;
        try {
            $dummy = $this->container->make(MimeTypeRepositoryRequest::class);
            $user = $this->container->call([$this->userRepositoryTest, 'testStore']);
            $dummy->name = $this->getFaker()->text(255);
            $dummy->user_id = $user->id;

        } catch (BindingResolutionException $e) {
            report($e);
        }
        return $dummy;
    }

    public function testStore(int $no = 0): ?MimeType
    {
        $mimeTypeRepositoryRequest = $this->getDummy($no);
        $result = $this->container->call([$this->mimeTypeRepository, 'store'], ['mimeTypeRepositoryRequest' => $mimeTypeRepositoryRequest]);
        self::assertNotEquals(null, $result);
        return $result;
    }

    public function testGetById()
    {
        $mimeType = $this->testStore();
        $result = $this->container->call([$this->mimeTypeRepository, 'getById'], ['id' => $mimeType->id]);
        self::assertNotEquals(null, $result);
    }

    public function testGetByName()
    {
        $mimeType = $this->testStore();
        $result = $this->container->call([$this->mimeTypeRepository, 'getByName'], ['name' => $mimeType->name]);
        self::assertNotEquals(null, $result);
    }

    public function testDelete()
    {
        $mimeType = $this->testStore();
        $result = $this->container->call([$this->mimeTypeRepository, 'delete'], ['id' => $mimeType->id]);
        self::assertTrue($result);
    }

    public function testGet()
    {
        for ($i = 0; $i < $this->getFaker()->numberBetween(50, $this->getFaker()->numberBetween(50, 100)); $i++) {
            $this->testStore($i);
        }

        $resultList = $this->container->call([$this->mimeTypeRepository, 'get']);
        self::assertGreaterThanOrEqual(1, count($resultList));
    }

    public function testUpdate()
    {
        $mimeType = $this->testStore();
        $mimeTypeRepositoryRequest = $this->getDummy(1);
        $result = $this->container->call([$this->mimeTypeRepository, 'update'], ['id' => $mimeType->id, 'mimeTypeRepositoryRequest' => $mimeTypeRepositoryRequest]);
        self::assertNotEquals(null, $result);
    }

    public function testGetWhere()
    {
        for ($i = 0; $i < $this->getFaker()->numberBetween(50, $this->getFaker()->numberBetween(50, 100)); $i++) {
            $this->testStore($i);
        }
        $string = 'aiueo';
        $q = $string[$this->getFaker()->numberBetween(0, strlen($string) - 1)];
        $result = $this->container->call([$this->mimeTypeRepository, 'getWhere'], ['q' => $q]);
        self::assertGreaterThanOrEqual(1, count($result));
    }

    public function testGetWhereCount()
    {
        for ($i = 0; $i < $this->getFaker()->numberBetween(50, $this->getFaker()->numberBetween(50, 100)); $i++) {
            $this->testStore($i);
        }
        $string = 'aiueo';
        $q = $string[$this->getFaker()->numberBetween(0, strlen($string) - 1)];
        $result = $this->container->call([$this->mimeTypeRepository, 'getWhereCount'], ['q' => $q]);
        self::assertGreaterThanOrEqual(1, $result);
    }
}
