<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Reservation\StoreReservationRequest;
use App\Http\Requests\Reservation\UpdateReservationRequest;
use App\Http\Resources\Reservation\ReservationCollection;
use App\Http\Resources\Reservation\ReservationResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ReservationCollection(Reservation::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = Reservation::create($request->all());

        return new ReservationResource($reservation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return new ReservationResource($reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response(null, 204);
    }
}
