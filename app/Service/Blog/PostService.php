<?php

namespace App\Service\Blog;


use App\Entity\Blog\Post;
use App\Models\Blog\Post as PostModel;
use Illuminate\Support\Facades\Redirect;

class PostService
{
    function create($request)
    {
        $postObject = $this->buildObject($request);
        $postResult = $this->store($postObject);
        $tagService = new TagService;
        $tags = $tagService->findOrCreate($postObject->getTags());
        $this->attachTags($postResult, $tags);
    }

    function buildObject($data)
    {
        $post = new Post;
        $post->setTitle(isset($data['title']) ? $data['title'] : '')
            ->setSlug(isset($data['slug']) ? $data['slug'] : '')
            ->setSubtitle(isset($data['subtitle']) ? $data['subtitle'] : '')
            ->setContentHtml(isset($data['content_html']) ? $data['content_html'] : '')
            ->setSeoTitle(isset($data['seo_title']) ? $data['seo_title'] : '')
            ->setKeyphrase(isset($data['keyphrase']) ? $data['keyphrase'] : '')
            ->setMetaDescription(isset($data['meta_description']) ? $data['meta_description'] : '')
            ->setStatusId(isset($data['status_id']) ? $data['status_id'] : '')
            ->setPublishedAt(isset($data['published_at']) ? $data['published_at'] : '')
            ->setCategoryId(isset($data['category_id']) ? $data['category_id'] : '')
            ->setImage(isset($data['image']) ? $data['image'] : '')
            ->setMetaDescription(isset($data['meta_description']) ? $data['meta_description'] : '')
            ->setKeywordGroupId(isset($data['keyword_group_id']) ? $data['keyword_group_id'] : '')
            ->setIsActiveTableContent(isset($data['is_active_table_content']) ? $data['is_active_table_content'] : '')
            ->setTags(isset($data['tags']) ? $this->formatTags($data['tags']) : [])
            ->setIsDraft()
            ->setCreatedBy(auth()->user()->id);
        return $post;
    }
    function formatTags($tags)
    {
        $result = [];
        foreach ($tags as $key => $tag) {
            if(is_numeric( $tag)) {$result[$key] = ['id' => $tag]; continue;}
            $result[$key] = ['title' => $tag];
        }
        return $result;
    }
    function store($post)
    {
        return PostModel::create($post->toArray(['tags', 'id']));
    }
    function attachTags($postObject, $tags)
    {
        return $postObject->tags()->attach( $this->getTagsIds($tags) );
    }
    function getTagsIds($tags)
    {
        $ids = [];
        foreach ($tags as $tag) { array_push($ids, $tag->id); }
        return $ids;
    }

}
