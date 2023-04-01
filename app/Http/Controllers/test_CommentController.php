<?php

// namespace App\Http\Controllers;

// use App\Models\Comment;
// use Illuminate\Http\Request;

// class CommentController extends Controller
// {
//     //
//     public function store(Request $request)
//     {
//         $request->validate([
//             'meeting_id' => 'required|exists:meetings,id',
//             'content' => 'required',
//         ]);

//         $comment = new Comment();
//         $comment->meeting_id = $request->input('meeting_id');
//         $comment->content = $request->input('content');
//         $comment->save();

//         return redirect()->back()->with('success', 'コメントが追加されました。');
//     }
// }
