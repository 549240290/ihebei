<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active',function (Builder $builder) {
            $builder->where('active',1);
        });
    }
    //
    public function scopeIsTop($query,$level)
    {
        return $query->where('top','>=',$level);
    }

    public function scopeActive($query)
    {
        return $query->where('acitve',1);
    }

    public function data()
    {
        return $this->hasOne('App\Models\ArticleData');
    }

}
