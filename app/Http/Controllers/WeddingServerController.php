<?php

namespace App\Http\Controllers;

use App\Models\WeddingServer;
use App\Models\StaffMember;
use Illuminate\Http\Request;

class WeddingServerController extends Controller
{
    public function index()
    {
        $servers = WeddingServer::with('staffMember')->get();
        return view('weddingservers.index', compact('servers'));
    }

    public function create()
    {
        $staffmembers = StaffMember::all();
        return view('weddingservers.create', compact('staffmembers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Staffmember_ID' => 'required|exists:staffmember,Staffmember_ID|unique:weddingserver,Staffmember_ID',
            'Assigned_Section' => 'required|string|max:100',
        ]);

        WeddingServer::create($validated);

        return redirect()->route('weddingservers.index')->with('success', 'Server assigned.');
    }

    public function show($id)
    {
        $server = WeddingServer::with('staffMember')->findOrFail($id);
        return view('weddingservers.show', compact('server'));
    }

    public function edit($id)
    {
        $server = WeddingServer::findOrFail($id);
        return view('weddingservers.edit', compact('server'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Assigned_Section' => 'required|string|max:100',
        ]);

        $server = WeddingServer::findOrFail($id);
        $server->update($validated);

        return redirect()->route('weddingservers.index')->with('success', 'Server updated.');
    }

    public function destroy($id)
    {
        $server = WeddingServer::findOrFail($id);
        $server->delete();

        return redirect()->route('weddingservers.index')->with('success', 'Server removed.');
    }
}
