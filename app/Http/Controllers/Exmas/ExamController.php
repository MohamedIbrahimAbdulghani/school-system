<?php

namespace App\Http\Controllers\Exmas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Repository\ExamsRepositoryInterface;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    protected $exams;

    public function __construct(ExamsRepositoryInterface $exams)
    {
        $this->exams = $exams;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->exams->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->exams->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        return $this->exams->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->exams->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->exams->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExamRequest $request)
    {
        return $this->exams->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->exams->destroy($id);
    }
}