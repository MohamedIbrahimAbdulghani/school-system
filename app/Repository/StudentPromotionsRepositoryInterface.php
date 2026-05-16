<?php


namespace App\Repository;

use App\Http\Requests\UpdatePromotionsRequest;

interface StudentPromotionsRepositoryInterface {
    public function index();
    public function store(UpdatePromotionsRequest $request);
    public function create();
    public function destroy($request);
}