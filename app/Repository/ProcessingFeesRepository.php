<?php

namespace App\Repository;
use App\Models\Students;


class ProcessingFeesRepository implements ProcessingFeesRepositoryInterface {
    public function index() {
        return 'index function';
    }
    public function store($request) {
        return 'store function';
    }
    public function show($id) {
        $student = Students::findOrFail($id);
        return view('pages.ProcessingFees.add', compact('student'));
    }
    public function edit($id) {
        return 'edit function';
    }
    public function update($request) {
        return 'update function';
    }
    public function destroy($request) {
        return 'destroy function'; 
    }
}