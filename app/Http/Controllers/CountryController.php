<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;

class CountryController extends Controller
{

    function __construct()
    {
        // TODO: Need to create a suitable "not authorised" JSON response.
        $this->middleware(
            'role:guest|member|staff|admin',
            ['only' => ['index', 'show',]]
        );
        $this->middleware(
            'role:staff|admin',
            ['only' => ['create', 'store',]]
        );
        $this->middleware(
            'role:staff|admin',
            ['only' => ['edit', 'update',]]
        );
        $this->middleware(
            'role:staff|admin',
            ['only' => ['destroy', 'delete',]]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCountryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCountryRequest $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
