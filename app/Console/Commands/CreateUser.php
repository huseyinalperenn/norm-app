<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command is create example user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::query()
            ->updateOrCreate([
                'email' => "test@example.com",
            ], [
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
                'name' => 'Example User'
            ]);
    }
}
