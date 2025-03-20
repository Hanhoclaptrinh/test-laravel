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

    // xoa cong viec
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
}
