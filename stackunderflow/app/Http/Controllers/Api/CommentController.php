<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Create Underflow
     * @param Request $request
     * @return Comment
     */

    public function getComments()
    {
        return response()->json(Comment::all());
    }
    
    public function createComment(Request $request)
    {
        try {
            $validateComment  = Validator::make(
                $request->all(),
                [
                    'comment_content' => 'required',
                    'post_id' => 'required',
                    'comment_author' => 'required',
                    'user_id' => 'required',
                ]
            );

            if ($validateComment->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateComment->errors()
                ], 401);
            }

            Comment::create([
                'comment_content' => $request->comment_content,
                'post_id' => $request->post_id,
                'comment_author' => $request->comment_author,
                'user_id' => $request->user_id,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Comment Created Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateComment(Request $request, $id)
    {
        Comment::where('comment_id', $id)->update([
            'comment_content' => $request->comment_content,
            'post_id' => $request->post_id,
            'comment_author' => $request->comment_author,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Comment updated Successfully',
        ], 200);
    }

    public function deleteComment($id)
    {

        Comment::where("comment_id", $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Comment ' . $id . ' deleted Successfully',
        ], 200);
    }
}
