<?php

namespace App\Models\SEO;

use Illuminate\Database\Eloquent\Model;

class KeywordGroup extends Model
{
    protected $fillable = ['main_keyword', 'assigned_to', 'created_by', 'notes'];
}
