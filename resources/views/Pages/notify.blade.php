@extends("Layout.master")
@section("content")
<div class="container">
    <div class="space10">&nbsp;</div>
    <h3 class="text-center alert alert-success">Đặt hàng thành công</h3>
    <h3 class="text-center alert alert-success">Chúng tôi sẽ giao hàng đúng hẹn, quý khách kiểm tra đúng hàng mà mình đặt thì mới thanh toán.</h3>
    <div class="space10">&nbsp;</div>
    <div class="text-center">
        <a href="{{route('index')}}" class="btn btn-primary">Quay về tra chủ</a>
    </div>
</div>
@endsection