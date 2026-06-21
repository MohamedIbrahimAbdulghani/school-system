<?php

namespace App\Repository;


interface FeeInvoicesInterface {
    public function index();

    public function show($id);
}
