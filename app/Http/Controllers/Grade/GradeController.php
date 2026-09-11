<?php

namespace App\Http\Controllers\Grade;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Repository\GradeRepositoryInterface;

class GradeController extends Controller
{
    protected $grade;
    public function __construct(GradeRepositoryInterface $grade)
    {
        $this->grade = $grade;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->grade->index();
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
    public function store(StoreGradeRequest $request)
    {
        return $this->grade->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGradeRequest $request, $id)
    {
        return $this->grade->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        return $this->grade->destroy($request, $id);
    }
}
