<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Article;

class HotsComposer
{
    protected $hots;

    public function __construct(Article $article)
    {
        $this->hots = $article;
    }

    public function compose( View $view)
    {
        $view->with('hots',$this->hots->get());
    }
}
