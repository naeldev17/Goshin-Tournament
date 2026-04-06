<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Services\CompetitionService;
use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
        public function store(StoreCompetitionRequest $request, CompetitionService $service)
        {
            $validated = $request->validated();

            $user = $request->user();

            $competition = $service->create($validated, $user);

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

        public function update(
            UpdateCompetitionRequest $request,
            CompetitionService $service,
            Competition $competition
        ) {
            $validated = $request->validated();

            $user = $request->user();

            $competition = $service->update($validated, $user, $competition);

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


