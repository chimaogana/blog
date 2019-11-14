<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\Category;
use App\Model\user\Tag;

class HomeController extends Controller
{
    public function index(){
        $posts=post::where('status',1)->orderBy('created_at','Desc')->paginate(5);    
        return view('user/blog', compact('posts'));
    }
    public function tag(Tag $Tag){
        $posts = $Tag->posts();
        return view('user/blog', compact('posts'));
    }

    public function category(Category $Category){

        $posts = $Category->posts();
        return view('user/blog', compact('posts'));
    }

}
