<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'nama' => 'To Do',
                'keterangan' => 'Activity',
            ],
            [
                'nama' => 'In Progress',
                'keterangan' => 'Activity',
            ],
            [
                'nama' => 'Complete',
                'keterangan' => 'Activity',
            ],
        ];
        foreach ($statuses as $key => $status) {
            $insert = new Status();
            $insert->nama = $status['nama'];
            $insert->keterangan = $status['keterangan'];
            $insert->save();
        }
    }
}
