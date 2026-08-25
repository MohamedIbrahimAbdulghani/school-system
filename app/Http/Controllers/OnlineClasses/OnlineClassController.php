<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOnlineClassManualRequest;
use App\Http\Requests\StoreOnlineClassRequest;
use App\Repository\OnlineClassesRepositoryInterface;
use Illuminate\Http\Request;

class OnlineClassController extends Controller
{
    protected $online_class;

    public function __construct(OnlineClassesRepositoryInterface $online_class)
    {
        $this->online_class = $online_class;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->online_class->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->online_class->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOnlineClassRequest $request)
    {
        return $this->online_class->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->online_class->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->online_class->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->online_class->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->online_class->destroy($id);
    }

    public function createManual() {
        return $this->online_class->createManual();
    }
    public function storeManual(StoreOnlineClassManualRequest $request) {
        return $this->online_class->storeManual($request);
    }
}
