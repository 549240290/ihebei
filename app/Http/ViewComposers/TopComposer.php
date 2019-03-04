<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Article;

class TopComposer
{
    protected $top;

    public function __construct(Article $article)
    {
        $this->top = $article;
    }

    public function compose( View $view)
    {
        $view->with('top',$this->top->get());
    }
}