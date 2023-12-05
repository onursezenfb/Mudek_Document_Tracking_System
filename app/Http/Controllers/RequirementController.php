<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;

class RequirementController extends Controller
{

    public function index()
    {
        $requirements = Requirement::all();
        return response()->json($requirements);
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'type' => 'required|string'
            ]);

            if (Requirement::where('type', $validated['type'])->exists()) {
                return response()->json(['error' => 'Requirement already exists'], 409);
            }

            $requirement = Requirement::create($validated);
    
            return response()->json($requirement, 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Requirement creation failed',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function show($type)
    {
        try{
            $requirement = Requirement::findOrFail($type);
            return response()->json($requirement);
        }
        catch (\Exception $e){
            return response()->json(['message' => 'Requirement not found'], 404);
        }
    }

    // Remove the specified resource from storage.
    public function destroy($type)
    {
        try{
            $requirement = Requirement::findOrFail($type);
            $requirement->delete();
        }
        catch (\Exception $e){
            return response()->json(['message' => 'Requirement not found'], 404);
        }
    }
}
