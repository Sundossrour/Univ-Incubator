<?php

namespace App\Http\Controllers\GAdmin\LocalAdmin;

use App\Http\Controllers\Controller;
use App\Models\LAdmin;
use App\Models\LAdminUniversity;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LAdminController extends Controller
{
    //عرض صفحة جدول المسؤولين المحليين

    public function index()
    {
        $lAdmins = LAdmin::all();
        return view('GlobalAdmin.LAdmin.index', compact('lAdmins'));
    }

    //عرض صفحة اضافة مسؤول محلي جديد

    public function create()
    {
        return view('GlobalAdmin.LAdmin.create');
    }

    //تخزين بيانات مسؤول محلي في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('LAdminImage', $image, 'Image');

        LAdmin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'password' => Hash::make($password),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'img' => $path,
            'created_by' => Auth::guard('gadmin')->user()->id,
        ]);

        return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin Created Successfully');
    }

    //عرض صفحة تعديل بيانات مسؤول محلي

    public function edit(Request $request, $id)
    {
        $ladmin = LAdmin::findOrfail($id);
        return view('GlobalAdmin.LAdmin.edit', compact('ladmin'));
    }


    //تحديث بيانات مسؤول محلي

    public function update(Request $request, $id)
    {
        $ladmin = LAdmin::findOrFail($id);

        if ($request->file('img') == null) {
            $ladmin->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => $request->input('status'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
            ]);

            return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin Updated Successfully');
        } else {
            if ($ladmin->img != null) {
                Storage::disk('Image')->delete($ladmin->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('LAdminImage', $image, 'Image');

                $ladmin->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'status' => $request->input('status'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'img' => $path,
                ]);

                return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('LAdminImage', $image, 'Image');

                $ladmin->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'status' => $request->input('status'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'img' => $path,
                ]);


                return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin Updated Successfully');
            }
        }
    }

    //عرض جدول الارشيف

    public function archive()
    {
        $lAdmins = LAdmin::onlyTrashed()->get();
        return view('GlobalAdmin.LAdmin.archive', compact('lAdmins'));
    }

    //عرض صفحة الجامعات المسؤول عنها
    public function university($id)
    {
        $universityID = LAdminUniversity::where('ladminID', $id)->pluck('universityId');
        $universities = University::whereIn('id', $universityID)->get();
        $ladminID = $id;
        return view('GlobalAdmin.LAdmin.university', compact('universities', 'ladminID'));
    }

    //عرض صفحة اسناد جامعة لمسؤول محلي

    public function addUniversity($id)
    {
        $universities = University::all();
        $ladminID = $id;
        return view('GlobalAdmin.LAdmin.addUniversity', compact('universities', 'ladminID'));
    }

    //اسناد جامعة لمسؤول محلي في قاعدة البيانات

    public function storeUniversity(Request $request, $id)
    {
        LAdminUniversity::create([
            'universityId' => $request->input('universityId'),
            'ladminID' => $id
        ]);

        return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin University Assign Successfully');
    }

    public function revokeUniversity($id)
    {
        $universityID = $id;

        $localAdminUniv = LAdminUniversity::where('universityId' , $universityID)->first();

        $localAdminUniv->delete();

        return redirect()->route('gadmin.ladmin.index')->with('success_message', 'University Revoked Successfully');
    }

    //حذف مسؤول محلي ونقله للارشيف

    public function softDelete($id)
    {
        $ladmin = LAdmin::findOrfail($id);
        $ladmin->delete();
        return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin Deleted Successfully');
    }

    //استعادة مسؤول محلي محذوف 

    public function restore($id)
    {
        LAdmin::withTrashed()->where('id', $id)->restore();
        return redirect()->route('gadmin.ladmin.index')->with('success_message', 'Local Admin Restored Successfully');
    }

    //حذف مسؤول محلي بشكل نهائي

    public function forceDelete($id)
    {
        $ladmin = LAdmin::withTrashed()->where('id', $id)->first();
        if ($ladmin) {
            Storage::disk('Image')->delete($ladmin->img);
            $ladmin->forceDelete();

            return redirect()->route('gadmin.ladmin.archive')->with('success_message', 'Local Admin Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Local Admin Not Found');
        }
    }


    //عرض صفحة اعطاء الادوار والصلاحيات للمسؤول المحلي

    public function show(LAdmin $ladmin)
    {

        $roles = Role::get();
        $permissions = Permission::where('guard_name', 'ladmin')->get();

        return view('GlobalAdmin/LAdmin/role', compact('ladmin', 'roles', 'permissions'));
    }

    //اعطاء الادوار الى المسؤول المحلي

    public function assignrole(Request $request, LAdmin $ladmin)
    {

        $roleId = Role::where('name', $request->role)->value('id');
        $role_gaurd_name = Role::where('id', $roleId)->value('guard_name');

        if ($role_gaurd_name == 'ladmin') {
            if ($ladmin->hasRole($request->role)) {
                return back()->with('message_err', 'Role Is Already Assign');
            }
            $ladmin->assignRole($request->role);
            return back()->with('message_success', 'Role Assign Successfully');
        }
        return back()->with('message_err', 'Role Is Not For This User Guard');
    }

    //حذف الدور من المسؤول المحلي 

    public function removerole(LAdmin $ladmin, Role $role)
    {

        if ($ladmin->hasRole($role)) {
            $ladmin->removeRole($role);
            return back()->with('message_success', 'Role Removed Success');
        }

        return back()->with('message_err', 'Role Not Found');
    }

    //اعطاء صلاحية لمسؤول محلي 

    public function givepermission(Request $request, LAdmin $ladmin)
    {

        $permissionID = Permission::where('name', $request->permission)->value('id');
        $permission_gaurd_name = Permission::where('id', $permissionID)->value('guard_name');

        if ($permission_gaurd_name == 'ladmin') {
            if ($ladmin->hasPermissionTo($request->permission)) {
                return back()->with('message_err', 'Permission is already assign');
            }
            $ladmin->givePermissionTo($request->permission);
            return back()->with('message_success', 'Permission Assign Successfully');
        }
        return back()->with('message_err', 'Permission Is Not For This User Guard');
    }

    //سحب صلاحية من مسؤول محلي 

    public function revokepermission(LAdmin $ladmin, Permission $permission)
    {

        if ($ladmin->hasPermissionTo($permission)) {
            $ladmin->revokePermissionTo($permission);
            return back()->with('message_success', 'Permission Revok Successfully');
        }

        return back()->with('message_err', 'Permission Not Found');
    }
}
