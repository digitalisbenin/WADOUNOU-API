<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RestaurantCollection(Restaurant::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->all());

        return new RestaurantResource($restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());
        return new RestaurantResource($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response(null, 204);
    }
}
