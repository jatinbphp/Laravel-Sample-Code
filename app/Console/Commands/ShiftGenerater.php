<?php

namespace App\Console\Commands;

use App\ModelProgram;
use App\TourHour;
use Illuminate\Console\Command;

class ShiftGenerater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shift:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shift Generater to generate blank shift';

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
     * @return mixed
     */
    public function handle()
    {
        shiftInsert();
        $rooms     = getAllRoom();
        $all_shift = getShift();

        for ($i = 20; $i <= 31; $i++) {
            $date = date("$i-m-Y");

            foreach ($rooms as $roomId => $room) {
                foreach ($all_shift as $shiftId => $shift) {
                    if (!ModelProgram::where("date", $date)->where("room_id", $roomId)->where("tour", $shiftId)->exists()) {

                        $check             = new ModelProgram;
                        $check->studio_id  = 1;
                        $check->tour       = $shiftId;
                        $check->room_id    = $roomId;
                        $check->date       = date("Y-m-d", strtotime($date));
                        $check->created_at = date("Y-m-d H:i:s");
                        $check->updated_at = date("Y-m-d H:i:s");
                        $check->save();

                        $checkTime                   = new TourHour;
                        $checkTime->studio_id        = 1;
                        $checkTime->program_id       = $check->id;
                        $checkTime->shift_start_time = $check->shift->start_time;
                        $checkTime->shift_end_time   = $check->shift->end_time;
                        $checkTime->created_at       = date("Y-m-d H:i:s");
                        $checkTime->updated_at       = date("Y-m-d H:i:s");
                        $checkTime->save();

                    }
                }
            }
        }
    }
}
