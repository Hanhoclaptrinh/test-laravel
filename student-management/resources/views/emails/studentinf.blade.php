<!DOCTYPE html>
<html>
<head>
    <title>Thông tin sinh viên</title>
</head>
<body>
    <h1>Thông tin sinh viên</h1>
    <p>Xin chào {{ $student->name }},</p>
    <p>Dưới đây là thông tin của bạn:</p>
    <ul>
        <li><strong>Mã sinh viên:</strong> {{ $student->student_code }}</li>
        <li><strong>Tên:</strong> {{ $student->name }}</li>
        <li><strong>Email:</strong> {{ $student->email }}</li>
        <li><strong>Lớp:</strong> {{ $student->class }}</li>
        <li><strong>Khoa:</strong> {{ $student->faculty }}</li>
        <li><strong>GPA:</strong> {{ $student->gpa }}</li>
        <li><strong>Thời gian tạo:</strong> {{ $student->created_at }}</li>
        <li><strong>Thời gian chỉnh sửa:</strong> {{ $student->updated_at }}</li>
    </ul>
    <p>Trân trọng,<br>Hệ thống quản lý sinh viên</p>
</body>
</html>