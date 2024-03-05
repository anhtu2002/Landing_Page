<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/resources/css/app.css')}}">

    <title>Landing Page</title>
</head>

<body>

    <div class="container mt-5">
        <div class="wrap">
            <div class="header">
                <h4>Hotline: 039.378.7959</h4>
            </div>
            <div class="content">
                <div class="content-left">
                    <div class="left-header">
                        <h2>Đăng ký ngay để nhận mức ưu đãi khủng</h2>
                        <ul>
                            <li>Nhận ngay voucher giảm 5%</li>
                            <li>Miễn phí cà phê buổi sáng</li>
                            <li>Đặc biệt giảm ngay 15% khi đặt từ 10 phòng</li>
                        </ul>
                    </div>

                    <form id="registerForm" action="{{url('/store')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                        <button type="submit" class="btn btn-primary">ĐĂNG KÝ NGAY!</button>
                        <!-- trả kết quả sau khi submit -->
                        @if(Session('message'))
                        <h4 class="mess">{{Session('message')}}</h4>
                        @endif
                    </form>
                </div>

                <div class="content-right">
                    <div class="right-1">
                        <h1>ANHTU RESORT</h1>
                        <h3 id="slogan">Nơi Nghỉ Ngơi, Khám Phá, Tận Hưởng</h3>
                        <div class="star">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>

                        <b id="change">CHỈ TỪ 499.000Đ MỘT ĐÊM!</b>
                    </div>

                </div>
            </div>
        </div>


    </div>




</body>

</html>
<script>
    //  thay đổi nội dung thẻ h3

    $(document).ready(function() {
        var slogan = ["Nơi Hòa Mình Trong Hòn Ngọc Biển Xanh ",
            "Thiên Đàng Nghỉ Dưỡng, Trải Nghiệm Đẳng Cấp ",
            "Làn Gió Biển Hòa Quyện Cùng Hương Hoa Tươi ",
            "Chìm Đắm Trong Sự Yên Bình Và Sang Trọng "
        ];
        var index = 0;
        var len = slogan.length;
        setInterval(function() {
            $('#slogan').fadeOut(500, function() {
                $(this).text(slogan[index]).fadeIn(500);
                index = (index + 1) % len;
            });
        }, 4000);
        setInterval(function() {
            $('#change').css('color', getRandomColor())
        }, 300);

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    });
</script>