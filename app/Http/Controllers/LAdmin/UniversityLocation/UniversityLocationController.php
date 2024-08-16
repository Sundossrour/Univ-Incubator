<?php

namespace App\Http\Controllers\LAdmin\UniversityLocation;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\LAdminUniversity;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversityLocationController extends Controller
{
    //

    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityLocations = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityLocation.index', compact('universityLocations'));
    }

    public function create()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universities = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityLocation.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $universityID = $request->input('universityID');
        $university = University::findOrfail($universityID);

        if ($university->address_id) {
            return redirect()->route('ladmin.university.location.index')->with('error_message', 'University Already Have Address');
        }

        $location = Address::create([
            'city' => $request->input('city'),
            'region' => $request->input('region'),
            'street' => $request->input('street'),
            'near' => $request->input('near'),
            'another_details' => $request->input('details'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'created_by' => Auth::guard('ladmin')->user()->id,
        ]);
        $locationID = $location->id;
        $university->update([
            'address_id' => $locationID
        ]);

        return redirect()->route('ladmin.university.location.index')->with('success_message', 'Location University Created Successfully');
    }

    public function edit($id)
    {
        $univLocationID = $id;
        $location = Address::findOrfail($univLocationID);
        return view('LocalAdmin.UniversityLocation.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $addressID = $id;
        $address = Address::findOrfail($addressID);
        $address->update([
            'city' => $request->input('city'),
            'region' => $request->input('region'),
            'street' => $request->input('street'),
            'near' => $request->input('near'),
            'another_details' => $request->input('details'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
        ]);

        return redirect()->route('ladmin.university.location.index')->with('success_message', 'Location University Updated Successfully');
    }

    public function delete(Request $request, $id)
    {
        $univLocationID = $id;
        $univID = $request->input('univID');
        $univ = University::findOrfail($univID);
        $location = Address::withTrashed()->where('id', $univLocationID)->first();
        if ($location) {
            $univ->update([
                'address_id' => null
            ]);
            $location->forceDelete();
            return redirect()->route('ladmin.university.location.index')->with('success_message', 'Location University Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Location University Not Found');
        }
    }
}
