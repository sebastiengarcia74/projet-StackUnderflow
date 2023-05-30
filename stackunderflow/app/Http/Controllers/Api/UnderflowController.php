<?php

namespace App\Http\Controllers\Api;

use App\Models\Underflow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UnderflowController extends Controller
{
    /**
     * Create Underflow
     * @param Request $request
     * @return Underflow
     */

    public function getUnderflows()
    {
        return response()->json(Underflow::all());
    }
    public function createUnderflow(Request $request)
    {
        try {
            $validateUnderflow  = Validator::make(
                $request->all(),
                [
                    'underflow_title' => 'required',
                    'underflow_description' => 'required',
                    'categorie_id' => 'required',
                    'underflow_author' => 'required',
                    'user_id' => 'required',
                ]
            );

            if ($validateUnderflow->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUnderflow->errors()
                ], 401);
            }

            Underflow::create([
                'underflow_title' => $request->underflow_title,
                'underflow_description' => $request->underflow_description,
                'categorie_id' => $request->categorie_id,
                'underflow_author' => $request->underflow_author,
                'user_id' => $request->user_id,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Underflow Created Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateUnderflow(Request $request, $id)
    {
        Underflow::where('underflow_id', $id)->update([
            'underflow_title' => $request->underflow_title,
            'underflow_description' => $request->underflow_description,
            'categorie_id' => $request->categorie_id,
            'underflow_author' => $request->underflow_author,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Underflow updated Successfully',
        ], 200);
    }

    public function deleteUnderflow($id)
    {

        Underflow::where("underflow_id", $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Underflow ' . $id . ' deleted Successfully',
        ], 200);
    }
}
