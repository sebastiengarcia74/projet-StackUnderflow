<?php

namespace App\Http\Controllers\Api;

use App\Models\Subcomment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubcommentController extends Controller
{
    /**
     * Create Underflow
     * @param Request $request
     * @return Subcomment
     */

    public function getSubcomments()
    {
        return response()->json(Subcomment::all());
    }
    public function createSubcomment(Request $request)
    {
        try {
            $validateSubcomment  = Validator::make(
                $request->all(),
                [
                    'subcomment_title' => 'required',
                    'subcomment_content' => 'required',
                    'comment_id' => 'required',
                    'subcomment_author' => 'required',
                    'user_id' => 'required',
                ]
            );

            if ($validateSubcomment->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateSubcomment->errors()
                ], 401);
            }

            Subcomment::create([
                'subcomment_title' => $request->subcomment_title,
                'subcomment_content' => $request->subcomment_content,
                'comment_id' => $request->comment_id,
                'subcomment_author' => $request->subcomment_author,
                'user_id' => $request->user_id,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Subcomment Created Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateSubcomment(Request $request, $id)
    {
        Subcomment::where('subcomment_id', $id)->update([
            'subcomment_title' => $request->subcomment_title,
            'subcomment_content' => $request->subcomment_content,
            'comment_id' => $request->comment_id,
            'subcomment_author' => $request->subcomment_author,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Subcomment updated Successfully',
        ], 200);
    }

    public function deleteSubcomment($id)
    {

        Subcomment::where("subcomment_id", $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Subcomment ' . $id . ' deleted Successfully',
        ], 200);
    }
}
