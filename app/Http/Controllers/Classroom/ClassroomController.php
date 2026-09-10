<?php

namespace App\Http\Controllers\Classroom;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Repository\ClassRoomRepositoryInterface;
class ClassroomController extends Controller
{
    protected $classRoom;
    public function __construct(ClassRoomRepositoryInterface $classRoom)
    {
        $this->classRoom = $classRoom;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->classRoom->index();
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
    public function store(StoreClassRoomRequest $request)
    {
        return $this->classRoom->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classRooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classRooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassRoomRequest $request, $id)
    {
        return $this->classRoom->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        return $this->classRoom->destroy($request, $id);
    }

    // this is function to delete all classes
    public function bulkDestroy(Request $request) {
        return $this->classRoom->bulkDestroy($request);
    }

}
