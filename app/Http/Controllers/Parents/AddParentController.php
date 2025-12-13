<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use App\Models\TypeBloods;
use App\Models\Religions;
use Illuminate\Http\Request;
use App\Http\Requests\StoreParentRequest;
use App\Models\My_Parent;
use Illuminate\Support\Facades\Validator;

class AddParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Nationalities = Nationalitie::all();
        $Type_Bloods = TypeBloods::all();
        $Religions = Religions::all();
        return view('pages.Parents.add_parent', compact('Nationalities', 'Type_Bloods', 'Religions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParentRequest $request)
    {

            $parent = My_Parent::create([
                'email' => $request->email,
                'password' => $request->password,
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
            if ($parent) {
                toastr()->success(trans('messages.success'));
            } else {
                toastr()->error(trans('messages.error'));
            }
            return redirect()->route('add_parent.index');

            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function addParent() {
        $parent = My_Parent::all();
        return view('pages.Parents.show_parent', compact('parent'));
    }
}
