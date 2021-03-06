<?php

namespace App\Entity\SEO;

use App\Entity\Entity;

class KeywordGroup extends Entity
{
    protected $main_keyword, $created_by, $assigned_to, $notes;
    protected $keywords = [];
    public function __construct($mainKeyword = '', $createdBy = null, $assignedTo = null, $notes = '', $id = null)
    {
        $this->id = $id;
        $this->main_keyword = $mainKeyword;
        $this->created_by = $createdBy;
        $this->assigned_to = $assignedTo;
        $this->notes = $notes;
    }
    public function addKeywordsLines($lines)
    {
        foreach ($lines as $line){
            if ($this->id != null) $line['keyword_group_id'] = $this->id;
            array_push($this->keywords, $line);
        }
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function removeAllKeywords()
    {
        $this->keywords = [];
        return $this;
    }

    public function getMainKeyword()
    {
        return $this->main_keyword;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function getAssignedTo()
    {
        return $this->assigned_to;
    }

    public function getNotes()
    {
        return $this->notes;
    }

}
