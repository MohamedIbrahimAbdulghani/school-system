<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\promotion;
use App\Models\Students;
use App\Repository\StudentPromotionsRepositoryInterface;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    protected $promotions;

    public function __construct(StudentPromotionsRepositoryInterface $promotions)
    {
        $this->promotions = $promotions;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->promotions->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->promotions->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->promotions->store($request);
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
    public function destroy(Request $request)
    {
        return $this->promotions->destroy($request);
    }

}