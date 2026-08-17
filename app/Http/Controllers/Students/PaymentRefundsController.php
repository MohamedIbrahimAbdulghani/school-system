<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\PaymentRefundsRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRefundsRequest;
use App\Http\Requests\UpdatePaymentRefundsRequest;


class PaymentRefundsController extends Controller
{

    protected $payment;

    public function __construct(PaymentRefundsRepositoryInterface $payment) {
        $this->payment = $payment;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->payment->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRefundsRequest $request)
    {
        return $this->payment->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->payment->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRefundsRequest $request, string $id)
    {
        return $this->payment->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);
    }
}
