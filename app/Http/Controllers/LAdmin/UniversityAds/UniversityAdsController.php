<?php

namespace App\Http\Controllers\LAdmin\UniversityAds;

use App\Http\Controllers\Controller;
use App\Models\LAdminUniversity;
use App\Models\University;
use App\Models\UniversityAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UniversityAdsController extends Controller
{
    //

    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityAdss = UniversityAds::whereIn('universityID', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityAds.index', compact('universityAdss'));
    }

    public function create()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universities = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityAds.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('UniversityAdsImage', $image, 'Image');

        UniversityAds::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'details' => $request->input('details'),
            'universityID' => $request->input('universityID'),
            'img' => $path,
            'created_by' => Auth::guard('ladmin')->user()->id,
        ]);

        return redirect()->route('ladmin.university.ads.index')->with('success_message', 'University Ads Created Successfully');
    }

    public function edit($id)
    {
        $universityAdsID = $id;
        $universityAds = UniversityAds::findOrfail($universityAdsID);
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universities = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.UniversityAds.edit', compact('universityAds' , 'universities'));
    }

    public function update(Request $request , $id)
    {
        $universityAds = UniversityAds::findOrFail($id);

        if ($request->file('img') == null) {
            $universityAds->update([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'details' => $request->input('details'),
            'universityID' => $request->input('universityID'),
            ]);

            return redirect()->route('ladmin.university.ads.index')->with('success_message', 'University Ads Updated Successfully');
        } else {
            if ($universityAds->img != null) {
                Storage::disk('Image')->delete($universityAds->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('UniversityAdsImage', $image, 'Image');

                $universityAds->update([
                    'name' => $request->input('name'),
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'details' => $request->input('details'),
                    'universityID' => $request->input('universityID'),
                    'img' => $path,
                ]);

                return redirect()->route('ladmin.university.ads.index')->with('success_message', 'University Ads Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('UniversityAdsImage', $image, 'Image');

                $universityAds->update([
                    'name' => $request->input('name'),
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'details' => $request->input('details'),
                    'universityID' => $request->input('universityID'),
                    'img' => $path,
                ]);


                return redirect()->route('ladmin.university.ads.index')->with('success_message', 'University Ads Updated Successfully');
            }
        }
    }

    public function archive()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityAdss = UniversityAds::whereIn('universityID', $lAdminUniversityIDs)->onlyTrashed()->get();
        return view('LocalAdmin.UniversityAds.archive', compact('universityAdss'));
    }

    public function softDelete($id)
    { 

        $universityAdsID = $id;
        $universityAds = UniversityAds::findOrfail($universityAdsID);
        $universityAds->delete();
        return redirect()->route('ladmin.university.ads.index')->with('success_message', 'University Ads Deleted Successfully');
        
    }

    public function restore($id)
    { 

        $universityAdsID = $id;
        UniversityAds::withTrashed()->where('id', $universityAdsID)->restore();
        return redirect()->route('ladmin.university.ads.index')->with('success_message', 'University Ads Restored Successfully');
        
    }

    public function forceDelete($id){

        $universityAdsID = $id;
        $universityAds = UniversityAds::withTrashed()->find($universityAdsID);
        if ($universityAds) {
            Storage::disk('Image')->delete($universityAds->img);
            $universityAds->forceDelete();

            return redirect()->route('ladmin.university.ads.archive')->with('success_message', 'University Ads Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'University Ads Not Found');
        }
    }

}
