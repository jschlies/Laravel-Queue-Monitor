<?php

namespace romanzipp\QueueMonitor\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use romanzipp\QueueMonitor\Models\Monitor;

class DeleteMonitorController
{
    public function __invoke(Request $request, Monitor $monitor): RedirectResponse
    {
        $monitor->delete();
        $data = $request->all();

        return redirect()->route(
            'queue-monitor::index_filtered',
            [
                'type'  => isset($data['type']) ? $data['type'] : 'all',
                'queue' => isset($data['queue']) ? $data['queue'] : 'all',
            ]
        );
    }
}
