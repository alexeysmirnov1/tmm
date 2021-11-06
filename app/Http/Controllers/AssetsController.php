<?php

namespace App\Http\Controllers;

use App\Actions\FormCreateAssetsAction;
use App\Models\Asset;
use App\Models\Source;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssetsController extends Controller
{
    public function index(): View
    {
        return view('assets.index');
    }

    public function create(Request $request, FormCreateAssetsAction $action)
    {
        return view(
            'assets.create',
            $action->execute($request->all()),
        );
    }

    public function store(Request $request)
    {
    }

    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
