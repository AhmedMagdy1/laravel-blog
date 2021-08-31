<?php

namespace App\Service\Blog;

use App\Models\Blog\Status;

class StatusService
{
    function getAll()
    {
        return Status::all();
    }
}
