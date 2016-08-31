<button class="btn btn-xs btn-primary" onclick="openAddtTour()">Thêm</button>
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr class="success">
            <th>Id</th>
            <th>Thời gian</th>
            <th>Khởi hành</th>
            <th>Điểm đến</th>
            <th>Giá</th>
            <th>Thông tin</th>
            <th>Ảnh</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>

    @foreach ($tours as $tour)
        <?php $i++;?>
        @if($i%2==1)
            <tr class="info">
        @else
            <tr>
                @endif
                <td><b>{{$tour->id}}</b></td>
                <td>{{$tour->duration}}</td>
                <td>{{$tour->departure}}</td>
                <td>{{$tour->arrival}}</td>
                <td>{{$tour->price}}</td>
                <td>{{$tour->note}}</td>
                <td>@if(! empty($tour->imageUrl))
                  <img width ="50" t-url="{{$tour->imageUrl}}" src="{{asset($tour->imageUrl)}}" alt="pearl sea hotel">
                @endif</td>
                <td><input type="button" class="btn btn-xs btn-danger" value="Sửa"  t-id="{{$tour->id}}" onclick="openEditTour(this)"/></td>     
                <td><input type="button" class="btn btn-xs btn-danger" value="Xóa" onclick="deleteTour({{$tour->id}})"/></td>
            </tr>
            @endforeach

    </tbody>
</table>
<div>
    <div style="text-align:center;" id="tour-paging">{{ $tours->links() }}</div>
</div>

<div class="modal fade" id="tourModal" tabindex="-1" role="dialog" aria-labelledby="tourModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="tourModalLabel">Thêm/Sửa tour</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <div class="input-group">
                    <input type = "hidden" id="tourId"> 
                    <input type = "number"  min="0"  oninput="validity.valid||(value='1');" id="duration" class = "form-control" placeholder = "Thời gian"> 
                    <div class = "input-group-addon" id="durationType">
                     <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" checked="" value="day"> Ngày
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions"  value="hour"> Giờ
                    </label>
                   </div> 
                </div>   
            </div>
            <div class="form-group">
              <input type = "text" id="departure" class = "form-control" placeholder = "Khởi hành">
            </div>
             <div class="form-group">
              <input type = "text" id="arrival" class = "form-control" placeholder = "Điểm đến">
            </div>
             <div class="form-group">
              <div class="input-group">
              <input type = "number"  min="0"  oninput="validity.valid||(value='1');" id="price" class = "form-control" placeholder = "Giá">
              <span class = "input-group-addon">VND
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="note" placeholder = "Thông tin"></textarea>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input  id="image" class = "form-control" type="text" placeholder="Ảnh" disabled>
                 <span class = "input-group-btn">
                  <button class = "btn btn-primary" type = "button" onclick="openUploadImageTour()">Upload</button>
                  </span>  
                </div> 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="add-tour" onclick="addTours()">Thêm</button>
          <button type="button" class="btn btn-primary" id="edit-tour" style="display:none;" onclick="editTour()">Sửa</button>
        </div>
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" tabindex="-1" id="messModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>Warning!</strong> <span><span></div>
    </div>
  </div>
</div>