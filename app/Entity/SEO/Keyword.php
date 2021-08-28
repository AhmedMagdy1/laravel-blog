<?php

namespace App\Entity\SEO;

use App\Entity\Entity;

class Keyword extends Entity
{
    protected $keyword, $search_volume, $kgr, $all_in_title;

    public function __construct($keyword, $searchVolume, $kgr, $allInTitle, $id = null)
    {
        $this->id = $id;
        $this->keyword = $keyword;
        $this->search_volume = $searchVolume;
        $this->kgr = $kgr;
        $this->all_in_title = $allInTitle;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function getSearchVolume()
    {
        return $this->search_volume;
    }

    public function getKgr()
    {
        return $this->kgr;
    }

    public function getAllInTitle()
    {
        return $this->all_in_title;
    }

}
