<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['id' => 1, 'location' => 'Bayān','area_code'=>'Hawalli Governorate'],
            ['id' => 2, 'location' => 'Bi\'da','area_code'=>'Hawalli Governorate'],
            ['id' => 3, 'location' => 'Hawally','area_code'=>'Hawalli Governorate'],
            ['id' => 4, 'location' => 'Hittin','area_code'=>'Hawalli Governorate'],
            ['id' => 5, 'location' => 'Jabriya','area_code'=>'Hawalli Governorate'],
            ['id' => 6, 'location' => 'Maidan Hawalli','area_code'=>'Hawalli Governorate'],
            ['id' => 7, 'location' => 'Mishrif','area_code'=>'Hawalli Governorate'],
            ['id' => 8, 'location' => 'Mubarak Al-Jabir','area_code'=>'Hawalli Governorate'],
            ['id' => 9, 'location' => 'Nigra','area_code'=>'Hawalli Governorate'],
            ['id' => 10, 'location' => 'Rumaithiya','area_code'=>'Hawalli Governorate'],
            ['id' => 11, 'location' => 'Salam','area_code'=>'Hawalli Governorate'],
            ['id' => 12, 'location' => 'Salmiya','area_code'=>'Hawalli Governorate'],
            ['id' => 13, 'location' => 'Salwa','area_code'=>'Hawalli Governorate'],  
            ['id' => 14, 'location' => 'Sha\'ab','area_code'=>'Hawalli Governorate'],
            ['id' => 15, 'location' => 'Shuhada','area_code'=>'Hawalli Governorate'],
            ['id' => 16, 'location' => 'Siddiq','area_code'=>'Hawalli Governorate'],
            ['id' => 17, 'location' => 'South Surra','area_code'=>'Hawalli Governorate'],
            ['id' => 18, 'location' => 'Zahra','area_code'=>'Hawalli Governorate'],
            ['id' => 19, 'location' => 'Anjafa','area_code'=>'Hawalli Governorate'],
        
            ['id' => 20, 'location' => 'Kuwait City','area_code'=>'Capital Governorate'],
            ['id' => 21, 'location' => 'Abdullah as-Salim','area_code'=>'Capital  Governorate'],
            ['id' => 22, 'location' => 'Adiliya','area_code'=>'Capital  Governorate'],
            ['id' => 23, 'location' => 'Any','area_code'=>'Capital  Governorate'],
            ['id' => 24, 'location' => 'Bneid il-Gār','area_code'=>'Capital  Governorate'],
            ['id' => 25, 'location' => 'Da\'iya','area_code'=>'Capital  Governorate'],
            ['id' => 26, 'location' => 'Dasma','area_code'=>'Capital  Governorate'],
            ['id' => 27, 'location' => 'Dasmān','area_code'=>'Capital  Governorate'],
            ['id' => 28, 'location' => 'Doha','area_code'=>'Capital  Governorate'],
            ['id' => 29, 'location' => 'Doha Port','area_code'=>'Capital  Governorate'],
            ['id' => 30, 'location' => 'Faiha\'','area_code'=>'Capital  Governorate'],
            ['id' => 31, 'location' => 'Failaka','area_code'=>'Capital  Governorate'],
            ['id' => 32, 'location' => 'Granada','area_code'=>'Capital  Governorate'],
            ['id' => 33, 'location' => 'Jaber Al-Ahmad City','area_code'=>'Capital  Governorate'],
            ['id' => 34, 'location' => 'Jibla','area_code'=>'Capital  Governorate'],
            ['id' => 35, 'location' => 'Kaifan','area_code'=>'Capital  Governorate'],
            ['id' => 36, 'location' => 'Khaldiya','area_code'=>'Capital  Governorate'],
            ['id' => 37, 'location' => 'Mansūriya','area_code'=>'Capital  Governorate'],
            ['id' => 38, 'location' => 'Mirgab','area_code'=>'Capital  Governorate'],
            ['id' => 39, 'location' => 'Nahdha','area_code'=>'Capital  Governorate'],
            ['id' => 40, 'location' => 'North West Sulaibikhat','area_code'=>'Capital  Governorate'],
            ['id' => 41, 'location' => 'Nuzha','area_code'=>'Capital  Governorate'],
            ['id' => 42, 'location' => 'Qadsiya','area_code'=>'Capital  Governorate'],
            ['id' => 43, 'location' => 'Qurtuba','area_code'=>'Capital  Governorate'],
            ['id' => 44, 'location' => 'Rawda','area_code'=>'Capital  Governorate'],
            ['id' => 45, 'location' => 'Salhiya','area_code'=>'Capital  Governorate'],
            ['id' => 46, 'location' => 'Sawābir','area_code'=>'Capital  Governorate'],
            ['id' => 47, 'location' => 'Shamiya','area_code'=>'Capital  Governorate'],
            ['id' => 48, 'location' => 'Sharq','area_code'=>'Capital  Governorate'],
            ['id' => 49, 'location' => 'Shuwaikh','area_code'=>'Capital  Governorate'],
            ['id' => 50, 'location' => 'Shuwaikh Industrial Area','area_code'=>'Capital  Governorate'],
            ['id' => 51, 'location' => 'Shuwaikh Port','area_code'=>'Capital  Governorate'],
            ['id' => 52, 'location' => 'Sulaibikhat','area_code'=>'Capital  Governorate'],
            ['id' => 53, 'location' => 'Surra','area_code'=>'Capital  Governorate'],
            ['id' => 54, 'location' => 'Umm an Namil Island','area_code'=>'Capital  Governorate'],
            ['id' => 55, 'location' => 'Yarmūk','area_code'=>'Capital  Governorate'],

            ['id' => 56, 'location' => 'Abu Futaira','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 57, 'location' => 'Adān','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 58, 'location' => 'Al Qurain','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 59, 'location' => 'Al-Qusour','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 60, 'location' => 'Fintās','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 61, 'location' => 'Funaitīs','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 62, 'location' => 'Misīla','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 63, 'location' => 'Mubarak Al-Kabeer','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 64, 'location' => 'Sabah Al-Salem','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 65, 'location' => 'Sabhān','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 66, 'location' => 'South Wista','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 67, 'location' => 'Wista','area_code'=>'Mubarak Al-Kabeer Governorate'],
            ['id' => 68, 'location' => 'Abu Al Hasaniya','area_code'=>'Ahmadi Governorate'],

            ['id' => 69, 'location' => 'Abu Halifa','area_code'=>'Ahmadi Governorate'],
            ['id' => 70, 'location' => 'Abdullah Port','area_code'=>'Ahmadi Governorate'],
            ['id' => 71, 'location' => 'Ahmadi','area_code'=>'Ahmadi Governorate'],
            ['id' => 72, 'location' => 'Ali As-Salim','area_code'=>'Ahmadi Governorate'],
            ['id' => 73, 'location' => 'Aqila','area_code'=>'Ahmadi Governorate'],
            ['id' => 74, 'location' => 'Bar Al Ahmadi','area_code'=>'Ahmadi Governorate'],
            ['id' => 75, 'location' => 'Bneidar','area_code'=>'Ahmadi Governorate'],
            ['id' => 76, 'location' => 'Dhaher','area_code'=>'Ahmadi Governorate'],
            ['id' => 77, 'location' => 'Fahaheel','area_code'=>'Ahmadi Governorate'],
            ['id' => 78, 'location' => 'Fahad Al-Ahmad','area_code'=>'Ahmadi Governorate'],
            ['id' => 79, 'location' => 'Hadiya','area_code'=>'Ahmadi Governorate'],
            ['id' => 80, 'location' => 'Jaber Al-Ali','area_code'=>'Ahmadi Governorate'],
            ['id' => 81, 'location' => 'Jawaher Al Wafra','area_code'=>'Ahmadi Governorate'],
            ['id' => 82, 'location' => 'Jilei\a','area_code'=>'Ahmadi Governorate'],
            ['id' => 83, 'location' => 'Khairan','area_code'=>'Ahmadi Governorate'],
            ['id' => 84, 'location' => 'Mahbula','area_code'=>'Ahmadi Governorate'],
            ['id' => 85, 'location' => 'Miqwa\'','area_code'=>'Ahmadi Governorate'],
            ['id' => 86, 'location' => 'New Khairan City','area_code'=>'Ahmadi Governorate'],
            ['id' => 87, 'location' => 'New Wafra','area_code'=>'Ahmadi Governorate'],
            ['id' => 88, 'location' => 'Nuwaiseeb','area_code'=>'Ahmadi Governorate'],
            ['id' => 89, 'location' => 'Riqqa','area_code'=>'Ahmadi Governorate'],
            ['id' => 90, 'location' => 'Sabah Al-Ahmad City','area_code'=>'Ahmadi Governorate'],
            ['id' => 91, 'location' => 'Sabah Al-Ahmad Nautical City','area_code'=>'Ahmadi Governorate'],
            ['id' => 92, 'location' => 'Sabahiya','area_code'=>'Ahmadi Governorate'],
            ['id' => 93, 'location' => 'Shu\'aiba (North & South)','area_code'=>'Ahmadi Governorate'],
            ['id' => 94, 'location' => 'South Sabahiya','area_code'=>'Ahmadi Governorate'],
            ['id' => 95, 'location' => 'Wafra','area_code'=>'Ahmadi Governorate'],
            ['id' => 96, 'location' => 'Zoor','area_code'=>'Ahmadi Governorate'],
            ['id' => 97, 'location' => 'Zuhar','area_code'=>'Ahmadi Governorate'],

            ['id' => 98, 'location' => 'Abdullah Al-Mubarak','area_code'=>'Farwaniya Governorate'],
            ['id' => 99, 'location' => 'Airport Distric','area_code'=>'Farwaniya Governorate'],
            ['id' => 100, 'location' => 'Andalous','area_code'=>'Farwaniya Governorate'],
            ['id' => 101, 'location' => 'Ardiya','area_code'=>'Farwaniya Governorate'],
            ['id' => 102, 'location' => 'Ardiya Herafiya','area_code'=>'Farwaniya Governorate'],
            ['id' => 103, 'location' => 'Ardiya Industrial Area','area_code'=>'Farwaniya Governorate'],
            ['id' => 104, 'location' => 'Ashbelya','area_code'=>'Farwaniya Governorate'],
            ['id' => 105, 'location' => 'Dhajeej','area_code'=>'Farwaniya Governorate'],
            ['id' => 106, 'location' => 'Farwaniya','area_code'=>'Farwaniya Governorate'],
            ['id' => 107, 'location' => 'Fordous','area_code'=>'Farwaniya Governorate'],
            ['id' => 108, 'location' => 'Jleeb Al-Shuyoukh','area_code'=>'Farwaniya Governorate'],
            ['id' => 109, 'location' => 'Khaitan','area_code'=>'Farwaniya Governorate'],
            ['id' => 110, 'location' => 'Omariya','area_code'=>'Farwaniya Governorate'],
            ['id' => 111, 'location' => 'Rabiya','area_code'=>'Farwaniya Governorate'],
            ['id' => 112, 'location' => 'Rai','area_code'=>'Farwaniya Governorate'],
            ['id' => 113, 'location' => 'Riggae','area_code'=>'Farwaniya Governorate'],
            ['id' => 114, 'location' => 'Rihab','area_code'=>'Farwaniya Governorate'],
            ['id' => 115, 'location' => 'Sabah Al-Nasser','area_code'=>'Farwaniya Governorate'],
            ['id' => 116, 'location' => 'Sabaq Al Hajan','area_code'=>'Farwaniya Governorate'],

            ['id' => 117, 'location' => 'Abdali','area_code'=>'Jahra Governorate'],
            ['id' => 118, 'location' => 'Al Nahda / East Sulaibikhat','area_code'=>'Jahra Governorate'],
            ['id' => 119, 'location' => 'Amghara','area_code'=>'Jahra Governorate'],
            ['id' => 120, 'location' => 'Bar Jahra','area_code'=>'Jahra Governorate'],
            ['id' => 121, 'location' => 'Jahra','area_code'=>'Jahra Governorate'],
            ['id' => 122, 'location' => 'Jahra Industrial Area','area_code'=>'Jahra Governorate'],
            ['id' => 123, 'location' => 'Kabad','area_code'=>'Jahra Governorate'],
            ['id' => 124, 'location' => 'Naeem','area_code'=>'Jahra Governorate'],
            ['id' => 125, 'location' => 'Nasseem','area_code'=>'Jahra Governorate'],
            ['id' => 126, 'location' => 'Oyoun','area_code'=>'Jahra Governorate'],
            ['id' => 127, 'location' => 'Qasr','area_code'=>'Jahra Governorate'],
            ['id' => 128, 'location' => 'Saad Al Abdullah City','area_code'=>'Jahra Governorate'],
            ['id' => 129, 'location' => 'Salmi','area_code'=>'Jahra Governorate'],
            ['id' => 130, 'location' => 'Sikrab','area_code'=>'Jahra Governorate'],
            ['id' => 131, 'location' => 'South Doha / Qairawān','area_code'=>'Jahra Governorate'],
            ['id' => 132, 'location' => 'Sulaibiya','area_code'=>'Jahra Governorate'],
            ['id' => 133, 'location' => 'Sulaibiya Agricultural Area','area_code'=>'Jahra Governorate'],
            ['id' => 134, 'location' => 'Taima','area_code'=>'Jahra Governorate'],
            ['id' => 135, 'location' => 'Waha','area_code'=>'Jahra Governorate'],

        ];

        foreach($locations as $location){
            Location::create($location);
        }
    }
}