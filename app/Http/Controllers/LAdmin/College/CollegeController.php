<?php

namespace App\Http\Controllers\LAdmin\College;

use App\Http\Controllers\Controller;
use App\Models\LAdminUniversity;
use App\Models\University;
use App\Models\UniversityCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CollegeController extends Controller
{
    //

    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.College.index', compact('universityColleges'));
    }

    public function create()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universities = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.College.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('UniversityCollegeImage', $image, 'Image');

        UniversityCollege::create([
            'collegeName' => $request->input('collegeName'),
            'collegeImage' => $path,
            'universityId' => $request->input('universityId'),
            'created_by' => Auth::guard('ladmin')->user()->id,
        ]);

        return redirect()->route('ladmin.college.index')->with('success_message', 'University College Created Successfully');
    }

    public function edit($id)
    {
        $universityCollegeID = $id;
        $universityCollege = UniversityCollege::findOrfail($universityCollegeID);
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universities = University::whereIn('id', $lAdminUniversityIDs)->get();
        return view('LocalAdmin.College.edit', compact('universityCollege' , 'universities'));
    }

    public function update(Request $request , $id)
    {
        $universityCollege = UniversityCollege::findOrFail($id);

        if ($request->file('img') == null) {
            $universityCollege->update([
                'collegeName' => $request->input('collegeName'),
                'universityId' => $request->input('universityId'),
            ]);

            return redirect()->route('ladmin.college.index')->with('success_message', 'University College Updated Successfully');
        } else {
            if ($universityCollege->img != null) {
                Storage::disk('Image')->delete($universityCollege->collegeImage);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('UniversityCollegeImage', $image, 'Image');

                $universityCollege->update([
                    'collegeName' => $request->input('collegeName'),
                    'collegeImage' => $path,
                    'universityId' => $request->input('universityId'),
                ]);

                return redirect()->route('ladmin.college.index')->with('success_message', 'University College Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('UniversityCollegeImage', $image, 'Image');

                $universityCollege->update([
                    'collegeName' => $request->input('collegeName'),
                    'collegeImage' => $path,
                    'universityId' => $request->input('universityId'),
                ]);


                return redirect()->route('ladmin.college.index')->with('success_message', 'University College Updated Successfully');
            }
        }
    }

    public function archive()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->onlyTrashed()->get();
        return view('LocalAdmin.College.archive', compact('universityColleges'));
    }

    public function softDelete($id)
    { 

        $universityCollegeID = $id;
        $universityCollege = UniversityCollege::findOrfail($universityCollegeID);
        $universityCollege->delete();
        return redirect()->route('ladmin.college.index')->with('success_message', 'University College Deleted Successfully');
        
    }

    public function restore($id)
    { 

        $universityCollegeID = $id;
        UniversityCollege::withTrashed()->where('id', $universityCollegeID)->restore();
        return redirect()->route('ladmin.college.index')->with('success_message', 'University College Restored Successfully');
        
    }

    public function forceDelete($id){

        $universityCollegeID = $id;
        $universityCollege = UniversityCollege::withTrashed()->find($universityCollegeID);
        if ($universityCollege) {
            Storage::disk('Image')->delete($universityCollege->collegeImage);
            $universityCollege->forceDelete();

            return redirect()->route('ladmin.college.archive')->with('success_message', 'University College Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'University College Not Found');
        }
    }

}
