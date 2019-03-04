<?php

namespace App\Http\Controllers;

use App\Models\Article;

class IndexController extends Controller
{
    /* 网站首页
     *      内容主体共3部分
     *          第一部分：   输出4条数据 人工置顶数据
     *          第二部分：   输出推荐内容数据
     *          第三部分：   输出最新数据
     * */
    public function index(){  
        
        $data = [];
        $data['newest'] = Article::latest()->take(50)->get();
        $data['top'] = Article::isTop(1)->latest()->take(4)->get();
        $data['recommend'] = Article::isTop(2)->latest()->take(10)->get();       
        return view('home.index',$data);
    }
}
