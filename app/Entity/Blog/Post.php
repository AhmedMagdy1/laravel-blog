<?php

namespace App\Entity\Blog;

use App\Entity\Entity;

class Post extends Entity
{
    //todo add default layout
    protected $title, $slug, $subtitle, $content_raw, $content_html, $image, $created_by, $is_draft, $published_at,
            $category_id, $layout = '', $seo_title, $keyphrase, $meta_description, $is_active_table_content, $status_id, $keyword_group_id, $tags;


    public function getKeywordGroupId()
    {
        return $this->keyword_group_id;
    }

    public function setKeywordGroupId($keyword_group_id)
    {
        $this->keyword_group_id = $keyword_group_id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function getContentRaw()
    {
        return $this->content_raw;
    }

    public function setContentRaw()
    {
        $this->content_raw = strip_tags($this->content_html);
        return $this;
    }

    public function getContentHtml()
    {
        return $this->content_html;
    }

    public function setContentHtml($content_html)
    {
        $this->content_html = $content_html;
        $this->setContentRaw();
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    public function getIsDraft()
    {
        return $this->is_draft;
    }

    public function setIsDraft()
    {
        $this->is_draft = $this->status_id == 1 ? true : false;
        return $this;
    }

    public function getPublishedAt()
    {
        return $this->published_at;
    }

    public function setPublishedAt($published_at)
    {
        $this->published_at = date("Y-m-d h:i:s", strtotime($published_at));
        return $this;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getLayout()
    {
        return $this->layout;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    public function getSeoTitle()
    {
        return $this->seo_title;
    }

    public function setSeoTitle($seo_title)
    {
        $this->seo_title = $seo_title;
        return $this;
    }

    public function getKeyphrase()
    {
        return $this->keyphrase;
    }

    public function setKeyphrase($keyphrase)
    {
        $this->keyphrase = $keyphrase;
        return $this;
    }

    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    public function setMetaDescription($meta_description)
    {
        $this->meta_description = $meta_description;
        return $this;
    }

    public function getIsActiveTableContent()
    {
        return $this->is_active_table_content;
    }

    public function setIsActiveTableContent($is_active_table_content)
    {
        $this->is_active_table_content = $is_active_table_content;
        return $this;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }

    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
        return $this;
    }

    public function setTags($tags)
    {
        $this->tags = [];
        foreach ($tags as $key => $tag) {
            array_push($this->tags, new Tag( isset($tag['id']) ? $tag['id'] : null, isset($tag['title']) ? $tag['title'] : null ) );
        }
        return $this;
    }
    public function getTags()
    {
        return $this->tags;
    }
}
