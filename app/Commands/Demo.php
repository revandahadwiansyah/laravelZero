<?php

namespace App\Commands;

use App\Commands\generalFunction;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Demo extends Command {

    protected $input;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'demo {input?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Demo hello world command feature';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $this->generalFunction = new generalFunction();
        if ($this->argument('input') != null) {
            $this->input = strval($this->argument('input'));
            $this->input = $this->ask('Please input string');
        }
        $this->info("Sample Input");
        $this->info("{$this->generalFunction->firstCondition($this->input)}");
        $this->info("{$this->generalFunction->secondCondition($this->input)}");
        $this->info("{$this->generalFunction->exportCSV($this->input)}");
        //$this->notify("Your input:", $this->input);
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void {
        // $schedule->command(static::class)->everyMinute();
    }

}
