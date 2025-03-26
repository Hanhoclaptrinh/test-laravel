<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // hien thi danh sach cong viec
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // them cong viec moi
    public function store(Request $req) {
        $req->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $req->title,
        ]);

        return redirect('/');
    }

    // cap nhat trang thai cong viec sau khi hoan thanh
    public function updateStatus($id, Request $request)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update([
                'completed' => $request->input('completed', 0) == 1
            ]);

            $updatedTask = Task::find($id);
            if ($updatedTask->completed !== $task) {
                throw new \Exception('Không thể lưu vào database');
            }

            return redirect()->back()
                ->with('success', 'Cập nhật trạng thái thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Cập nhật trạng thái thất bại: ' . $e->getMessage());
        }
    }

    // xoa cong viec
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
}
