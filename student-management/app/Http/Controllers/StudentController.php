<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Mail\StudentInfoMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    // hien thi toan bo thong tin sinh vien
    public function index()
    {
        $students = Student::all(); // array luu sinh vien lay duoc tu db
        return view('students.index', compact('students')); // mang array lay duoc ve index (hien thi full)
    }

    // form tao moi sinh vien
    public function create()
    {
        return view('students.create'); 
    }

    // tao moi sinh vien
    public function store(Request $request)
    {
        $request->validate([
            'student_code' => 'required|unique:students',
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'class' => 'required',
            'faculty' => 'required',
            'gpa' => 'required|numeric|between:0,4' // gpa (0 - 4)
        ]);

        $randomPassword = Str::random(8);
        $data = $request->all();
        $data['password'] = $randomPassword;
        $student = Student::create($data);
        Mail::to($student->email)->send(new StudentInfoMail($student, $randomPassword));
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công.');
    }

    // form cap nhat thong tin sinh vien
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // cap nhat thong tin sinh vien
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_code' => 'required|unique:students,student_code,' . $student->id,
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'class' => 'required',
            'faculty' => 'required',
            'gpa' => 'required|numeric|between:0,4'
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công.');
    }

    // xoa sinh vien 
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công.');
    }

    // gui email toi sinh vien
    public function sendEmail(Student $student)
    {
        $randomPassword = Str::random(8);
        $hashedPassword = Hash::make($randomPassword); // ma hoa mat khau de luu vao db
        $student->update(['password' => $hashedPassword]); // cap nhat lai mat khau moi
        Mail::to($student->email)->send(new StudentInfoMail($student, $randomPassword));
        return redirect()->route('students.index')->with('success', 'Email đã được gửi tới ' . $student->name . ' (' . $student->email . ')');
    }
}
