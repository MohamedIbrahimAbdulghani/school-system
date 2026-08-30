<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Repository\SettingRepositoryInterface;
class SettingController extends Controller
{
    protected $settings;
    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function index() {
        return $this->settings->index();
    }

    public function update(UpdateSettingRequest $request) {
        return $this->settings->update($request);
    }
}
