<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{


    public function getCategories()
    {
        return response()->json(Categorie::all());
    }

    /**
     * Create User
     * @param Request $request
     * @return Categorie 
     */
    public function createCategorie(Request $request)
    {
        try {
            $validateCategorie  = Validator::make(
                $request->all(),
                [
                    'categorie_title' => 'required',
                ]
            );

            if ($validateCategorie->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateCategorie->errors()
                ], 401);
            }

            Categorie::create([
                'categorie_title' => $request->categorie_title,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Categorie Created Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateCategorie(Request $request, $id)
    {
        Categorie::where('categorie_id', $id)->update([
            'categorie_title' => $request->categorie_title,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Categorie updated Successfully',
        ], 200);
    }

    public function deleteCategorie($id)
    {

        Categorie::where("categorie_id", $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Categorie ' . $id . ' deleted Successfully',
        ], 200);
    }
}
