<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use App\Services\IzinbelajarService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessLampiran implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 2 * 60 * 60;
    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(IzinbelajarService $izinbelajarService)
    {
        try {
            $izinbelajarService->store($this->file);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
