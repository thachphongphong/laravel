<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Response;
use Request;

class NewsController extends Controller
{
    function load()
    {
        $news = News::paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.list_article_section', array('news' => $news))->render());
        }
    }

    function delete($language, $id)
    {
        $news = News::find($id);
        $news->delete();
        $news = News::orderBy('created_date','desc')->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.list_article_section', array('success' => false,'news' => $news))->render());
        }
    }
}
