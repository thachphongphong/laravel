@extends('master')
<div class="mg-page-title parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>
@include('book_now_section')
@section('content_section')
    <div class="mg-blog-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <article class="mg-post">
                            <header>
                                <a href="#"><img src="{{$news->image_url}}" alt="" class="img-responsive"></a>
                                <h2 class="mg-post-title">{{$news->title}}</h2>

                                <div class="mg-post-meta">
                                    <span><a href="#">{{ date('F d, Y', strtotime($news->created_date)) }}</a></span>
                                </div>
                            </header>
                            <div>
                                {!!html_entity_decode($news->fulltext)!!}
                            </div>
                            <footer class="clearfix">
                                <div class="mg-single-post-tags tagcloud">
                                    <a href="#" rel="tag">{{$news->alias}}</a>
                                </div>
                            </footer>
                        </article>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection