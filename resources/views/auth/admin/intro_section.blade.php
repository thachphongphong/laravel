<form id="introduction">
    @foreach ($abouts as $ab)
        <div class="row">
            <div class="col-md-12">
                <div class="mg-contact-form-input">
                    <textarea class="form-control" rows="5">{{$ab ->content}}</textarea>
                    <input type="button" onclick="saveAbout(this);" content-id="{{$ab ->id}}" lang-id="{{$ab ->language_id}}" class="btn btn-xs btn-primary" value="Save">  
                </div>                
            </div>
        </div>
        <div class="row">
            @if ($ab ->image_url != "" && is_array(explode(',', $ab ->image_url)))
                @if (count(explode(',', $ab ->image_url)) == 2)
                    @foreach( explode(',', $ab ->image_url) as $url)
                        <div class="col-sm-6">
                            <div class="mg-contact-form-input">
                                <img id="img-{{$ab ->id}}" src="{{asset($url)}}" alt="pearl sea hotel" class="img-responsive center-block">  
                                <input type="button" onclick="openConfirm(this);" img-url="{{$url}}" content-id="{{$ab ->id}}" lang-id="{{$ab ->language_id}}" class="btn btn-xs  btn-danger" value="Delete">
                           </div>                
                       </div>
                    @endforeach
                @elseif (count(explode(',', $ab ->image_url)) == 3)
                    @foreach( explode(',', $ab ->image_url) as $url)
                        <div class="col-sm-4">
                             <div class="mg-contact-form-input">
                                <img id="img-{{$ab ->id}}" src=" {{asset($url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                                <input type="button" onclick="openConfirm(this);" img-url="{{$url}}" content-id="{{$ab ->id}}" lang-id="{{$ab ->language_id}}" class="btn btn-xs btn-xsn btn-danger" value="Delete">
                            </div>
                        </div>
                    @endforeach
                @elseif (count(explode(',', $ab ->image_url)) == 4)
                    @foreach( explode(',', $ab ->image_url) as $url)
                        <div class="col-sm-3">
                        <div class="mg-contact-form-input">
                            <img id="img-{{$ab ->id}}" src=" {{asset($url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                            <input type="button" onclick="openConfirm(this);" img-url="{{$url}}" content-id="{{$ab ->id}}" lang-id="{{$ab ->language_id}}" class="btn btn-xs btn-danger" value="Delete">
                        </div>
                        </div>
                    @endforeach
                @elseif(count(explode(',', $ab ->image_url)) == 1)
                    <div class="col-xs-12">
                    <div class="mg-contact-form-input">
                            <img id="img-{{$ab ->id}}" src=" {{asset($ab ->image_url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                            <input type="button" onclick="openConfirm(this);" img-url="{{$ab ->image_url}}" content-id="{{$ab ->id}}" lang-id="{{$ab ->language_id}}" class="btn btn-xs btn-danger" value="Delete">
                    </div>
                    </div>
                @endif
                 <input type="button" onclick="openUploadImageAbout(this);" content-id="{{$ab ->id}}" lang-id="{{$ab ->language_id}}" class="btn btn-xs  btn-primary" value="Add"> 
            @endif
        </div>
        <hr/>
    @endforeach    
</form>