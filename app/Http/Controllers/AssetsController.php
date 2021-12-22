<?php

namespace App\Http\Controllers;

use App\Actions\FormCreateAssetAction;
use App\DTO\FormCreateAssetData;
use App\Http\Requests\CreateAssetRequest;
use App\Models\Asset;
use Elasticsearch\Endpoints\Create;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssetsController extends Controller
{
    public function index(): View
    {
        return view('assets.index');
    }

    public function create(CreateAssetRequest $request, FormCreateAssetAction $action)
    {
        $dto = FormCreateAssetData::fromRequest($request);

        return view(
            'assets.create',
            $action->execute($dto),
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
