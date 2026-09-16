<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $profile = Teacher::findOrFail(auth('teacher')->user()->id);
        return view('pages.Teachers.profile', compact('profile'));
    }

    public function update(Request $request, $id) {
        try {
            $profile = Teacher::findOrFail($id);
            if(!empty($request->password)) {
                $profile->update([
                    'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                    'password' => Hash::make($request->password),
                ]);
            } else {
                $profile->update([
                    'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                ]);
            }
            toastr()->success(trans('messages.update'));
            return redirect()->route('profile.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
