<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class="container mt-5">
        <h1>Danh sách sinh viên</h1>
        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Thêm sinh viên <i class="fa-solid fa-plus"></i></a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã SV</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Lớp</th>
                    <th>Khoa</th>
                    <th>GPA</th>
                    <th>Thời gian tạo</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->student_code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->faculty }}</td>
                        <td>{{ $student->gpa }}</td>
                        <td>{{ $student->created_at }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Sửa <i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa?')">Xóa <i class="fa-solid fa-trash"></i></button>
                            </form>
                            <form action="{{ route('students.send-email', $student) }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Gửi email cho sinh viên này?')">Send <i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Đăng xuất <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
        </form>
    </div>
</body>
</html>