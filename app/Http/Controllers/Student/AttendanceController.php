<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\AttendancesRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $attendance;

    public function __construct(AttendancesRepositoryInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function index()
    {
        return $this->attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->attendance->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->attendance->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->attendance->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->attendance->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->attendance->destroy($id);
    }
}
