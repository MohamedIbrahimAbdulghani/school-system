<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\ClassRooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.Classrooms.classrooms');
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
    public function show(ClassRooms $classRooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRooms $classRooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRooms $classRooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRooms $classRooms)
    {
        //
    }
}
