<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Vendor CSS Files -->
  <link href="{{asset('assetss/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    }

    .container {
        width: 50%;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    form {
        text-align: center;
    }

    label {
        font-weight: bold;
    }

    input[type="date"] {
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>
<body>
    <div class="container">
        <h2>Tìm kiếm đơn hàng theo ngày</h2>
        <form action="{{route('findOrder')}}" method="GET">
            <label for="search_date">Chọn ngày: Từ</label>
            <input type="date" id="search_date"
            value="{{$oldFindFirst}}"
            name="first_date">
            <label for="search_date">Đến</label>
            <input type="date" id="search_date"
            value="{{$oldFindEnd}}"
            name="end_date">
            <br><br>
            <input type="submit" value="Tìm kiếm">
            <a href="{{route('findOrder')}}">Làm mới</a>
            <div class="" style="display: flex; justify-content:center; margin-top:30px">
                <div class="" style="border: 1px solid rgb(35, 117, 193); padding: 20px 50px 20px 50px; border-radius: 15px; background-color:rgb(12, 73, 130)">
                    <a href="{{route('dashboard')}}" style="font-size: larger; font-weight:bolder; color:white">Trở về</a>
                </div>
            </div>
        </form>
        <table  style="text-align: center" id="example1" class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Tên mã giảm giá</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thêm lúc</th>
                <th scope="col">Xem chi tiết</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $key => $order)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{number_format($order->price)}} VND</td>
                <td>
                    @if (isset($order->voucher_name))
                        {{$order->voucher_name}}
                    @else
                        Không có phiếu giảm giá
                    @endif
                </td>
                <td>
                    @if ($order->status == 0)
                    Đang Chờ Xác Nhận
                    @elseif ($order->status == 1)
                    Đơn Hàng Đã Đặt
                    @elseif ($order->status == 2)
                    Đã Giao Cho ĐVVC
                    @elseif ($order->status == 3)
                    Đã Nhận Được Hàng
                    @elseif ($order->status == 4)
                    Đơn Hàng Đặt Không Thành Công
                    @endif
                </td>
                <td>{{$order->created_at}}</td>
                <td><a href="{{route('findOrderDetail', ['user_id' => $order->user_id, 'id'=>$order->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-12 pb-1" style="display: flex;  justify-content: center">
            {!! $orders->links() !!}
        </div>
    </div>
</body>
</html>
