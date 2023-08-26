<?php

namespace App\Console\Commands;

use App\Models\AnalyticaTask;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync tasks from external API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');
        $tasksData = $response->json();

        foreach ($tasksData as $taskData) {
            AnalyticaTask::updateOrCreate(['api_id' => $taskData['id']], [
                'title' => $taskData['title'],
                'description' => $taskData['title'], // Use title as description for simplicity
                'status' => $taskData['completed'] ? 'completed' : 'pending'
            ]);
        }

        $this->info('Tasks synchronized successfully!');
    }
}
