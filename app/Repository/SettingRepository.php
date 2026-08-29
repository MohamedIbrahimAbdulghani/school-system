<?php

namespace App\Repository;

use App\Models\Setting;

class SettingRepository implements SettingRepositoryInterface {
    public function index(){

        $settings = Setting::all();
        $setting['setting'] = $settings->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('pages.Settings.index', $setting);

    }

    public function update($request){
        // unsend token and method type with my request
        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }
            if ($request->hasFile('logo')) {
                $oldLogo = Setting::where('key', 'logo')->value('value');
                 // Delete old logo
                    if ($oldLogo) {
                        $oldLogoPath = public_path('attachments/logo/' . $oldLogo);
                        if (file_exists($oldLogoPath)) {
                            unlink($oldLogoPath);
                        }
                    }
                     // Get new logo
                        $file = $request->file('logo');
                        // Get original file name
                        $newFileName = $file->getClientOriginalName();
                        // Logo directory
                        $destinationPath = public_path('attachments/logo');
                        // Create directory if it doesn't exist
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0755, true);
                        }
                        // Store new logo
                        $file->move($destinationPath, $newFileName);
                        // Update logo name in database
                        Setting::where('key', 'logo')->update([
                            'value' => $newFileName
                        ]);
            }
            toastr()->success(trans('messages.update'));
            return redirect()->route('settings.index');
        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }
}
