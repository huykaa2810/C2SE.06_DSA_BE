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
    public function vitsitcountBytoday(Request $request)
    {
        $date = date('Y-m-d');
        $tracking = Tracking::firstOrCreate(
            ['date' => $date],
            ['visit_count' => 0]
        );
        $tracking->visit_count++;
        $tracking->save();
        return response()->json([
            'message' => 'Lượt truy cập đã được tăng.',
            'date' => $tracking->date,
            'visit_count' => $tracking->visit_count,
        ]);
    }
}
