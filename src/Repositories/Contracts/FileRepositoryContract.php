<?php
/**
 * Created by LazyCrud - @DyanGalih <dyan.galih@gmail.com>
 */

namespace WebAppId\Content\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use WebAppId\Content\Models\File;
use WebAppId\Content\Repositories\Requests\FileRepositoryRequest;

/**
 * @author: Dyan Galih<dyan.galih@gmail.com>
 * Date: 04:10:49
 * Time: 2020/04/22
 * Class FileRepositoryContract
 * @package WebAppId\Content\Repositories\Contracts
 */
interface FileRepositoryContract
{
    /**
     * @param FileRepositoryRequest $dummyRepositoryClassRequest
     * @param File $file
     * @return File|null
     */
    public function store(FileRepositoryRequest $dummyRepositoryClassRequest, File $file): ?File;

    /**
     * @param int $id
     * @param FileRepositoryRequest $dummyRepositoryClassRequest
     * @param File $file
     * @return File|null
     */
    public function update(int $id, FileRepositoryRequest $dummyRepositoryClassRequest, File $file): ?File;

    /**
     * @param int $id
     * @param File $file
     * @return File|null
     */
    public function getById(int $id, File $file): ?File;

    /**
     * @param int $id
     * @param File $file
     * @return bool
     */
    public function delete(int $id, File $file): bool;

    /**
     * @param File $file
     * @param int $length
     * @return LengthAwarePaginator
     */
    public function get(File $file, int $length = 12): LengthAwarePaginator;

    /**
     * @param File $file
     * @return int
     */
    public function getCount(File $file): int;

    /**
     * @param string $q
     * @param File $file
     * @param int $length
     * @return LengthAwarePaginator
     */
    public function getWhere(string $q, File $file, int $length = 12): LengthAwarePaginator;

    /**
     * @param string $q
     * @param File $file
     * @param int $length
     * @return int
     */
    public function getWhereCount(string $q, File $file, int $length = 12): int;

    /**
     * @param string $name
     * @param File $file
     * @return File|null
     */
    public function getFileByName(string $name, File $file): ?File;
}
