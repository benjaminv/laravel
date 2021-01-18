<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Admin::class);

        $search = $request->get('search', '');

        $admins = Admin::search($search)
            ->latest()
            ->paginate();

        return view('app.admins.index', compact('admins', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Admin::class);

        return view('app.admins.create');
    }

    /**
     * @param \App\Http\Requests\AdminStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request)
    {
        $this->authorize('create', Admin::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $admin = Admin::create($validated);

        return redirect()
            ->route('admins.edit', $admin)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Admin $admin)
    {
        $this->authorize('view', $admin);

        return view('app.admins.show', compact('admin'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Admin $admin)
    {
        $this->authorize('update', $admin);

        return view('app.admins.edit', compact('admin'));
    }

    /**
     * @param \App\Http\Requests\AdminUpdateRequest $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $this->authorize('update', $admin);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $admin->update($validated);

        return redirect()
            ->route('admins.edit', $admin)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Admin $admin)
    {
        $this->authorize('delete', $admin);

        $admin->delete();

        return redirect()
            ->route('admins.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
