<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreRequest;
use App\Models\Request;

class RentRequestController extends Controller
{
    public function index()
    {
        $requests = Request::paginate(10);

        if(request()->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'requests' => $requests->items(),
                    'current_page' => $requests->currentPage(),
                    'last_page' => $requests->lastPage(),
                ],
            ]);
        }

        return view(
            'rent.requests.index',
            compact(
                'requests',
            ),
        );
    }

    public function store(StoreRequest $request)
    {
        return response()->json([], 201);
    }
}
