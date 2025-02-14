<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function setMeta($title = null, $description = null, $keywords = null) 
    {
        globalData()->setData('meta', (object) [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords
        ]);
    }
}
