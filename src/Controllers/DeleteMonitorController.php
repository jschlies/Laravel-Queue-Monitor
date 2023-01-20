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
            'queue-monitor::index',
            [
                'type'  => isset($data['type']) ? $data['type'] : null,
                'queue' => isset($data['queue']) ? $data['queue'] : null,
            ]
        );
    }
}
