<?php
/**
 * Created by LazyCrud - @DyanGalih <dyan.galih@gmail.com>
 */

namespace WebAppId\Content\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use WebAppId\Content\Models\TimeZone;
use WebAppId\Content\Repositories\Requests\TimeZoneRepositoryRequest;

/**
 * @author: Dyan Galih<dyan.galih@gmail.com>
 * Date: 04:54:28
 * Time: 2020/04/22
 * Class TimeZoneRepositoryContract
 * @package WebAppId\Content\Repositories\Contracts
 */
interface TimeZoneRepositoryContract
{
    /**
     * @param TimeZoneRepositoryRequest $dummyRepositoryClassRequest
     * @param TimeZone $timeZone
     * @return TimeZone|null
     */
    public function store(TimeZoneRepositoryRequest $dummyRepositoryClassRequest, TimeZone $timeZone): ?TimeZone;

    /**
     * @param int $id
     * @param TimeZoneRepositoryRequest $dummyRepositoryClassRequest
     * @param TimeZone $timeZone
     * @return TimeZone|null
     */
    public function update(int $id, TimeZoneRepositoryRequest $dummyRepositoryClassRequest, TimeZone $timeZone): ?TimeZone;

    /**
     * @param int $id
     * @param TimeZone $timeZone
     * @return TimeZone|null
     */
    public function getById(int $id, TimeZone $timeZone): ?TimeZone;

    /**
     * @param int $id
     * @param TimeZone $timeZone
     * @return bool
     */
    public function delete(int $id, TimeZone $timeZone): bool;

    /**
     * @param TimeZone $timeZone
     * @param int $length
     * @return LengthAwarePaginator
     */
    public function get(TimeZone $timeZone, int $length = 12): LengthAwarePaginator;

    /**
     * @param TimeZone $timeZone
     * @return int
     */
    public function getCount(TimeZone $timeZone): int;

    /**
     * @param string $q
     * @param TimeZone $timeZone
     * @param int $length
     * @return LengthAwarePaginator
     */
    public function getWhere(string $q, TimeZone $timeZone, int $length = 12): LengthAwarePaginator;

    /**
     * @param string $q
     * @param TimeZone $timeZone
     * @param int $length
     * @return int
     */
    public function getWhereCount(string $q, TimeZone $timeZone, int $length = 12): int;

    /**
     * @param string $name
     * @param TimeZone $timezone
     * @return TimeZone|null
     */
    public function getByName(string $name, TimeZone $timezone): ?TimeZone;
}
