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

//    public function create(Request $request)
//    {
//        $sources = Source::select(['id', 'title', 'time', 'color'])->get();
//
//        $startDay = Carbon::parse($request->date)->startOfDay();
//        $endDay = Carbon::parse($request->date)->endOfDay();
//
//        $assets = Asset::with('source')
//            ->whereBetween('date', [$startDay, $endDay])
//            ->get();
//
//        $interval = CarbonInterval::minutes(60)
//            ->toPeriod($startDay, $endDay)
//            ->toArray();
//
//        $workTime = collect($interval)->map(function ($time) {
//            return $time->format('H:i');
//        });
//
//        $exceptedTime = [];
//        foreach($assets as $asset) {
//            $durationInHours = Carbon::parse($asset->source->time)->hour;
//
//            $startTime = $asset->date;
//            //уменьшаем duration на 1 час, т.к. начало уже занимает 1 час
//            $endTime = $asset->date->addHours(--$durationInHours);
//
//            $assetInterval = CarbonInterval::minutes(60)
//                ->toPeriod($startTime, $endTime)
//                ->toArray();
//
//            collect($assetInterval)->each(function ($time) use (&$exceptedTime) {
//                $exceptedTime[] = $time->format('H:i');
//            });
//        }
//
//        $workTime = $workTime->diff($exceptedTime);
//
//        return view(
//            'assets.create',
//            compact(
//                'sources',
//                'workTime'
//            ),
//        );
//    }

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
