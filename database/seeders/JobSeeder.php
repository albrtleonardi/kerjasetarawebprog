<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

class JobSeeder extends Seeder
{

    public function run(): void
    {
        $file = base_path('database/seeders/jobdata.csv');
        $jobs = array_map('str_getcsv', file($file));

        $now = Carbon::now();

        foreach (array_slice($jobs, 1) as $job) {
            DB::table('job')->insert([
                'JobID' => (int) $job[0],
                'CompanyID' => (int) $job[1],
                'Role' => $job[2],
                'JobType' => $job[3],
                'RemoteOrOnsite' => $job[4],
                'CareerLevel' => $job[5],
                'JobDescription' => $job[6],
                'SuitableFor' => $job[7],
                'Requirements' => $job[8],
                'RequiredSkills' => $job[9],
                'SalaryMin' => (int) str_replace(',', '', $job[10]),
                'SalaryMax' => (int) str_replace(',', '', $job[11]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
        }
    }
}
