<?php

namespace App\Http\Controllers;

use App\Drone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DroneController extends Controller
{

    public function showAllDrones()
    {
        return response()->json(Drone::all());
    }

    public function showOneDrone($id)
    {
        return response()->json(Drone::find($id));
    }

    public function create(Request $request)
	
    {
		$this->validate($request, [
			'image' => 'required|string',
			'name' => 'required|string',
			'address' => 'required|string',
			'battery' => 'required|numeric',
			'max_speed' => 'required|numeric',
			'average_speed' => 'required|numeric',
			'status' => 'required|string',
		]);
        $drone = Drone::create($request->all());

        return response()->json($drone, 201);
    }

    public function update($id, Request $request)
    {
        $drone = Drone::findOrFail($id);
        $drone->update($request->all());

        return response()->json($drone, 200);
    }

    public function delete($id)
    {
        Drone::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
	
	public function paginate()
    {
        
		$drone = Drone::paginate(19);
		return $drone;
    }
	
	public function sort()
    {
        $drone =Drone::all();
		$drone1 = $drone->sortBy('id');
		return $drone1;
    }
	
	public function filter(Request $request)
    {
        $query = Drone::query();
		
		if ($request->has('name')) {
        $query->where('name',$request->name);
		}
		
		if ($request->has('status')) {
        $query->where('status',$request->status);
		}
    

		$drones = $query->paginate();

		return $drones;
    }
}