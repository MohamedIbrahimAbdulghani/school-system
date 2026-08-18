<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectsRequest;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;


class SubjectController extends Controller
{

    protected $subject;

    public function __construct(SubjectRepositoryInterface $subject)
    {
        $this->subject = $subject;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->subject->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->subject->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectsRequest $request)
    {
        return $this->subject->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->subject->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubjectsRequest $request, $id)
    {
        return $this->subject->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->subject->destroy($request);
    }
}