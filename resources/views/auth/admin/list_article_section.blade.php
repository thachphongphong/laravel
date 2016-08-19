<table class="table table-hover table-bordered table-condensed">
    <thead>
    <tr class="success">
        <th>Tiêu đề</th>
        <th>Tóm tắt nội dung</th>
        <th>Ngôn ngữ</th>
        <th>Chỉnh sửa</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    @foreach ($news as $new)
        <?php $i++; ?>
        @if($i%2==1)
            <tr class="info">
        @else
            <tr>
                @endif
                <td>{{$new->title}}</td>
                <td>{{$new->introtext}}</td>
                @if($new->language_id==1)
                    <td>Tiếng Việt</td>
                @else
                    <td>Tiếng Anh</td>
                @endif
                <td><input type="button" class="btn btn-danger" value="Xóa" onclick="delete_news({{$new->id}});"/></td>
            </tr>
            @endforeach

    </tbody>
</table>
<div>
    <div style="text-align:center;" class="news">{{ $news->links() }}</div>
</div>
