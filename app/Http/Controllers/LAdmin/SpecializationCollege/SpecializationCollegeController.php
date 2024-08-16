<?php

namespace App\Http\Controllers\LAdmin\SpecializationCollege;

use App\Http\Controllers\Controller;
use App\Models\CollegeSpecialization;
use App\Models\LAdminUniversity;
use App\Models\UniversityCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SpecializationCollegeController extends Controller
{
    //

    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->pluck('id');
        $specializationColleges = CollegeSpecialization::whereIn('univCollegeID', $universityCollegeIDs)->get();
        return view('LocalAdmin.SpecializationCollege.index', compact('specializationColleges'));
    }

    public function create()
    {
        $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
        return view('LocalAdmin.SpecializationCollege.create', compact('universityColleges'));
    }

    public function store(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('SpecializationCollegeImage', $image, 'Image');

        CollegeSpecialization::create([
            'name' => $request->input('name'),
            'univCollegeID' => $request->input('univCollegeID'),
            'created_by' => Auth::guard('ladmin')->user()->id,
            'img' => $path,
        ]);

        return redirect()->route('ladmin.specialization.college.index')->with('success_message', 'Specialization College Created Successfully');
    }

    public function edit($id)
    {
        $specializationCollege = CollegeSpecialization::findOrfail($id);
        $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
        return view('LocalAdmin.SpecializationCollege.edit', compact('specializationCollege', 'universityColleges'));
    }

    public function update(Request $request, $id)
    {
        $specializationCollege = CollegeSpecialization::findOrfail($id);

        if ($request->file('img') == null) {
            $specializationCollege->update([
                'name' => $request->input('name'),
                'univCollegeID' => $request->input('univCollegeID'),
            ]);

            return redirect()->route('ladmin.specialization.college.index')->with('success_message', 'Specialization College Updated Successfully');
        } else {
            if ($specializationCollege->img != null) {
                Storage::disk('Image')->delete($specializationCollege->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('SpecializationCollegeImage', $image, 'Image');

                $specializationCollege->update([
                    'name' => $request->input('name'),
                    'univCollegeID' => $request->input('univCollegeID'),
                    'img' => $path,
                ]);

                return redirect()->route('ladmin.specialization.college.index')->with('success_message', 'Specialization College Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('SpecializationCollegeImage', $image, 'Image');

                $specializationCollege->update([
                    'name' => $request->input('name'),
                    'univCollegeID' => $request->input('univCollegeID'),
                    'img' => $path,
                ]);


                return redirect()->route('ladmin.specialization.college.index')->with('success_message', 'Specialization College Updated Successfully');
            }
        }
    }


    public function archive()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->pluck('id');
        $specializationColleges = CollegeSpecialization::whereIn('univCollegeID', $universityCollegeIDs)->onlyTrashed()->get();
        return view('LocalAdmin.SpecializationCollege.archive', compact('specializationColleges'));
    }

    public function softDelete($id)
    {
        $specializationCollege = CollegeSpecialization::findOrfail($id);
        $specializationCollege->delete();
        return redirect()->route('ladmin.specialization.college.index')->with('success_message', 'Specialization College Deleted Successfully');
    }

    public function restore($id)
    {
        CollegeSpecialization::withTrashed()->where('id', $id)->restore();
        return redirect()->route('ladmin.specialization.college.index')->with('success_message', 'Specialization College Restored Successfully');
    }

    public function forceDelete($id)
    {
        $specializationCollege = CollegeSpecialization::withTrashed()->where('id', $id)->first();
        if ($specializationCollege) {
            Storage::disk('Image')->delete($specializationCollege->img);
            $specializationCollege->forceDelete();

            return redirect()->route('ladmin.specialization.college.archive')->with('success_message', 'Specialization College Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Specialization College Not Found');
        }
    }


}
