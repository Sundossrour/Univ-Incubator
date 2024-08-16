<?php

namespace App\Http\Controllers\LAdmin\CollegeFees;

use App\Http\Controllers\Controller;
use App\Models\CollegeFees;
use App\Models\LAdminUniversity;
use App\Models\UniversityCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollegeFeesController extends Controller
{
    //

     //عرض صفحة جدول الرسوم الدراسية

     public function index()
     {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->pluck('id');
        $collegeFeeses = CollegeFees::whereIn('univCollegeID', $universityCollegeIDs)->get();
         return view('LocalAdmin.CollegeFees.index', compact('collegeFeeses'));
     }
 
     //عرض صفحة اضافة رسوم دراسية جديدة
 
     public function create()
     {
         $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
         $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
         return view('LocalAdmin.CollegeFees.create', compact('universityColleges'));
     }
 
     //تخزين بيانات رسوم دراسية في قاعدة البيانات 
 
     public function store(Request $request)
     {
         $ladminID = Auth::guard('ladmin')->user()->id;
         CollegeFees::create([
             'annualFees' => $request->input('annualFees'),
             'annualFeesNumber' => $request->input('annualFeesNumber'),
             'details' => $request->input('details'),
             'annualFeesDate' => $request->input('annualFeesDate'),
             'univCollegeID' => $request->input('univCollegeID'),
             'created_by' => $ladminID,
         ]);
 
         return redirect()->route('ladmin.college.fees.index')->with('success_message', 'College Fees Created Successfully');
     }
 
     //عرض صفحة تعديل بيانات الرسوم الدراسية 
 
     public function edit(Request $request, $id)
     {
         $collegeFees = CollegeFees::findOrfail($id);
         $univLAdmin = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
         $universityColleges = UniversityCollege::whereIn('universityId', $univLAdmin)->get();
         return view('LocalAdmin.CollegeFees.edit', compact('collegeFees', 'universityColleges'));
     }
 
     //تحديث بيانات الرسوم الدراسية
 
     public function update(Request $request, $id)
     {
         $collegeFees = CollegeFees::findOrfail($id);
 
         $collegeFees->update([
            'annualFees' => $request->input('annualFees'),
            'annualFeesNumber' => $request->input('annualFeesNumber'),
            'details' => $request->input('details'),
            'annualFeesDate' => $request->input('annualFeesDate'),
            'univCollegeID' => $request->input('univCollegeID'),
         ]);
 
         return redirect()->route('ladmin.college.fees.index')->with('success_message', 'College Fees Updated Successfully');
     }
 
     //عرض جدول ارشيف الرسوم الدراسية
 
     public function archive()
     {
        $lAdminUniversityIDs = LAdminUniversity::where('ladminID', Auth::guard('ladmin')->user()->id)->pluck('universityId');
        $universityCollegeIDs = UniversityCollege::whereIn('universityId', $lAdminUniversityIDs)->pluck('id');
        $collegeFeeses = CollegeFees::whereIn('univCollegeID', $universityCollegeIDs)->onlyTrashed()->get();
         return view('LocalAdmin.CollegeFees.archive', compact('collegeFeeses'));
     }
 
     //حذف الرسوم الدراسية ونقله للارشيف
 
     public function softDelete($id)
     {
         $collegeFees = CollegeFees::findOrfail($id);
         $collegeFees->delete();
         return redirect()->route('ladmin.college.fees.index')->with('success_message', 'College Fees Deleted Successfully');
     }
 
     //استعادة الرسوم الدراسية المحذوفة
 
     public function restore($id)
     {
         CollegeFees::withTrashed()->where('id', $id)->restore();
         return redirect()->route('ladmin.college.fees.index')->with('success_message', 'College Fees Restored Successfully');
     }
 
     //حذف الرسوم الدراسية بشكل نهائي
 
     public function forceDelete($id)
     {
         $collegeFees = CollegeFees::withTrashed()->where('id', $id)->first();
         if ($collegeFees) {
             $collegeFees->forceDelete();
 
             return redirect()->route('ladmin.college.fees.archive')->with('success_message', 'College Fees Deleted Successfully');
         } else {
             return redirect()->back()->with('error_message', 'College Fees Not Found');
         }
     }
}
