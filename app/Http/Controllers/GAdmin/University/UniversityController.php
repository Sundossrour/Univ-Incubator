<?php

namespace App\Http\Controllers\GAdmin\University;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Catigory;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    //عرض صفحة جدول الجامعات

    public function index()
    {
        $universities = University::all();
        return view('GlobalAdmin.University.index', compact('universities'));
    }

    //عرض صفحة اضافة جامعة جديدة

    public function create()
    {
        return view('GlobalAdmin.University.create');
    }

    //تخزين بيانات الجامعة في قاعدة البيانات 

    public function store(Request $request)
    {
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('UniversityImage', $image, 'Image');

        University::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'type' => $request->input('type'),
            'created_by' => Auth::guard('gadmin')->user()->id,
            'img' => $path,
        ]);

        return redirect()->route('gadmin.university.index')->with('success_message', 'University Created Successfully');
    }

    //عرض صفحة تعديل بيانات الجامعة 

    public function edit(Request $request, $id)
    {
        $university = University::findOrfail($id);
        return view('GlobalAdmin.University.edit', compact('university'));
    }

    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);

        if ($request->file('img') == null) {
            $university->update([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'status' => $request->input('status'),
                'phone' => $request->input('phone'),
            ]);

            return redirect()->route('gadmin.university.index')->with('success_message', 'University Updated Successfully');
        } else {
            if ($university->img != null) {
                Storage::disk('Image')->delete($university->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('UniversityImage', $image, 'Image');

                $university->update([
                    'name' => $request->input('name'),
                    'type' => $request->input('type'),
                    'status' => $request->input('status'),
                    'phone' => $request->input('phone'),
                    'img' => $path,
                ]);

                return redirect()->route('gadmin.university.index')->with('success_message', 'University Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('UniversityImage', $image, 'Image');

                $university->update([
                    'name' => $request->input('name'),
                    'type' => $request->input('type'),
                    'status' => $request->input('status'),
                    'phone' => $request->input('phone'),
                    'img' => $path,
                ]);


                return redirect()->route('gadmin.university.index')->with('success_message', 'University Updated Successfully');
            }
        }
    }

    //عرض جدول الارشيف

    public function archive()
    {
        $universities = University::onlyTrashed()->get();
        return view('GlobalAdmin.University.archive', compact('universities'));
    }

    //حذف الجامعة ونقلها للارشيف

    public function softDelete($id)
    {
        $university = University::findOrfail($id);
        $university->delete();
        return redirect()->route('gadmin.university.index')->with('success_message', 'University Deleted Successfully');
    }

    //استعادة الجامعة المحذوفة

    public function restore($id)
    {
        University::withTrashed()->where('id', $id)->restore();
        return redirect()->route('gadmin.university.index')->with('success_message', 'University Restored Successfully');
    }

    //حذف الجامعة بشكل نهائي

    public function forceDelete($id)
    {
        $university = University::withTrashed()->where('id', $id)->first();
        if ($university) {
            Storage::disk('Image')->delete($university->img);
            $university->forceDelete();

            return redirect()->route('gadmin.university.archive')->with('success_message', 'University Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'University Not Found');
        }
    }
}
