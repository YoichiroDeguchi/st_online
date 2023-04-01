<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment([
            'body' => $validated['body'],
            'user_id' => auth()->user()->id,
        ]);

        $patient->comments()->save($comment);

        return redirect()->route('patients.show', $patient->id)->with('success', 'コメントが追加されました。');
    }

    public function destroy(Comment $comment)
    {
        // 録画リンクの削除
        $comment->delete();
        return redirect()->back()->with('success', 'リンクが削除されました。');
    }

}
