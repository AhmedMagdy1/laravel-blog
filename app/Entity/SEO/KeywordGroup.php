<?php

namespace App\Entity\SEO;

use App\Entity\Entity;

class KeywordGroup extends Entity
{
    protected $main_keyword, $created_by, $assigned_to;
    public function __construct($mainKeyword, $createdBy, $assignedTo, $id = null)
    {
        $this->id = $id;
        $this->main_keyword = $mainKeyword;
        $this->created_by = $createdBy;
        $this->assigned_to = $assignedTo;
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

}
