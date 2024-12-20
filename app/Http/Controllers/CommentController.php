<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'report_id' => 'required|exists:reports,id',
        'content' => 'required|string',
    ]);

    // Simpan komentar
    Comment::create([
        'report_id' => $request->report_id,
        'user_id' => auth()->id(), // ID user yang sedang login
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
}
}
