<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DebitController extends Controller
{
    public function index(): View
    {
        return view('debit.index');
    }

    public function create(Request $request)
    {
        return view('debit.create');
    }

    public function store(Request $request)
    {
    }

    public function show(Asset $asset)
    {
        return view('debit.show');
    }

    public function edit(Asset $asset)
    {
        return view('debit.edit');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
