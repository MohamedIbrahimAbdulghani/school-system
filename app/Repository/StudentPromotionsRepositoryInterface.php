<?php


namespace App\Repository;

use App\Http\Requests\UpdatePromotionsRequest;

interface StudentPromotionsRepositoryInterface {
    public function index();
    public function store(UpdatePromotionsRequest $request);
}
