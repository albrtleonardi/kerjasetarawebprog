<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

class CompanySeeder extends Seeder
{

    public function run(): void
    {
        $file = base_path('database/seeders/companydata.csv');
        $companies = array_map('str_getcsv', file($file));

        $now = Carbon::now();

        foreach (array_slice($companies, 1) as $company) {
            DB::table('companies')->insert([
                'CompanyID' => (int) $company[0],  
                'CompanyName' => $company[1],
                'Address' => $company[2],
                'Industry' => $company[3],
                'EmployeeCount' => (int) $company[4],
                'WorkTime' => $company[5],
                'DressCode' => $company[6],
                'CompanyDescription' => $company[7],
                'CompanyLink' => $company[8],
                'CompanyCity' => $company[9],
                'CompanyImage' => $company[10] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
