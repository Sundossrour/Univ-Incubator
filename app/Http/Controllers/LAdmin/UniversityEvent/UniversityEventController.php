<?php

namespace App\Http\Controllers\LAdmin\UniversityEvent;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\LAdminUniversity;
use App\Models\University;
use App\Models\UnivEvent;
use App\Models\UnivEventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UniversityEventController extends Controller
{
    //
    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityEvents = UnivEvent::whereIn('universityID', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityEvent.index', compact('universityEvents'));
    }

    public function create()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universities = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityEvent.create', compact('universities'));
    }

    public function store(Request $request)
    {

        $event = Event::create([
            'name' => $request->input('name'),
            'dayName' => $request->input('dayName'),
            'eventDate' => $request->input('dateEvent'),
            'eventTime' => $request->input('eventTime'),
            'details' => $request->input('details'),
            'status' => $request->input('status'),
            'created_by' => Auth::guard('ladmin')->user()->id,
        ]);
    
        $eventID = $event->id;
       
        foreach ($request->input('universityIDs') as $universityID) {
            UnivEvent::create([
                'universityID' => $universityID,
                'eventID' => $eventID,
            ]);
        }
    
        return redirect()->route('ladmin.university.event.index')->with('success', 'University Event Created Successfully.');
    }

    public function done($id)
    {
         $eventID = $id;
         $event = Event::findOrfail($eventID);
         $event->update([
            'status' => '1'
         ]);

         return redirect()->route('ladmin.university.event.index')->with('success_message', 'University Event Finished Successfully.');
    }

    public function cancel($id)
    {
         $eventID = $id;
         $event = Event::findOrfail($eventID);
         $event->update([
            'status' => '2'
         ]);

         return redirect()->route('ladmin.university.event.index')->with('success_message', 'University Event Canceled Successfully.');
    }

    public function delete($id)
    {
        $eventID = $id;
        $event = Event::findOrfail($eventID);
        $event->delete();
        return redirect()->route('ladmin.university.event.index')->with('success_message', 'University Event Deleted Successfully.');
    }

    public function univEventImageIndex($id)
    {
        $univEventId = $id;
        $universityEventImages = UnivEventImage::where('UnivEventID' , $univEventId)->get();
        return view('LocalAdmin.UniversityEvent.eventImageIndex' , compact('univEventId' , 'universityEventImages'));

    }

    public function univEventImageCreate($id)
    {
        $univEventId = $id;
        return view('LocalAdmin.UniversityEvent.createEventImage' , compact('univEventId'));
    }

    public function univEventImageStore (Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('UniversityEventImage', $image, 'Image');

        UnivEventImage::create([
            'details' => $request->input('details'),
            'img' => $path,
            'UnivEventID' => $request->input('univEventId'),
        ]);

        return redirect()->back()->with('success_message', 'University Event Image Created Successfully');
    }

    public function univEventImageDelete($id)
    {
        $universityEventImageID = $id;
        $universityEventImage = UnivEventImage::findOrfail($universityEventImageID);
 
        if ($universityEventImage) {
            Storage::disk('Image')->delete($universityEventImage->img);
            $universityEventImage->delete();
            return redirect()->back()->with('success_message', 'University Event Image Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'University Event Image Not Found');
        }
    }
    

}
