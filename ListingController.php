<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing ;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all()
            ]
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Listing::create(
            $request->validate([
                'beds' =>'required|integer|min:0|max:20',
                'baths' =>'required|integer|min:0|max:20',
                'area' =>'required|integer|min:15|max:1500',
                'city' =>'required',
                'code' =>'required|integer|min:0|max:1000',
                'street' =>'required',
                'street_number' =>'required|integer|min:1|max:1000',
                'price' =>'required|integer|min:50000|max:2000000',
           ])
        );


        return redirect()->route('listing.index')
            ->with('success', 'Listing was created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
            );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' =>'required|integer|min:0|max:20',
                'baths' =>'required|integer|min:0|max:20',
                'area' =>'required|integer|min:15|max:1500',
                'city' =>'required',
                'code' =>'required|integer|min:0|max:1000',
                'street' =>'required',
                'street_number' =>'required|min:1|max:1000',
                'price' =>'required|integer|min:50000|max:2000000'
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}