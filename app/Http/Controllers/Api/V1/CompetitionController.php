<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
        public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255'
        ]);

        $validated['owner_id'] = 1;

        $competition = Competition::create($validated);

        return response()->json($competition, 201);
    }

        public function index()
        {
           $competitions = Competition::all();
            return $competitions;
        }

        public function show(int $id)
        {
          $competition = Competition::findOrFail($id);

          return response()->json($competition, 200);
        }

        public function update(Request $request, int $id)
        {        
            $competition = Competition::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'date' => 'required|date',
                'location' => 'required|string|max:255'
            ]);

            $competition->update($validated);

            return response()->json($competition, 200);
        }

        public function destroy(Request $request, int $id)
        {
            $competition = Competition::findOrFail($id);

            if($competition->owner_id !== auth()->$id) 
                {
                    return response()->json(['message' => 'Não autenticado'], 403);
                }

            $competition->delete();

            return response()->json(['message' => 'Competição deletada'], 204);
        }
}


