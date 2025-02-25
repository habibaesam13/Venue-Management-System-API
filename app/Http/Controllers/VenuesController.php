<?php

namespace App\Http\Controllers;

use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VenuesController extends Controller
{

    public function index()
    {
        return response()->json(Venues::all(), 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:venues,name',
                'location' => 'required|string|max:255',
                'capacity' => 'required|integer|min:1',
            ]);

            $venue = Venues::create($validated);

            return response()->json([
                'message' => 'Venue created successfully',
                'venue' => $venue
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }


    public function show($id)
    {
        $venue = Venues::find($id);

        if (!$venue) {
            return response()->json(['message' => 'Venue not found'], 404);
        }

        return response()->json($venue, 200);
    }


    public function update(Request $request, $id)
    {
        $venue = Venues::find($id);

        if (!$venue) {
            return response()->json(['message' => 'Venue not found'], 404);
        }

        try {
            $validated = $request->validate([
                'name' => 'string|max:255|unique:venues,name,' . $id,
                'location' => 'string|max:255',
                'capacity' => 'integer|min:1',
            ]);

            $venue->update($validated);

            return response()->json([
                'message' => 'Venue updated successfully',
                'venue' => $venue
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }


    public function destroy($id)
    {
        $venue = Venues::find($id);

        if (!$venue) {
            return response()->json(['message' => 'Venue not found'], 404);
        }

        try {
            $venue->delete();
            return response()->json(['message' => 'Venue deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
