<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface GraduatedRepositoryInterface {

    public function index();
    public function create();
    public function store(Request $request);
    public function destroy(string $id);
    public function restore($id);
    public function graduateStudent($id);

}