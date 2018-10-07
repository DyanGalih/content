<?php

namespace WebAppId\Content\Models;

use WebAppId\Content\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class ContentStatus extends Model
{
    protected $table = 'content_statuses';
    protected $fillable = ['id', 'name'];
    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    public function addContentStatus($request)
    {
        try {
            $this->name = $request->name;
            $this->user_id = $request->user_id;
            $this->save();
            return $this;
        } catch (QueryException $e) {
            report($e);
            return false;
        }

    }

    public function getContentStatus()
    {
        return $this->get();
    }

    public function updateContentStatus($id, $request)
    {
        try {
            $result = $this->find($id);
            if (!empty($result)) {
                $result->name = $request->name;
                $result->user_id = $request->user_id;
                $result->save();
                return $result;
            } else {
                return false;
            }
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    public function getContentStatusById($id)
    {
        return $this->find($id);
    }

    public function getContentStatusesByName($name){
        return $this->where('name', $name)->get();
    }

    public function content(){
        return $this->hasMany(Content::class);
    }
}
