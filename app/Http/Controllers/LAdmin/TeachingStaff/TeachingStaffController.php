<?php

namespace App\Http\Controllers\LAdmin\TeachingStaff;

use App\Http\Controllers\Controller;
use App\Models\LAdminUniversity;
use App\Models\TeachingStaff;
use App\Models\UniversityCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeachingStaffController extends Controller
{

    //عرض صفحة جدول الكادر التدريسي

    public function index()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID' , Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId' , $lAdminUniversityIDs)->pluck('id');
        $teachingStaffs = TeachingStaff::whereIn('univercityCollegeID' , $universityCollegeIDs)->get();
        return view('LocalAdmin.TeachingStaff.index', compact('teachingStaffs'));
    }

    //عرض صفحة اضافة عضو كادر تدريسي جديد

    public function create()
    {
        $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
        return view('LocalAdmin.TeachingStaff.create', compact('universityColleges'));
    }

    //تخزين بيانات عضو الكادر التدريسي في قاعدة البيانات 

    public function store(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('TeachingStaffImage', $image, 'Image');

        TeachingStaff::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'Designation' => $request->input('designation'),
            'univercityCollegeID' => $request->input('univercityCollegeID'),
            'created_by' => Auth::guard('ladmin')->user()->id,
            'img' => $path,
        ]);

        return redirect()->route('ladmin.teachingStaff.index')->with('success_message', 'Teacher Staff Created Successfully');
    }

    //عرض صفحة تعديل بيانات الكادر التدريسي 

    public function edit(Request $request, $id)
    {
        $teachingStaff = TeachingStaff::findOrfail($id);
        $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
        return view('LocalAdmin.TeachingStaff.edit', compact('teachingStaff', 'universityColleges'));
    }

    //تحديث بيانات الاعلان

    public function update(Request $request, $id)
    {
        $teachingStaff = TeachingStaff::findOrfail($id);

        if ($request->file('img') == null) {
            $teachingStaff->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
                'Designation' => $request->input('designation'),
                'univercityCollegeID' => $request->input('univercityCollegeID'),
            ]);

            return redirect()->route('ladmin.teachingStaff.index')->with('success_message', 'Teaching Staff Updated Successfully');
        } else {
            if ($teachingStaff->img != null) {
                Storage::disk('Image')->delete($teachingStaff->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('TeachingStaffImage', $image, 'Image');

                $teachingStaff->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'Designation' => $request->input('designation'),
                    'univercityCollegeID' => $request->input('univercityCollegeID'),
                    'img' => $path,
                ]);

                return redirect()->route('ladmin.teachingStaff.index')->with('success_message', 'Teaching Staff Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('TeachingStaffImage', $image, 'Image');

                $teachingStaff->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'Designation' => $request->input('designation'),
                    'univercityCollegeID' => $request->input('univercityCollegeID'),
                    'img' => $path,
                ]);


                return redirect()->route('ladmin.teachingStaff.index')->with('success_message', 'Teaching Staff Updated Successfully');
            }
        }
    }

    //عرض جدول ارشيف الكادر التدريسي

    public function archive()
    {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID' , Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId' , $lAdminUniversityIDs)->pluck('id');
        $teachingStaffs = TeachingStaff::whereIn('univercityCollegeID' , $universityCollegeIDs)->onlyTrashed()->get();
        return view('LocalAdmin.TeachingStaff.archive', compact('teachingStaffs'));
    }

    //حذف الاعلان ونقله للارشيف

    public function softDelete($id)
    {
        $teachingStaff = TeachingStaff::findOrfail($id);
        $teachingStaff->delete();
        return redirect()->route('ladmin.teachingStaff.index')->with('success_message', 'Teaching Staff Deleted Successfully');
    }

    //استعادة الاعلان المحذوف

    public function restore($id)
    {
        TeachingStaff::withTrashed()->where('id', $id)->restore();
        return redirect()->route('ladmin.teachingStaff.index')->with('success_message', 'Teaching Staff Restored Successfully');
    }

    //حذف الاعلان بشكل نهائي

    public function forceDelete($id)
    {
        $teachingStaff = TeachingStaff::withTrashed()->where('id', $id)->first();
        if ($teachingStaff) {
            Storage::disk('Image')->delete($teachingStaff->img);
            $teachingStaff->forceDelete();

            return redirect()->route('ladmin.teachingStaff.archive')->with('success_message', 'Teaching Staff Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Teaching Staff Not Found');
        }
    }
}
