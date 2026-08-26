<?php

namespace App\Http\Controllers\Libraries;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibraryRequest;
use App\Repository\LibrariesRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $libraries;

    public function __construct(LibrariesRepositoryInterface $libraries)
    {
        $this->libraries = $libraries;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->libraries->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->libraries->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibraryRequest $request)
    {
        return $this->libraries->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->libraries->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->libraries->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->libraries->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->libraries->destroy($id);
    }
}
