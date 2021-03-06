<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();
        
        $countries = $this->getCountries();

        foreach ($countries as $city => $country) {
            $country = Country::firstOrCreate(['name' => trim($country)]);

            City::firstOrCreate([
                'name' => trim($city),
                'country_id' => $country->id
            ]);
        }
    }

    private function getCountries()
    {
        return [
            'Kabul' => 'Afghanistan',
            'Tirana' => 'Albania',
            'Algiers' => 'Algeria',
            'Andorra la Vella' => 'Andorra',
            'Luanda' => 'Angola',
            'Saint John' => 'Antigua and Barbuda',
            'Buenos Aires' => 'Argentina',
            'Yerevan' => 'Armenia',
            'Canberra' => 'Australia',
            'Vienna' => 'Austria',
            'Baku' => 'Azerbaijan',
            'Nassau' => 'Bahamas',
            'Manama' => 'Bahrain',
            'Dhaka' => 'Bangladesh',
            'Rajshahi' => 'Bangladesh',
            'Rangpur' => 'Bangladesh',
            'Sylhet' => 'Bangladesh',
            'Chittagong' => 'Bangladesh',
            'Barisal' => 'Bangladesh',
            'Jessore' => 'Bangladesh',
            'Mymenshingh' => 'Bangladesh',
            'Bridgetown' => 'Barbados',
            'Minsk' => 'Belarus',
            'Brussels' => 'Belgium',
            'Belmopan' => 'Belize',
            'Porto-Novo' => 'Benin',
            'Thimphu' => 'Bhutan',
            'Sucre' => 'Bolivia',
            'La Paz' => 'Bolivia',
            'Sarajevo' => 'Bosnia and Herzegovina',
            'Gaborone' => 'Botswana',
            'Brasilia' => 'Brazil',
            'Bandar Seri Begawan' => 'Brunei',
            'Sofia' => 'Bulgaria',
            'Ouagadougou' => 'Burkina Faso',
            'Gitega' => 'Burundi',
            'Praia' => 'Cabo Verde',
            'Phnom Penh' => 'Cambodia',
            'Yaounde' => 'Cameroon',
            'Ottawa' => 'Canada',
            'Bangui' => 'CentralAfrican Republic',
            'N Djamena' => 'Chad',
            'Santiago' => 'Chile',
            'Beijing' => 'China',
            'Bogotá' => 'Colombia',
            'Moroni' => 'Comoros',
            'Kinshasa' => 'Congo',
            'San Jose' => 'Costa Rica',
            'Zagreb' => 'Croatia',
            'Havana' => 'Cuba',
            'Nicosia' => 'Cyprus',
            'Prague' => 'Czechia',
            'Copenhagen' => 'Denmark',
            'Djibouti' => 'Djibouti',
            'Roseau' => 'Dominica',
            'Quito' => 'Ecuador',
            'Cairo' => 'Egypt',
            'Malabo' => 'Equatorial Guinea',
            'Asmara' => 'Eritrea',
            'Tallinn' => 'Estonia',
            'Addis Ababa' => 'Ethiopia',
            'Suva' => 'Fiji',
            'Helsinki' => 'Finland',
            'Paris' => 'France',
            'Libreville' => 'Gabon',
            'Banjul' => 'Gambia',
            'Tbilisi' => 'Georgia',
            'Berlin' => 'Germany',
            'Accra' => 'Ghana',
            'Athens' => 'Greece',
            'Saint George' => 'Grenada',
            'Guatemala City' => 'Guatemala',
            'Conakry' => 'Guinea',
            'Bissau' => 'Guinea-Bissau',
            'Georgetown' => 'Guyana',
            'Port-au-Prince' => 'Haiti',
            'Tegucigalpa' => 'Honduras',
            'Budapest' => 'Hungary',
            'Reykjavik' => 'Iceland',
            'New Delhi' => 'India',
            'Kolkata' => 'India',
            'Mumbai' => 'India',
            'Bengaluru' => 'India',
            'Hyderabad' => 'India',
            'Pune' => 'India',
            'Jaipur' => 'India',
            'Kanpur' => 'India',
            'Chennai' => 'India',
            'Jammu kashmir' => 'India',
            'Jakarta' => 'Indonesia',
            'Tehran' => 'Iran',
            'Baghdad' => 'Iraq',
            'Dublin' => 'Ireland',
            'Rome' => 'Italy',
            'Kingston' => 'Jamaica',
            'Tokyo' => 'Japan',
            'Amman' => 'Jordan',
            'Nur-Sultan' => 'Kazakhstan',
            'Nairobi' => 'Kenya',
            'Tarawa' => 'Kiribati',
            'Pristina' => 'Kosovo',
            'Kuwait City' => 'Kuwait',
            'Bishkek' => 'Kyrgyzstan',
            'Vientiane' => 'Laos',
            'Riga' => 'Latvia',
            'Beirut' => 'Lebanon',
            'Maseru' => 'Lesotho',
            'Monrovia' => 'Liberia',
            'Tripoli' => 'Libya',
            'Vaduz' => 'Liechtenstein',
            'Vilnius' => 'Lithuania',
            'Luxembourg (city)' => 'Luxembourg',
            'Antananarivo' => 'Madagascar',
            'Lilongwe' => 'Malawi',
            'Kuala Lumpur' => 'Malaysia',
            'Male' => 'Maldives',
            'Bamako' => 'Mali',
            'Valletta' => 'Malta',
            'Majuro' => 'Marshall Islands',
            'Nouakchott' => 'Mauritania',
            'Port Louis' => 'Mauritius',
            'Mexico City' => 'Mexico',
            'Palikir' => 'Micronesia',
            'Chisinau' => 'Moldova',
            'Monaco' => 'Monaco',
            'Ulaanbaatar' => 'Mongolia',
            'Podgorica' => 'Montenegro',
            'Rabat' => 'Morocco',
            'Maputo' => 'Mozambique',
            'Myanmar' =>'Naypyidaw',
            'Windhoek' => 'Namibia',
            'Yaren District' => 'Nauru',
            'Kathmandu' => 'Nepal',
            'Amsterdam' => 'Netherlands',
            'Wellington' => 'New Zealand',
            'Managua' => 'Nicaragua',
            'Niamey' => 'Niger',
            'Abuja' => 'Nigeria',
            'Pyongyang' => 'North Korea',
            'Skopje' => 'North Macedonia',
            'Oslo' => 'Norway',
            'Muscat' => 'Oman',
            'Islamabad' => 'Pakistan',
            'Ngerulmud' => 'Palau',
            'Jerusalem' => 'Palestine',
            'Panama City' => 'Panama',
            'New Guinea Port Moresby' => 'Papua',
            'Asunción' => 'Paraguay',
            'Lima' => 'Peru',
            'Manila' => 'Philippines',
            'Warsaw' => 'Poland',
            'Lisbon' => 'Portugal',
            'Doha' => 'Qatar',
            'Bucharest' => 'Romania',
            'Moscow' => 'Russia',
            'Kigali' => 'Rwanda',
            'Basseterre' => 'Saint Kitts and Nevis',
            'Castries' => 'Saint Lucia',
            'Vincent and the Grenadines Kingstown' => 'Saint',
            'Apia' => 'Samoa',
            'San Marino' => 'San Marino',
            'Riyadh' => 'Saudi Arabia',
            'Dakar' => 'Senegal',
            'Belgrade' => 'Serbia',
            'Victoria' => 'Seychelles',
            ' Freetown' => 'Sierra Leone',
            'Singapore' => 'Singapore',
            'Bratislava' => 'Slovakia',
            'Ljubljana' => 'Slovenia',
            ' Honiara' => 'Solomon Islands',
            'Mogadishu' => 'Somalia',
            'Pretoria' => 'South Africa',
            'Cape Town' => 'South Africa',
            'Bloemfontein'  => 'South Africa',
            'Seoul' => 'South Korea',
            'Juba' => 'South Sudan',
            'Madrid' => 'Spain',
            'Sri Jayawardenepura Kotte' => 'Sri Lanka',
            'Khartoum' => 'Sudan',
            'Paramaribo' => 'Suriname',
            'Stockholm' => 'Sweden',
            'Bern' => 'Switzerland',
            'Damascus' => 'Syria',
            'Taipei' => 'Taiwan',
            'Dushanbe' => 'Tajikistan',
            'Dodoma' => 'Tanzania',
            'Bangkok' => 'Thailand',
            'Dili' => 'Timor-Leste',
            'Lomé' => 'Togo',
            'Nukuʻalofa' => 'Tonga',
            'Port of Spain' => 'Trinidad and Tobago',
            'Tunis' => 'Tunisia',
            'Ankara' => 'Turkey',
            'Ashgabat' => 'Turkmenistan',
            'Funafuti' => 'Tuvalu',
            'Kampala' => 'Uganda',
            'Kyiv' => 'Ukraine',
            'Abu Dhabi' => 'United Arab Emirates',
            'London' => 'United Kingdom',
            'Washington, D.C.' => 'United States of America',
            'Montevideo' => 'Uruguay',
            'Tashkent' => 'Uzbekistan',
            'Port Vila' => 'Vanuatu',
            'Vatican City' => 'Vatican City',
            'Caracas' => 'Venezuela',
            'Hanoi' => 'Vietnam',
            'Sanaa' => 'Yemen',
            'Lusaka' => 'zambia',
            'Harare' => 'Zimbabwe',
        ];
    }
}
