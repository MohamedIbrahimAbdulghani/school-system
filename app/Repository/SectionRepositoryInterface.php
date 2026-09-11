<?php


namespace App\Repository;

interface SectionRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request, $id);
    public function destroy($request, $id);
    public function getClasses($id);
}