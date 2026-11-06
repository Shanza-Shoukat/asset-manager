<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AssetController extends Controller
{
// index
public function index()
    {
        $assets = Asset::with('currentAssignment.user')->get();
        $assignableUsers = User::where('active', true)->orderBy('name')->get();

        return view('assets.index', compact('assets', 'assignableUsers'));
    }
    // edit
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'asset_tag' => [
                'required',
                'string',
                'max:255',
                Rule::unique('assets', 'asset_tag')->ignore($asset->id),
            ],
            'category' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
        ]);

        $asset->update($validated);

        return redirect()->route('assets.index')->with('success', 'Asset updated.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('assets.index')->with('success', 'Asset deleted.');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'asset_tag' => 'required|string|max:255|unique:assets,asset_tag',
            'category' => 'required|string|max:255',
            'serial_number' => 'nullable|string|max:255',
        ]);

        Asset::create($validated);

        return redirect()->route('assets.index')
            ->with('success', 'Asset added successfully');
    }
    public function dashboard()
    {
        $total = Asset::count();
        $available = Asset::where('status', 'Available')->count();
        $assigned = Asset::where('status', 'Assigned')->count();

        return view('dashboard', compact('total', 'available', 'assigned'));
    }



    // asset assignment bussiness logic


    public function assign(Request $request, Asset $asset)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::where('active', true)->findOrFail($data['user_id']);

        if ($asset->status !== 'Available') {
            return back()->with('error', 'this asset is already assigned');
        }

        DB::transaction(function () use ($asset, $user) {
            $asset->assignments()->create([
                'user_id' => $user->id,
                'assigned_at' => now(),
            ]);

            $asset->status = 'Assigned';
            $asset->save();
        });

        return back()->with('success', 'Asset assigned');
    }

    public function unassign(Asset $asset)
    {
        DB::transaction(function () use ($asset) {
            $assignment = $asset->currentAssignment()->firstOrFail();

            $assignment->unassigned_at = now();
            $assignment->save();

            $asset->status = 'Available';
            $asset->save();
        });

        return back()->with('success', 'asset unassigned');
    }
}
