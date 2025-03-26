<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận Email</title>
</head>
<body>
    <h2>Xin chào, {{ $name }}!</h2>
    <p>Vui lòng nhấn vào nút bên dưới để xác nhận email của bạn:</p>

    <a href="{{ $confirm_url }}" 
       style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #56d5f1; text-decoration: none; border-radius: 5px;">
        Xác Nhận Email
    </a>

    <p>Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.</p>
    <p>Thanks!</p>
</body>
</html>
