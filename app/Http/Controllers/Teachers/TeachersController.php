<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeachersController extends Controller
{
    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher) {
        $this->teacher = $teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = $this->teacher->getTeacherById(1);
        dd($teacher);
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
    public function store(Request $request)
    {
        //
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
}
