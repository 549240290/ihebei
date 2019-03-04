<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Channel;

class MenusComposer
{
    protected $channel;

    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function compose( View $view)
    {
        $view->with('channel',$this->channel->get());
    }
}