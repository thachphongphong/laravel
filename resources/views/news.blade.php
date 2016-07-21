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
                                    <h2 class="mg-post-title"><a href="#" rel="bookmark">{{$new->title}}</a></h2>

                                    <div class="mg-post-meta">
                                        <span><a href="#">{{ date('F d, Y', strtotime($new->created_date)) }}</a></span>
                                        <span>by <a href="#">Admin</a></span>
                                    </div>
                                </header>
                                <div>
                                    {!!html_entity_decode($new->introtext)!!}
                                </div>
                                <footer class="clearfix">
                                    <a href="#" class="mg-read-more">Continue Reading <i class="fa fa-long-arrow-right"></i></a>
                                </footer>
                            </article>
                        @endforeach
                    </main>
                </div>

            </div>
        </div>
    </div>


@endsection