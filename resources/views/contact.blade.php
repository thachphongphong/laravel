@extends('master')
@section('content_section')

    <div class="mg-page-title parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$constants['contact']['title']}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="mg-page">
        <div class="container">
            <div class="row">

                <div class="col-md-5">
                    <h2 class="mg-sec-left-title">{{$constants['contact']['send_email']}}</h2>

                    <form class="clearfix">
                        <div class="mg-contact-form-input">
                            <label for="full-name">{{$constants['contact']['full_name']}}</label>
                            <input type="text" class="form-control" id="fullname">
                        </div>
                        <div class="mg-contact-form-input">
                            <label for="email">{{$constants['contact']['email']}}</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="mg-contact-form-input">
                            <label for="subject">{{$constants['contact']['subject']}}</label>
                            <input type="text" class="form-control" id="subject">
                        </div>
                        <div class="mg-contact-form-input">
                            <label for="content">{{$constants['contact']['content']}}</label>
                            <textarea class="form-control" id="content" rows="5"></textarea>
                        </div>
                        <input type="submit" id="send-btn" class="btn btn-dark-main pull-right"
                               value="{{$constants['contact']['send']}}">
                    </form>
                </div>
                <div class="col-md-7">
                    <h2 class="mg-sec-left-title">{{$constants['contact']['title']}}</h2>
                    <ul class="mg-contact-info">
                        <li><i class="fa fa-map-marker"></i> {{$contact->address}}</li>
                        <li><i class="fa fa-phone"></i> {{$contact->telephone}}</li>
                        <li><i class="fa fa-mobile"></i> {{$contact->phone}}</li>
                        <li><i class="fa fa-envelope"></i> <a href="mailto:{{$contact->email_to}}">{{$contact->email_to}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection