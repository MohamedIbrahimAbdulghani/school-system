<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use App\Models\TypeBloods;
use App\Models\Religions;
use Illuminate\Http\Request;
use App\Http\Requests\StoreParentRequest;
use App\Models\MyParents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parent = MyParents::all();
        return view('pages.Parents.index', compact('parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Nationalities = Nationalitie::all();
        $Type_Bloods = TypeBloods::all();
        $Religions = Religions::all();
        return view('pages.Parents.add_parent', compact('Nationalities', 'Type_Bloods', 'Religions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParentRequest $request)
    {
        DB::beginTransaction(); // start transaction
        try {
        $parent = MyParents::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'father_name' => ['ar' => $request->father_name, 'en' => $request->father_name_en], // this is to enter 2 forma from name ( arabic + english )
                'father_job' => ['ar' => $request->father_job, 'en' => $request->father_job_en],
                'father_national_id' => $request->father_national_id,
                'father_passport_id' => $request->father_passport_id,
                'father_phone' => $request->father_phone,
                'father_nationality_id' => $request->father_nationality_id,
                'father_blood_type_id' => $request->father_blood_type_id,
                'father_religion_id' => $request->father_religion_id,
                'father_address' => $request->father_address,

                'mother_name' => ['ar' => $request->mother_name, 'en' => $request->mother_name_en], // this is to enter 2 forma from name ( arabic + english )
                'mother_job' => ['ar' => $request->mother_job, 'en' => $request->mother_job_en],
                'mother_national_id' => $request->mother_national_id,
                'mother_passport_id' => $request->mother_passport_id,
                'mother_phone' => $request->mother_phone,
                'mother_nationality_id' => $request->mother_nationality_id,
                'mother_blood_type_id' => $request->mother_blood_type_id,
                'mother_religion_id' => $request->mother_religion_id,
                'mother_address' => $request->mother_address,
            ]);
            // to create filename in Images Table
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name =  $image->getClientOriginalName();
                    $image->storeAs('attachments/parents/' . $parent->father_name, $name, 'uploda_attachments');
                    Image::create([
                        'filename' => $name,
                        'imageable_id' => $parent->id,
                        'imageable_type' => 'App\Models\MyParents',
                    ]);
                }
            }

            if ($parent) {
                toastr()->success(trans('messages.success'));
            } else {
                toastr()->error(trans('messages.error'));
            }

            DB::commit(); // insert data in database

        } catch (\Exception $e) {
            DB::rollBack(); // if any error rollback all data
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
            return redirect()->route('parents.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parent = MyParents::findOrFail($id);
        $Nationalities = Nationalitie::all();
        $Type_Bloods = TypeBloods::all();
        $Religions = Religions::all();
        return view('pages.Parents.show_parent', compact('parent', 'Nationalities', 'Type_Bloods', 'Religions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Nationalities = Nationalitie::all();
        $Type_Bloods = TypeBloods::all();
        $Religions = Religions::all();
        $parent = MyParents::findOrFail($id);
        return view('pages.Parents.edit_parent', compact('Nationalities', 'Type_Bloods', 'Religions', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreParentRequest $request, string $id)
    {
        $parent = MyParents::findOrFail($id);
        $parent->update([
            'email' => $request->email,
            'father_name' => ['ar' => $request->father_name, 'en' => $request->father_name_en], // this is to enter 2 forma from name ( arabic + english )
            'father_job' => ['ar' => $request->father_job, 'en' => $request->father_job_en],
            'father_national_id' => $request->father_national_id,
            'father_passport_id' => $request->father_passport_id,
            'father_phone' => $request->father_phone,
            'father_nationality_id' => $request->father_nationality_id,
            'father_blood_type_id' => $request->father_blood_type_id,
            'father_religion_id' => $request->father_religion_id,
            'father_address' => $request->father_address,

            'mother_name' => ['ar' => $request->mother_name, 'en' => $request->mother_name_en], // this is to enter 2 forma from name ( arabic + english )
            'mother_job' => ['ar' => $request->mother_job, 'en' => $request->mother_job_en],
            'mother_national_id' => $request->mother_national_id,
            'mother_passport_id' => $request->mother_passport_id,
            'mother_phone' => $request->mother_phone,
            'mother_nationality_id' => $request->mother_nationality_id,
            'mother_blood_type_id' => $request->mother_blood_type_id,
            'mother_religion_id' => $request->mother_religion_id,
            'mother_address' => $request->mother_address,
        ]);
            if ($request->filled('password')) {
                $parent->password = Hash::make($request->password);
            }
            if ($parent) {
                toastr()->success(trans('messages.update'));
            } else {
                toastr()->error(trans('messages.error'));
            }
            return redirect()->route('parents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parent = MyParents::findOrFail($id);
        $parent->delete();
        if ($parent) {
            toastr()->success(trans('messages.delete'));
        }
        return redirect()->route('parents.index');
    }
    // this function to make realtime validation about add_parent
    public function validateField(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                $request->field => $request->rules,
            ],
            (new StoreParentRequest())->messages(),
            (new StoreParentRequest())->attributes()
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first($request->field),
            ], 422);
        }

        return response()->json(['success' => true]);
    }

    // this is function to delete all parents
    public function bulkDestroy(Request $request) {
        // ids جايه كسلسلة مفصولة بفاصلة
        $ids = explode(',', $request->ids);

        // حذف كل الصفوف اللي الـ IDs بتاعتها موجودة
        MyParents::whereIn('id', $ids)->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }

    // this is function to upload photo for parents or to upload attachments for parents
        public function uploadParentAttachments(Request $request, $id) {
        $parent = MyParents::findOrFail($id);
        // Storage photo
        if($request->hasFile('photos')) {
            foreach($request->file('photos') as $photo) {
                $name = $photo->getClientOriginalName();
                $father_name = $parent->getTranslation('father_name', app()->getLocale());
                $photo->storeAs('attachments/parents/' . $father_name, $name, 'upload_attachments');
                Image::create([
                    'filename' => 'attachments/parents/' . $father_name . '/' . $name,
                    'imageable_id' => $parent->id,
                    'imageable_type' => 'App\Models\MyParents',
                ]);
            }
        }
        toastr()->success(trans('messages.upload'));
        return back();
    }
// this is function to delete photo for  attachments for students
    public function deleteParentAttachments($id) {
        $image = Image::findOrFail($id);

        if (Storage::disk('upload_attachments')->exists($image->filename)) {
            Storage::disk('upload_attachments')->delete($image->filename);
        }

        $image->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }
}