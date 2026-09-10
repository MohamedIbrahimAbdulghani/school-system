<?php

namespace App\Repository;

interface ClassRoomRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request, $id);
    public function destroy($request, $id);
    public function bulkDestroy($request);
}