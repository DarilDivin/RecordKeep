<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Direction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ServiceFormRequest;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Service::class, 'service');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.service.services');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        if (Direction::all()->count() == 0) {
            return redirect()
                ->route('admin.service.index')
                ->with('error', 'Vous devez disposer de direction(s) d\'abord.');
        }

        return view('admin.service.service-form', [
            'service' => new Service(),
            'directions' => Direction::getAllDirections(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFormRequest $request): RedirectResponse
    {
        Service::create($request->validated());
        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Le service a bien été  créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        return view('admin.service.service-form', [
            'service' => $service,
            'directions' => Direction::getAllDirections(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceFormRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());
        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Le service a bien été  modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();
        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Le service a bien été supprimé');
    }
}
