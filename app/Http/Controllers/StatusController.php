<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::all();
        return view('status.index', compact('status'));
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|unique:status|max:255']);
        Status::create($request->all());
        return redirect()->route('status.index')->with('success', 'Status criado com sucesso.');
    }

    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $request->validate(['nome' => 'required|max:255|unique:status,nome,' . $status->id]);
        $status->update($request->all());
        return redirect()->route('status.index')->with('success', 'Status atualizado com sucesso.');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Status excluído com sucesso.');
    }
}
