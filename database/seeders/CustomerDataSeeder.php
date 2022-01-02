<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerData;

class CustomerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CustomerData::create([
            'cus_id' => 'CS001',
            'email' => 'doejohn@gmail.com',
            'mobile' => '1234567890',
            'cus_full_name'=>'Shan Perera',  
            'gender' => 'male',
            'address'=>'colombo', 
            'nic'=>'454545354', 
        ]
    );
        
    }
}
