<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $services = Service::whereStatus(true)->get();
        return view('admin.cars.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        try {
            $validated = $request->validated();

            if($request->hasFile('image')){
                $validated['image'] = Storage::putFile('uploads/cars/images', $request->file('image'));
            }

            $selectedServices = $request->input('services', []);
            $validated['services'] = $selectedServices ? json_encode($selectedServices) : null;
            $created = Car::create($validated);

            if($created)
                Log::info("Car created successfully: " . $created->id . "Ip: ". $request->ip() . "user: ". Auth::id());

            return redirect()
                ->route('admin.cars.index')
                ->with('success', 'Car created successfully.');
        }catch (\Exception $exception){
            Log::error("Error from car store method: " . $exception->getMessage());
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, string $id)
    {
        $car = Car::findOrFail($id);
        $validated = $request->validated();

        if($request->hasFile('image')){
            if($car->image) Storage::delete($car->image);
            $validated['image'] = Storage::putFile('uploads/cars/images', $request->file('image'));
        }
        $car->update($validated);
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        if($car->image) Storage::delete($car->image);

        $car->delete();

        return redirect()->back()->with('success', 'Car deleted successfully.');
    }
}
