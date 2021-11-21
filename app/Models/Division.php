<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';

    protected $fillable = ['name', 'parent_division_id', 'level', 'collaborators', 'ambassador'];

    public $appends = ['parent_division_name', 'subdivisions'];


    public function getParentDivisionNameAttribute()
    {
        $parentName = '';
        $parentId = $this->parent_division_id;
        if($parentId){
            $model = Model::find($parentId);
            $parentName = $model->name;
        }
        return $parentName;
    }

    public function getSubdivisionsAttribute()
    {
        return Model::where('parent_division_id', $this->id)->get();
    }

}
