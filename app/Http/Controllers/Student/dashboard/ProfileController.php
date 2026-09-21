<?php

namespace App\Http\Controllers\Student\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $profile = Student::findOrFail(auth('student')->user()->id);
        return view('pages.Students.profile', compact('profile'));
    }

    public function update(ProfileStudentRequest $request, $id) {
        try {
            $profile = Student::findOrFail($id);
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