<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Response;
use Request;
use Carbon\Carbon;

class NewsController extends Controller
{
    function load()
    {
        $news = News::orderBy('created_date', 'desc')->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.list_article_section', array('news' => $news))->render());
        }
    }

    function delete($language, $id)
    {
        $news = News::find($id);
        $news->delete();
        $news = News::orderBy('created_date', 'desc')->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.list_article_section', array('success' => false, 'news' => $news))->render());
        }
    }
    function get($language, $id)
    {
        $news = News::find($id);
        if (Request::ajax()) {
            return Response::json(array('success' => false,'news' => $news));
        }
    }
    public function update(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {
            $id = $request->input('id');
            $title = $request->input('title');
            $image_url = $request->input('image_url');
            $introtext = $request->input('introtext');
            $hash_tag = $request->input('hash_tag');
            $language = $request->input('language');
            $full_text = $request->input('full_text');

            $news = News::find($id);
            if ($news != null) {
                $news->title = $title;
                $news->image_url = $image_url;
                $news->introtext = $introtext;
                $news->hash_tag = $hash_tag;
                $news->alias = $hash_tag;
                $news->language_id = $language;
                $news->fulltext = $full_text;
                $news->created_date = Carbon::now();
                $news->save();
            }
            return Response::json(['success' => true, 'data' => $news]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }
}
