<?php

/**
 * @author @DyanGalih
 * @copyright @2018
 */

namespace WebAppId\Content\Models;

use Illuminate\Database\Eloquent\Model;
use WebAppId\Lazy\Traits\ModelTrait;

/**
 * Class ContentCategory
 * @package WebAppId\Content\Models
 */
class ContentCategory extends Model
{
    //

    use ModelTrait;

    protected $table = 'content_categories';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['id', 'content_id', 'category_id'];

    public function getColumns(bool $isFresh = false)
    {
        $columns = $this->getAllColumn($isFresh);

        $forbiddenField = [
            "created_at",
            "updated_at"
        ];
        foreach ($forbiddenField as $item) {
            unset($columns[$item]);
        }

        return $columns;
    }
}
