<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Event;
    use App\Models\User;
class eventcontroller extends Controller
{
    public function show(){
        $events = Event::with('events')->get();
        return response()->json($events);
       
    }
}
