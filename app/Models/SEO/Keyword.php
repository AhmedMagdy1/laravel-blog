<?php

namespace App\Models\SEO;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['keyword', 'search_volume', 'kgr', 'all_in_title', 'keyword_group_id'];


}
