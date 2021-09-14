<?php

namespace App\Service\Blog;

use App\Http\Helpers\Lookups;
use App\Models\Blog\Category;
use App\Models\Blog\Status;

class StatusService
{
    function getAll()
    {
        return Status::all();
    }
    function getLookups()
    {
        return Lookups::format($this->getAll());

    }
}
