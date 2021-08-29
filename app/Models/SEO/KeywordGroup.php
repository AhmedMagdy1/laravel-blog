<?php

namespace App\Models\SEO;

use Illuminate\Database\Eloquent\Model;

class KeywordGroup extends Model
{
    protected $fillable = ['main_keyword', 'assigned_to', 'created_by', 'notes'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function author()
    {
        return $this->hasOne('App\User', 'id', 'assigned_to');
    }
    public function keywords()
    {
        return $this->hasMany('App\Models\SEO\Keyword', 'keyword_group_id', 'id');
    }

}
