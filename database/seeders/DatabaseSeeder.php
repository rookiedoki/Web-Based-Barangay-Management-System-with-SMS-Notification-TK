<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\settings;

use App\Models\FreqAsked;
use App\Models\Announcements;
use App\Models\FreqAskedTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        settings::create([
            'barangay_name' => 'Barangay Name',
            'barangay_logo' =>'images/logo-san-ramon.png',
            'barangay_logo2' =>'images/logo-san-ramon.png',
            'brgy_location' =>'San Ramon Baao, Camarines Sur',
            'brgy_email' => 'Sanramon@gmail.com',
            'description' => 'Barangay Name',
            'vission' => 'Envisions a Progressive, Healthy, Peaceful community, empowered constituents and collectively participating in decision making gearing towards good governance.',
            'mission' => 'To formulate and enforce Transparent Plans, Programs and Regulations for the protection of the interest of the community with regards to Environment, Education, Infrastructure, Health, Social Services, Moral, Financial, Peace and Order.',
            'goal' => 'Our major goal is to providethem social, economic, environmental and infrastructure assistance under the spirit of transperacy and good governance.',
            'system_logo' => 'loginlogo.png',
            'system_title' => 'WEB BASED RESIDENTIAL PROFILING AND RECORD KEEPING SYSTEM',
            'about_section1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor in reprehenderit in voluptate velit',
            'about_section2' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ]);

        User::create([
                'email' => 'admin@gmail.com',
                'password' =>Hash::make('admin123'),
                'userType' => '0',

        ]);

        FreqAsked::create([
            'question' => 'What is Barangay Certificate of Residency',
            'answer' => 'The Certificate of Residency is a document certifying your stay in a barangay. You can apply and obtain a barangay certification from a barangay where you have been living for six (6) months or more.',
            ]);

            FreqAskedTitle::create([
                'frq_asked_title' => 'HERE ARE THE FREQUENTLY ASKED QUESTIONS ABOUT THE DUTIES OF A BARANGAY',
                ]);

        Announcements::create([
            'title' => 'BARANGAY ASSEMBLY 2O22',
            'description' =>'Description Here',
            'content' => '<h1 style="text-align: center;"><span style="font-family: &quot;Arial Black&quot;;"><font color="#0000ff">Updated Schedule</font></span></h1><h4 style="text-align: center; "><span style="font-family: Impact;">November 26, 2022</span></h4><h3 style="text-align: center; "><span style="font-family: &quot;Arial Black&quot;; font-weight: normal;"><font color="#000000">5:00pm Mass Offering @San Ramon Chapel 7:00pm Procession within the Barangay</font></span></h3><h4 style="text-align: center; "><span style="font-family: Impact;">November 27, 2022</span></h4><h3 style="text-align: center; "><font color="#000000"><span style="font-family: &quot;Arial Black&quot;; font-weight: normal;">7:00pm Zumbang Gabe @Barangay Covered Court</span></font></h3><h4 style="text-align: center; "><font color="#000000" face="Arial Black"><span style="font-family: Impact;">November 28, 2022</span></font></h4><h3 style="text-align: center; "><font color="#000000" face="Arial Black"><span style="font-weight: 400;">6:00am Color Fun Run</span></font></h3>',
            'image'=>'images/imageee.png',

    ]);


    }
}
