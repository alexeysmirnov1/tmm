<?php

namespace App\Actions;

use App\DTO\DateDTO;
use App\DTO\FormCreateAssetData;
use App\Repositories\AssetRepository;
use App\Repositories\SourceRepository;
use App\Services\WorkTimeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormCreateAssetAction
{
    private SourceRepository $sourceRepository;

    private AssetRepository $assetRepository;

    private WorkTimeService $workTimeService;

    public function __construct(
        SourceRepository $sourceRepository,
        AssetRepository $assetRepository,
        WorkTimeService $workTimeService
    )
    {
        $this->sourceRepository = $sourceRepository;
        $this->assetRepository = $assetRepository;
        $this->workTimeService = $workTimeService;
    }

    public function execute(FormCreateAssetData $data): array
    {
        $sources = $this->sourceRepository->getAll();

        $startDay = Carbon::parse($data->date)->startOfDay();
        $endDay = Carbon::parse($data->date)->endOfDay();

        $assets = $this->assetRepository->getForDay($startDay, $endDay);

        $workTime = $this->workTimeService->generateIntervalForDay($startDay, $endDay);

        $exceptedTime = $this->workTimeService->generateDurationIntervalAssets($assets);

        $workTime = $workTime->diff($exceptedTime);

        return compact(
            'sources',
            'workTime',
        );
    }
}
