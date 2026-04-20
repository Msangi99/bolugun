<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Symfony\Component\Console\Output\BufferedOutput;

class AdminCommandController extends Controller
{
    private const ALLOWED_COMMANDS = [
        'storage:link' => 'Create storage symlink for public file access',
        'cache:clear' => 'Clear application cache',
        'cache:forget' => 'Clear a specific cache key',
        'config:cache' => 'Create a cache file for faster config loading',
        'config:clear' => 'Remove the configuration cache file',
        'route:cache' => 'Create a route cache file for faster route registration',
        'route:clear' => 'Remove the route cache file',
        'view:cache' => 'Compile all of the application\'s Blade templates',
        'view:clear' => 'Clear all compiled view files',
        'migrate' => 'Run the database migrations',
        'migrate:fresh' => 'Drop all tables and re-run all migrations',
        'db:seed' => 'Seed the database with records',
    ];

    public function index(): View
    {
        return view('admin.commands.index', [
            'commands' => self::ALLOWED_COMMANDS,
        ]);
    }

    public function run(Request $request): RedirectResponse
    {
        $command = $request->validate([
            'command' => ['required', 'string', 'in:'.implode(',', array_keys(self::ALLOWED_COMMANDS))],
        ])['command'];

        try {
            $output = new BufferedOutput();
            $exitCode = Artisan::call($command, [], $output);

            $message = $output->fetch();
            $status = $exitCode === 0 ? 'success' : 'error';

            return redirect()
                ->route('admin.commands.index')
                ->with($status, $message ?: "Command '{$command}' executed successfully.");
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.commands.index')
                ->with('error', 'Error: '.$e->getMessage());
        }
    }
}
