<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceFormRequest;
use App\Models\Direction;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.services', [
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();

        return view('admin.service.service-form', [
            'service' => $service,
            'directions' => Direction::pluck('direction', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFormRequest $request)
    {
        $service = Service::create($request->validated());
        // $service->direction()->sync($request->validated('direction'));
        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Le service a bien été  créé');
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
    public function edit(Service $service)
    {
        return view('admin.service.service-form', [
            'service' => $service,
            'directions' => Direction::pluck('direction', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceFormRequest $request, Service $service)
    {
        $service->update($request->validated());
        // $service->direction()->sync($request->validated('direction'));
        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Le service a bien été  modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Le service a bien été supprimé');
    }
}
