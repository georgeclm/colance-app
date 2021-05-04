<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Service;
use Illuminate\Http\Request;

class SellersController extends Controller
{
    function create()
    {
        return view('seller.add');
    }
    function store(Request $request)
    {
        request()->validate([
            'sellername' => ['bail', 'required'],
            'address' => 'sometimes',
            'url' => ['sometimes', 'url'],
            'description' => 'nullable'
        ]);

        // dd($request->all());
        $seller = new Seller;
        $seller->sellername = $request->sellername;
        $seller->address = $request->address;
        $seller->url = $request->url;
        $seller->description = $request->description;
        $seller->user_id = auth()->id();

        if (request('image')) {
            request()->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);
            // Storage::putFileAs('profile', request()->file('image'), request('image')->hashName());
            // change the public to s3
            request('image')->storeAs('public/profile', request('image')->hashName());
            $seller->image = request('image')->hashName();
        } else {
            $seller->image = "jAZHCrXvUSsoh3BtdypreKvz8tz0M4DEnDOfvvDt.png";
        }

        $seller->save();
        $seller->user->removeRole('Buyer');
        $seller->user->assignRole('Seller');


        return redirect('/');
    }
    function show(Seller $seller)
    {

        $services = Service::where('seller_id', $seller->id)->get();

        return view('seller.detail', compact('seller', 'services'));
    }
    public function edit(Seller $seller)
    {
        return view('seller.edit', compact('seller'));
    }
    public function update(Seller $seller)
    {
        $data = request()->validate([
            'sellername' => ['bail', 'required'],
            'address' => 'sometimes',
            'url' => ['sometimes', 'url'],
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'description' => 'sometimes'
        ]);

        if (request('image')) {
            // Storage::putFileAs('profile', request()->file('image'), request('image')->hashName(), 'public');
            // change the public to s3
            request('image')->storeAs('public/profile', request('image')->hashName());
            $imageArray = ['image' => request('image')->hashName()];
        }

        $seller->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect()->route('sellers.show', $seller)->with('success', 'Seller Profile Have Been Updated');
    }
}
