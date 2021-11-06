<?php

namespace App\Actions;

use App\Models\Asset;
use App\Models\Source;
use App\Repositories\AssetRepository;
use App\Repositories\SourceRepository;
use App\Services\WorkTimeService;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class FormCreateAssetsAction
{
    private SourceRepository $sourceRepository;
    private AssetRepository $assetRepository;
    private WorkTimeService $workTimeService;

    public function __construct(
        SourceRepository $sourceRepository,
        AssetRepository $assetRepository,
        WorkTimeService $workTimeService
    ) {
        $this->sourceRepository = $sourceRepository;
        $this->assetRepository = $assetRepository;
        $this->workTimeService = $workTimeService;
    }

    public function execute(array $request): array
    {
        $sources = $this->sourceRepository->getAll();

        $day = $this->workTimeService
            ->getStartEndOfDay($request['date']);

        $assets = $this->assetRepository
            ->getByInterval(
                $day['start'],
                $day['end'],
            );

        $workTime = $this->workTimeService
            ->generateIntervalByHours(
                $day['start'],
                $day['end'],
            );

        $exceptedTime = $this->workTimeService
            ->generateDurationIntervalFromAssets($assets);

        $workTime = $workTime->diff($exceptedTime);

        return compact(
            'sources',
            'workTime'
        );
    }
}
