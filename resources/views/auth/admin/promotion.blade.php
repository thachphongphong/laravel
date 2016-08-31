<button class="btn btn-xs btn-primary" onclick="openAddPro()">Thêm</button>
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr class="success">
            <th>Id</th>
            <th>Ghi chú</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Giảm giá</th>
            <th>Hiện</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($promotions as $pro)
    <tr>
        <td><b>{{$pro->id}}</b></td>
        <td>{{$pro->description}}</td>
        <td>{{ date('d/m/Y', strtotime($pro->apply_time_from)) }}</td>
        <td>{{ date('d/m/Y', strtotime($pro->apply_time_to)) }}</td>
        <td>{{$pro->sale_off}}</td>
        @if($pro->enabled == 1)
        <td> <i class="fa fa-check-square-o"></i></td>
        @else
        <td> <i class="fa fa-square-o"></i></td>
        @endif
        <td><input type="button" class="btn btn-xs btn-danger" value="Sửa"  p-id="{{$pro->id}}" onclick="openEditPro(this)"/></td>     
        <td><input type="button" class="btn btn-xs btn-danger" value="Xóa" onclick="deletePro({{$pro->id}})"/></td>
    </tr>
    @endforeach

    </tbody>
</table>
<div class="modal fade" id="promotionModal" tabindex="-1" role="dialog" aria-labelledby="promotionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="promotionModal">Thêm/Sửa Khuyến mãi</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <input type = "hidden" id="promotionId" value=""> 
                <textarea class="form-control" id="description" placeholder = "Ghi chú"></textarea> 
            </div>
            <div class="form-group">
              <input type = "text" id="apply_time_from" class = "form-control" placeholder = "Bắt đầu">
            </div>
             <div class="form-group">
              <input type = "text" id="apply_time_to" class = "form-control" placeholder = "Kết thúc">
            </div>
             <div class="form-group">
                <input type = "text"  id="sale_off" class = "form-control" placeholder = "Giảm giá">
            </div>
            <div class="form-group">
              <div class = "input-group" id="showPromotion">
                 <label class="radio-inline">
                  <input type="radio" name="proRadioOptions" checked="" value="1"> Hiện
                </label>
                <label class="radio-inline">
                  <input type="radio" name="proRadioOptions"  value="0"> Ẩn
                </label>
               </div> 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="add-pro" onclick="addPro()">Thêm</button>
          <button type="button" class="btn btn-primary" id="edit-pro" style="display:none;" onclick="editPro()">Sửa</button>
        </div>
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" tabindex="-1" id="messPModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>Warning!</strong> <span><span></div>
    </div>
  </div>
</div>