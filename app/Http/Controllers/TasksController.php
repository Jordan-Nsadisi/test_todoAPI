<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    //read
    public function index(Request $request)
    {
        return response()->json($request->user()->tasks, 200);
    }

    // create
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:25',
            'description' => 'required|string',
            'status' => 'string|in:PENDING,COMPLETED,CANCELED'
        ]);

        //gestion des erreurs de validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //création de la tâche associée à l'utilisateur authentifié
        $task = $request->user()->tasks()->create($request->all());

        //rafraichir l'instance de la tâche pour obtenir les valeurs par défaut de la BD
        $task->refresh();

        return response()->json($task, 201);
    }

    //update
    public function update(Request $request, $id)
    {
        //recupère la task lié au user
        $task = $request->user()->tasks()->find($id);

        if (!$task) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }

        //valide les données si elles sont présentes
        $request->validate([
            'title' => 'sometimes|string|max:25',
            'description' => 'sometimes|string',
            'status' => 'sometimes|string|in:PENDING,COMPLETED,CANCELED'
        ]);

        $task->update($request->all());

        return response()->json($task, 200);
    }

    //delete
    public function destroy(Request $request, $id)
    {
        $task = $request->user()->tasks()->find($id);

        if (!$task) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'Supprimé avec succès'], 200);
    }
}
