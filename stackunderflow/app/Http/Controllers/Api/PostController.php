<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Create Underflow
     * @param Request $request
     * @return Post
     */

    public function getPosts()
    {
        return response()->json(Post::all());
    }

    public function getCommentNumberByPostId($id)
    {
        return Comment::where('post_id', '=', $id)->count();
    }

    public function createPost(Request $request)
    {
        try {
            $validateUnderflow  = Validator::make(
                $request->all(),
                [
                    'post_title' => 'required',
                    'post_content' => 'required',
                    'post_img'  => 'nullable',
                    'underflow_id' => 'required',
                    'categorie_id' => 'required',
                    'post_author' => 'required',
                    'user_id' => 'required',
                    'nbr_comments' => 'nullable',
                    'nbr_likes' => 'nullable',

                ]
            );

            if ($validateUnderflow->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUnderflow->errors()
                ], 401);
            }

            Post::create([
                'post_title' => $request->post_title,
                'post_content' => $request->post_content,
                'post_img' => $request->post_img,
                'underflow_id' => $request->underflow_id,
                'categorie_id' => $request->categorie_id,
                'post_author' => $request->post_author,
                'user_id' => $request->user_id,
                'nbr_comments' => 2,
                'nbr_likes' => 32,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Post Created Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function updatePost(Request $request, $id)
    {
        Post::where('post_id', $id)->update([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_img' => $request->post_img,
            'underflow_id' => $request->underflow_id,
            'categorie_id' => $request->categorie_id,
            'post_author' => $request->post_author,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => ' Post updated Successfully',
        ], 200);
    }

    public function deletePost($id)
    {

        Post::where("post_id", $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post ' . $id . ' deleted Successfully',
        ], 200);
    }
}
