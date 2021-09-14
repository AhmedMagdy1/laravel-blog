<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'slug', 'title', 'subtitle', 'content_raw', 'content_html', 'image',
        'created_by', 'is_draft', 'published_at', 'category_id', 'layout', 'seo_title', 'keyphrase', 'meta_description', 'is_active_table_content', 'status_id', 'keyword_group_id'];

    function tags(){
        return $this->belongsToMany('App\Models\Blog\Tag', 'post_tag_pivot', 'post_id', 'tag_id')->withTimestamps();
    }

}
