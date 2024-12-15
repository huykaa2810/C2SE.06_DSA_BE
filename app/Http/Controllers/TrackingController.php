<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function vitsitcount()
    {
        $tracking = Tracking::first();
        if (!$tracking) {
            $tracking = Tracking::create(['visit_count' => 0]);
        }
        $tracking->increment('visit_count');
        return response()->json([
            'status' => true,
            'message' => 'Số lượt truy cập đã được cập nhật.',
            'visit_count' => $tracking->visit_count + 1
        ]);
    }
    public function vitsitcountBytoday()
    {
        $today = now()->toDateString();
        $tracking = Tracking::where('date', $today)->first();
        if (!$tracking) {
            $tracking = Tracking::create(['date' => $today, 'visit_count' => 0]);
        }
        $tracking->increment('visit_count');
        return response()->json([
            'status' => true,
            'message' => 'Số lượt truy cập trong ngày đã được cập nhật.',
            'visit_count' => $tracking->visit_count + 1
        ]);
    }
}
