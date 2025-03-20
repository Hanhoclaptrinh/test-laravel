<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Chào mừng bạn đến dashboard</h2>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
</body>
</html>
