<?php

namespace App\Console\Commands;

use App\Models\User;
use DB;
use Illuminate\Console\Command;

class UserPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update User Permission';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm('Are you sure ?', true)) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('model_has_permissions')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $users = User::whereIn("role_id", ['1', '2', '3', '4'])->get();

            foreach ($users as $key => $user) {
                $permissions = getRolePermission($user->role->name);
                $user->syncPermissions($permissions);
            }
        }

        return 0;
    }
}
