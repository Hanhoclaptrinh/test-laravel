<!DOCTYPE html>
<html>
<head>
    <title>Sửa sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa thông tin sinh viên</h1>
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Mã sinh viên</label>
                <input type="text" name="student_code" value="{{ $student->student_code }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tên</label>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Lớp</label>
                <input type="text" name="class" value="{{ $student->class }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Khoa</label>
                <input type="text" name="faculty" value="{{ $student->faculty }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>GPA</label>
                <input type="number" name="gpa" value="{{ $student->gpa }}" step="0.1" min="0" max="4" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật <i class="fa-solid fa-pen-to-square"></i></button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại <i class="fa-solid fa-backward-step"></i></a>
        </form>
    </div>
</body>
</html>