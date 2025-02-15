<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public $breadcrumbs = [];

    public function __construct(
        $categoryId,
        $title = ''
    ) {
        $cats = globalData('categories');
        $breadcrumbs = $this->generateBreadcrumbs($categoryId, $cats);

        $breadcrumbs[] = (object) [
            'title' => $title,
            'alias' => null
        ];

        $this->breadcrumbs = $breadcrumbs;
    }

    private function generateBreadcrumbs($categoryId, $cats, $array = [])
    {
        $item = $cats->find($categoryId);

        array_unshift($array, (object) [
            'title' => $item->title,
            'alias' => $item->alias
        ]);

        if ($item->parent_id) {
            return $this->generateBreadcrumbs($item->parent_id, $cats, $array);
        }

        return $array;
    }

    public function render(): View
    {
        return view('components.breadcrumbs', [
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }
}
