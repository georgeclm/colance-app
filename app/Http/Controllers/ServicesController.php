<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:service-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:service-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    // }
    function getDownload(Service $service)
    {
        $file = public_path() . "/uploads/service/{$service->image}";
        // to show the file
        // return response()->file($file);
        return response()->download($file, $service->name . ".jpg");
    }

    public function autocomplete()
    {
        $services = Service::all();
        return response()->json($services);
    }

    function index()
    {
        // dd((boolval("dara")));
        // dd(auth()->user()->seller);
        $categories = Category::all();
        $services = Service::with('ratings')->paginate(30);
        // dd(auth()->user()->roles->first()->name);
        $first = $services[0]->id;
        return view('service.index', compact('services', 'first', 'categories'));
    }

    function show(Service $service)
    {
        // dd($service->seller->user->id);
        // dd($service->serviceImage());
        $favorite = (auth()->user()) ? auth()->user()->favorite->contains($service->id) : false;
        // dd($service->ratings->count());
        $stars = array();

        if ($service->ratings()->count() != 0) {
            $average = $service->ratings()->average('rating');
            $rating = 5;
            for ($i = 0; $i < 10; $i += 2) {
                $stars[$i] = $service->ratings->where('rating', $rating)->count();
                $stars[$i + 1] = $stars[$i] / $service->ratings->count() * 100;
                $rating--;
            }
        } else {
            $average = 0;
        }

        return view('service.detail', compact('service', 'favorite', 'average', 'stars'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('service.add', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd(request('image'));
        request()->validate([
            'name' => ['bail', 'required'],
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'delivery_time' => ['required', 'numeric'],
            'revision_time' => ['required', 'numeric'],
            'image' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        // dimensions:ratio=3/2
        $extension = $request->image->extension();
        // change the public to s3
        request('image')->storeAs('public/service', request('image')->hashName());
        // dd($request->image->hashName());

        $service = new Service;
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->delivery_time = $request->delivery_time;
        $service->revision_time = $request->revision_time;
        $service->image = request('image')->hashName();
        $service->seller_id = auth()->user()->seller->id;
        $service->category_id = $request->category_id;
        $service->save();

        return redirect()->route('services.index');
    }

    function search(Request $request)
    {
        // for the search engine inside database search all the name like to following value
        // dd(Session::get('services'));
        $query = $request->input('query');

        $services = Service::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->with('ratings')
            ->get();

        return view('service.search', compact('services', 'query'));
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('service.edit', compact('service', 'categories'));
    }

    public function update(Service $service)
    {
        // dd(request()->all());
        // dd($service);
        $data = request()->validate([
            'name' => 'bail|required',
            'price' => 'required',
            'description' => 'required',
            'delivery_time' => 'required|numeric',
            'revision_time' => 'required|numeric',
            'image' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        if (request('image')) {
            // change the public to s3
            request('image')->storeAs('public/service', request('image')->hashName());
            $imageArray = ['image' => request('image')->hashName()];
        }
        $service->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect()->route('services.show', $service)->with('success', 'Gig Have Been Updated');
    }

    public function destroy(Service $service)
    {
        Service::destroy($service->id);
        return redirect()->route('sellers.show', auth()->user())->with('success', 'Gig Have Been Removed');
    }
}
