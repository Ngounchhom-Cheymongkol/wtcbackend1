<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class company_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('companies')->insert([  
            'company_name' => 'CG co.ltd',
            'head_office_location' => 'Phnom penh Cambodia',
            'company_description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'email'=>'CG.group@gmail.com',
            'phonenumber'=>'023756665'
        ]);
        DB::table('companies')->insert([  
            'company_name' => 'Safe Trip',
            'head_office_location' => 'Phnom penh Cambodia',
            'company_description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'email'=>'ST.group@gmail.com',
            'phonenumber'=>'023756665'
        ]);
        DB::table('companies')->insert([  
            'company_name' => 'Hooli co.ltd',
            'head_office_location' => 'Phnom penh Cambodia',
            'company_description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'email'=>'ST.group@gmail.com',
            'phonenumber'=>'023756665'
        ]);
        DB::table('companies')->insert([  
            'company_name' => 'Acme Corp',
            'head_office_location' => 'Phnom penh Cambodia',
            'company_description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'email'=>'AcmeCorp.group@gmail.com',
            'phonenumber'=>'023756665'
        ]);
        DB::table('companies')->insert([  
            'company_name' => 'KH Tranformation',
            'head_office_location' => 'Phnom penh Cambodia',
            'company_description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'email'=>'KHTranform.group@gmail.com',
            'phonenumber'=>'023756665'
        ]);
        DB::table('companies')->insert([  
            'company_name' => 'Trip Service',
            'head_office_location' => 'Phnom penh Cambodia',
            'company_description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'email'=>'TripService.group@gmail.com',
            'phonenumber'=>'023756665'
        ]);
        
    }
}
