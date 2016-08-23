@extends('master')
@section('content_section')
    @include('title_section')
    <div class="mg-blog-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        @foreach($news as $new)
                            <article class="mg-post">
                                <header>
                                    @if($new->image_url)
                                        <a href="{{Request::url()}}/{{$new->id}}"><img src="{{$new->image_url}}" alt=""
                                                                                         class="img-responsive"></a>
                                    @endif
                                    <h2 class="mg-post-title"><a href="./news/{{$new->id}}" rel="bookmark">{{$new->title}}</a></h2>

                                    <div class="mg-post-meta">
                                        <span><a href="{{Request::url()}}/{{$new->id}}">{{ date('F d, Y', strtotime($new->created_date)) }}</a></span>
                                        <span>by <a href="#">Admin</a></span>
                                    </div>
                                </header>
                                <div>
                                    {!!html_entity_decode($new->introtext)!!}
                                </div>
                                <footer class="clearfix">
                                    <a href="{{Request::url()}}/{{$new->id}}" class="mg-read-more">Continue Reading <i
                                                class="fa fa-long-arrow-right"></i></a>
                                </footer>
                            </article>
                        @endforeach
                    </main>
                </div>

            </div>
        </div>
    </div>


@endsection