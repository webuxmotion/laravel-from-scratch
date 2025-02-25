<?php

namespace App\View\Components;

use App\Models\AttributeGroup;
use Illuminate\View\Component;


class Filter extends Component
{
    public $groups;
    public $attrs;

    public function __construct()
    {
        $this->groups = AttributeGroup::with('attributeValues')->get();
    }

    public function render()
    {
        return view('components.filter');
    }

    public static function getFilter()
    {
        $filter = null;

        if (request()->has('filter')) {
            $filter = request()->filter;
            // replace all, except numters and commas
            $filter = preg_replace('/[^0-9,]/', '', $filter);
        }

        return $filter;
    }
}