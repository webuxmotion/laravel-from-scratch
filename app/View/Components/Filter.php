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
}