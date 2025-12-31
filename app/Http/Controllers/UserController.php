<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
   /**
    * Get the authenticated user's firstname and lastname
    */
   public function getProfile(Request $request): JsonResponse
   {
      try {
         $user = $request->user();

         if (!$user) {
            return response()->json([
               'success' => false,
               'message' => 'User not authenticated'
            ], 401);
         }

         return response()->json([
            'success' => true,
            'data' => [
               'firstname' => $user->firstname,
               'lastname' => $user->lastname
            ]
         ], 200);
      } catch (\Exception $e) {
         return response()->json([
            'success' => false,
            'message' => 'An error occurred while retrieving user profile'
         ], 500);
      }
   }
}
