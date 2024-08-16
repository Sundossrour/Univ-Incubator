<?php

namespace App\Http\Controllers\LAdmin\CollegeAds;

use App\Http\Controllers\Controller;
use App\Models\CollegeAds;
use App\Models\LAdminUniversity;
use App\Models\UniversityCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CollegeAdsController extends Controller
{
    //

    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->pluck('id');
        $collegeAdss = CollegeAds::whereIn('univCollegeID', $universityCollegeIDs)->get();
        return view('LocalAdmin.CollegeAds.index', compact('collegeAdss'));
    }

    public function create()
    {
        $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
        return view('LocalAdmin.CollegeAds.create', compact('universityColleges'));
    }

    public function store(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('CollegeAdsImage', $image, 'Image');

        CollegeAds::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'details' => $request->input('details'),
            'univCollegeID' => $request->input('univCollegeID'),
            'created_by' => Auth::guard('ladmin')->user()->id,
            'img' => $path,
        ]);

        return redirect()->route('ladmin.college.ads.index')->with('success_message', 'College Ads Created Successfully');
    }

    public function edit($id)
    {
        $collegeAds = CollegeAds::findOrfail($id);
        $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
        return view('LocalAdmin.CollegeAds.edit', compact('collegeAds', 'universityColleges'));
    }

    public function update(Request $request, $id)
    {
        $collegeAds = CollegeAds::findOrfail($id);

        if ($request->file('img') == null) {
            $collegeAds->update([
                'name' => $request->input('name'),
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'details' => $request->input('details'),
                'univCollegeID' => $request->input('univCollegeID'),
            ]);

            return redirect()->route('ladmin.college.ads.index')->with('success_message', 'College Ads Updated Successfully');
        } else {
            if ($collegeAds->img != null) {
                Storage::disk('Image')->delete($collegeAds->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('CollegeAdsImage', $image, 'Image');

                $collegeAds->update([
                    'name' => $request->input('name'),
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'details' => $request->input('details'),
                    'univCollegeID' => $request->input('univCollegeID'),
                    'img' => $path,
                ]);

                return redirect()->route('ladmin.college.ads.index')->with('success_message', 'College Ads Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('CollegeAdsImage', $image, 'Image');

                $collegeAds->update([
                    'name' => $request->input('name'),
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'details' => $request->input('details'),
                    'univCollegeID' => $request->input('univCollegeID'),
                    'img' => $path,
                ]);


                return redirect()->route('ladmin.college.ads.index')->with('success_message', 'College Ads Updated Successfully');
            }
        }
    }

    public function archive()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->pluck('id');
        $collegeAdss = CollegeAds::whereIn('univCollegeID', $universityCollegeIDs)->onlyTrashed()->get();
        return view('LocalAdmin.CollegeAds.archive', compact('collegeAdss'));
    }

    public function softDelete($id)
    {
        $collegeAds = CollegeAds::findOrfail($id);
        $collegeAds->delete();
        return redirect()->route('ladmin.college.ads.index')->with('success_message', 'College Ads Deleted Successfully');
    }

    public function restore($id)
    {
        CollegeAds::withTrashed()->where('id', $id)->restore();
        return redirect()->route('ladmin.college.ads.index')->with('success_message', 'College Ads Restored Successfully');
    }

    public function forceDelete($id)
    {
        $collegeAds = CollegeAds::withTrashed()->where('id', $id)->first();
        if ($collegeAds) {
            Storage::disk('Image')->delete($collegeAds->img);
            $collegeAds->forceDelete();

            return redirect()->route('ladmin.college.ads.archive')->with('success_message', 'College Ads Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'College Ads Not Found');
        }
    }
}
