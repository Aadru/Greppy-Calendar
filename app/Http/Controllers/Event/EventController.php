<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventModel;
use Validator;
use Auth;

class EventController extends Controller
{
    public function event(){
        return response()->json(EventModel::get(), 200);
    }

    public function eventFilter($param, $sort='asc'){
        $event = EventModel::where('from_date', '=', $param)
                            ->orderBy('created_at', $sort)
                            ->get();
            if(is_null($event)){
                return response()->json(["message" => "Record not found !"], 404);
        }
        return response()->json($event, 200);
    }

    public function eventById($id){
        $event = EventModel::find($id);
            if(is_null($event)){
                return response()->json(["message" => "Record not found !"], 404);
            }
        return response()->json($event, 200);
    }

    public function eventSave(Request $request){
        $validator = Validator::make($request->all(), [
            'description' => 'required', 
            'from_date' => 'required', 
            'starting_time' => 'required',
            'to_date' => 'required',
            'ending_time' => 'required',
            'location' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $event = new EventModel();
        $event->user_id = Auth::id();
        $event->description = $request->description;
        $event->from_date = $request->from_date;
        $event->starting_time = $request->starting_time;
        $event->to_date = $request->to_date;
        $event->ending_time = $request->ending_time;
        $event->location = $request->location;
        $event->save();

        return response()->json($event, 201);
    }

    public function eventUpdate(Request $request, $id){
        $event = EventModel::find($id);
        if(is_null($event)){
            return response()->json(["message" => "Record not found !"],404);
        }
        $event->update($request->all());   
        return response()->json($event,200);
    }

    public function eventDelete(Request $request, $id){
        $event = EventModel::find($id);
        if(is_null($event)){
            return response()->json(["message" => "Record not found !"],404);
        }
        $event->delete();   
        return response()->json(null,204);
    }
    
}
