<h1 style="font-weight: 300">Có một khách hàng vừa gởi email liên hệ:</h1>
<form>
    <div>
        <label for="name">Họ tên</label>
        <label for="name">{{$data->name}}</label>
    </div>
    <div>
        <label for="email">Email</label>
        <label for="email">{{$data->email}}</label>
    </div>
    <div>
        <label for="title">Tiêu đề</label>
        <label for="title">{{$data->title}}</label>
    </div>
    <div>
        <label for="content">Nội dung</label>
        <p>{{$data->content}}</p>
    </div>
</form>