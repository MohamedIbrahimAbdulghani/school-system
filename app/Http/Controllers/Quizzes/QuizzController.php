<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Repository\QuizzesRepositoryInterface;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    protected $quizzes;

    public function __construct(QuizzesRepositoryInterface $quizzes)
    {
        $this->quizzes = $quizzes;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->quizzes->index();
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
        return $this->quizzes->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->quizzes->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->quizzes->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->quizzes->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->quizzes->destroy($id);
    }
}