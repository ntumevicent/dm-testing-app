<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemLog;

class SystemLogController extends Controller
{
    

        /**
     * Mark logs as seen
     *
     * @param SystemLog $log
     */
    public function markAsSeen(SystemLog $log)
    {
        $log->markAsSeen();
    }

    /**
     * Mark all logs as seen
     *
     * @return void
     */
    public function markAllAsSeen()
    {
        SystemLog::unseen()->update(['seen_at' => now()]);
    }
}
