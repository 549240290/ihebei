<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QL\QueryList;

class SpiderController extends Controller
{
    //
    public function index()
    {
        $ql = QueryList::get('http://www.lgo100.com/a/guandian/yejie/308120.html');
        $body = $ql->find('title')->text();
        dump($body);

    }
}

