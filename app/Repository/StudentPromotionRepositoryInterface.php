<?php


namespace App\Repository;

use App\Http\Requests\UpdatePromotionsRequest;

interface StudentPromotionRepositoryInterface {
    public function index();
    public function store($request);
    public function create();
    public function destroy($request);
}