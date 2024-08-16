<?php

namespace App\Http\Controllers\LAdmin\CollegeEvent;

use App\Http\Controllers\Controller;
use App\Models\CollegeEvent;
use App\Models\CollegeEventImage;
use App\Models\LAdminUniversity;
use App\Models\University;
use App\Models\UniversityCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CollegeEventController extends Controller
{
    //

    public function index()
    {
        $ladminID = Auth::guard('ladmin')->user()->id;
        $universityIDs = LAdminUniversity::where('ladminID', $ladminID)->pluck('universityId');
        $universities = University::whereIn('id', $universityIDs)->get();
        return view('LocalAdmin.CollegeEvent.index', compact('universities'));
    }

    public function collegeIndex($id)
    {
        $universityID = $id;
        $colleges = UniversityCollege::where('universityId', $universityID)->get();
        return view('LocalAdmin.CollegeEvent.college', compact('colleges'));
    }

    public function eventsIndex($id)
    {
        $universityCollegeID = $id;
        $events = CollegeEvent::where('univCollegeID', $universityCollegeID)->get();
        return view('LocalAdmin.CollegeEvent.eventsIndex', compact('events' , 'universityCollegeID'));
    }

    public function eventsDone($id)
    {
        $collegeEventID = $id;
        $collegeEvent = CollegeEvent::findOrfail($collegeEventID);
        $collegeEvent->update([
            'status' => '1',
        ]);
        return redirect()->back()->with('success_message', 'Event Done Successfully');
    }

    public function eventsCancel($id)
    {
        $collegeEventID = $id;
        $collegeEvent = CollegeEvent::findOrfail($collegeEventID);
        $collegeEvent->update([
            'status' => '2',
        ]);
        return redirect()->back()->with('success_message', 'Event Canceled Successfully');
    }

    public function eventsDelete($id)
    {
        $collegeEventID = $id;
        $collegeEvent = CollegeEvent::findOrfail($collegeEventID);
        $collegeEvent->delete();
        return redirect()->back()->with('success_message', 'Event Deleted Successfully'); 
    }

    public function createEvent($id)
    {
       $universityCollegeID = $id;
       return view('LocalAdmin.CollegeEvent.createEvent',compact('universityCollegeID'));
    }

    public function storeEvent(Request $request)
    {
        CollegeEvent::create([
            'name' => $request->input('name'),
            'dayName' => $request->input('dayName'),
            'eventDate' => $request->input('dateEvent'),
            'eventTime' => $request->input('eventTime'),
            'details' => $request->input('details'),
            'status' => $request->input('status'),
            'univCollegeID' => $request->input('universityCollegeID'),
            'created_by' => Auth::guard('ladmin')->user()->id,
        ]);

        return redirect()->back()->with('success_message', 'Event Created Successfully');
    }

    public function eventsEdit($id)
    {
        $collegeEventID = $id;
        $event = CollegeEvent::findOrfail($collegeEventID);
        return view('LocalAdmin.CollegeEvent.editEvent' , compact('event'));
    }

    public function eventsUpdate(Request $request , $id)
    {

        $collegeEventID = $id;
        $collegeEvent = CollegeEvent::findOrfail($collegeEventID);

        $collegeEvent->update([
            'name' => $request->input('name'),
            'dayName' => $request->input('dayName'),
            'eventDate' => $request->input('dateEvent'),
            'eventTime' => $request->input('eventTime'),
            'details' => $request->input('details'),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success_message', 'Event Updated Successfully');
    }

    public function eventsImageIndex($id)
    {
        $collegeEventID = $id;
        $collegeEventImages = CollegeEventImage::where('collegeEventID' , $collegeEventID)->get();
        return view('LocalAdmin.CollegeEvent.eventImageIndex' , compact('collegeEventImages' , 'collegeEventID'));

    }

    public function eventsImageCreate($id)
    {
      $collegeEventID = $id;
      return view('LocalAdmin.CollegeEvent.createEventImage' , compact('collegeEventID'));
    }

    public function eventsImageStore(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('EventImage', $image, 'Image');

        CollegeEventImage::create([
            'details' => $request->input('details'),
            'img' => $path,
            'collegeEventID' => $request->input('collegeEventID'),
        ]);

        return redirect()->back()->with('success_message', 'Event Image Created Successfully');
    }

    public function eventsImageDelete($id)
    {
       $collegeEventImageID = $id;
       $collegeEventImage = CollegeEventImage::findOrfail($collegeEventImageID);

       if ($collegeEventImage) {
           Storage::disk('Image')->delete($collegeEventImage->img);
           $collegeEventImage->delete();
           return redirect()->back()->with('success_message', 'Event Image Deleted Successfully');
       } else {
           return redirect()->back()->with('error_message', 'Event Image Not Found');
       }
    }

 
}
