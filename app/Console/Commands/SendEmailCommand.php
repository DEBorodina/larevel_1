<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;
use Nette\Utils\Json;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:email {user_id} {message} {--l}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $user  = User::find($this->argument('user_id'));
        if(!$user){
            $this->error('unknown user');
        }else{
            \Illuminate\Support\Facades\Mail::to($user->email)
                ->send(new \App\Mail\BingoEmail($this->argument('message'),$user->name,$this->option('l')));
        }
        return Command::SUCCESS;
    }
}
