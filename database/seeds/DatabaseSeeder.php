<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Enterprise;
use App\Enterprise_User;
use App\Week;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name'=>'Enrique Moya',
            'email'=>'enrique@dummy.com',
            'password'=>'prueba123',
            'role'=>true
        ]);
        User::create([
            'name'=>'Leonardo Durazo',
            'email'=>'leo@dummy.com',
            'password'=>'prueba123',
            'role'=>true
        ]);
        User::create([
            'name'=>'Nan',
            'email'=>'nan@dummy.com',
            'password'=>'prueba123',
            'role'=>true
        ]);
        User::create([
            'name'=>'Francisco Esquer',
            'email'=>'fesquer@oppesa.net',
            'password'=>'fesquer',
        ]);
        User::create([
            'name'=>'Daniel Ortiz',
            'email'=>'dortiz@oppesa.net',
            'password'=>'dortiz',
        ]);
        User::create([
            'name'=>'Jesus Noriega',
            'email'=>'jnoriega@oppesa.net',
            'password'=>'jnoriega',
        ]);
        User::create([
            'name'=>'Alfredo Leyva',
            'email'=>'aleyva@oppesa.net',
            'password'=>'aleyva',
        ]);
        User::create([
            'name'=>'Ruben Cortina',
            'email'=>'ruben.cortina@tfwarren.com',
            'password'=>'rcortina',
        ]);
        User::create([
            'name'=>'Gustavo Mazon',
            'email'=>'mazon.gustavo@gmail.com',
            'password'=>'gmazon',
            'role'=>true
        ]);
        User::create([
            'name'=>'Edgardo Cruz',
            'email'=>'edgardo.cruz@groen.com.mx',
            'password'=>'ecruz',
        ]);
        User::create([
            'name'=>'Heberto Dessens',
            'email'=>'Heberto@gila.com.mx',
            'password'=>'hdessens',
        ]);
        User::create([
            'name'=>'Iker Lambarri',
            'email'=>'ikerlambarri@gmail.com',
            'password'=>'ilambarri',
        ]);
        User::create([
            'name'=>'Jesus Oscar Peraza',
            'email'=>'joperaza@prodigy.net.mx',
            'password'=>'jperaza',
        ]);
        User::create([
            'name'=>'Daniel Suarez',
            'email'=>'dsuarez@dummy.com',
            'password'=>'dsuarez',
        ]);

        //  **EMPRESAS**


        Enterprise::create([
            'name'=> 'BANCA CORPORATIVA',
            'color'=>'47CC4D',
            'extend'=>null,
            'id'=>1
        ]);
        Enterprise::create([
            'name'=> 'OPESSA',
            'color'=>'A0D4FF',
            'extend'=>null,
            'id'=>2
        ]);
        Enterprise::create([
            'name'=> 'AGRONEGOCIOS',
            'color'=>'FFAF91',
            'extend'=>null,
            'id'=>3
        ]);
        Enterprise::create([
            'name'=> 'COTEC',
            'color'=>'FFAF91',
            'extend'=>null,
            'id'=>4
        ]);
        Enterprise::create([
            'name'=> 'INMAE',
            'color'=>'FFAF91',
            'extend'=>null,
            'id'=>5
        ]);
        Enterprise::create([
            'name'=> 'GRUPO CIMARRON',
            'color'=>'FFAF91',
            'extend'=>null,
            'id'=>6
        ]);
        Enterprise::create([
            'name'=> 'GOLDEN CALF',
            'color'=>'FF8713',
            'extend'=>null,
            'id'=>7
        ]);
        Enterprise::create([
            'name'=> 'TANQUERA',
            'color'=>'FF8713',
            'extend'=>null,
            'id'=>8
        ]);
        Enterprise::create([
            'name'=> 'CONCESIONARIA',
            'color'=>'FF8713',
            'extend'=>null,
            'id'=>9
        ]);
        Enterprise::create([
            'name'=> 'TERMINAL MANZANILLO',
            'color'=>'FF8713',
            'extend'=>null,
            'id'=>10
        ]);
        Enterprise::create([
            'name'=> 'PUMA',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>11
        ]);
        Enterprise::create([
            'name'=> 'PROVIDA',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>12
        ]);
        Enterprise::create([
            'name'=> 'GROEN',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>13
        ]);
        Enterprise::create([
            'name'=> 'GILA',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>14
        ]);
        Enterprise::create([
            'name'=> 'MEXPORT',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>15
        ]);
        Enterprise::create([
            'name'=> 'SOFIMAS',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>16
        ]);
        Enterprise::create([
            'name'=> 'NASE',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>17
        ]);
        Enterprise::create([
            'name'=> 'MAZON KYRIAKIS',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>18
        ]);
        Enterprise::create([
            'name'=> 'LAS PALOMAS',
            'color'=>'FF1005',
            'extend'=>null,
            'id'=>19
        ]);
        Enterprise::create([
            'name'=> 'VENTURA\'S',
            'color'=>'8800FF',
            'extend'=>null,
            'id'=>20
        ]);
        Enterprise::create([
            'name'=> 'COSTA MAYA\'S',
            'color'=>'8800FF',
            'extend'=>null,
            'id'=>21
        ]);
        Enterprise::create([
            'name'=> 'GRUPO MAZON',
            'color'=>'7CCC83',
            'extend'=>null,
            'id'=>22
        ]);
        Enterprise::create([
            'name'=> 'GERENCIA INMOBILARIA',
            'color'=>'FFD527',
            'extend'=>null,
            'id'=>23
        ]);
        Enterprise::create([
            'name'=> 'COMERCIALIZADORA MINERA',
            'color'=>'CCB600',
            'extend'=>null,
            'id'=>24
        ]);
        Enterprise::create([
            'name'=> 'FAMILY OFFICE',
            'color'=>'FFF6D0',
            'extend'=>null,
            'id'=>25
        ]);
        Enterprise::create([
            'name'=> 'PROMOCION',
            'color'=>'47CC4D',
            'extend'=>null,
            'id'=>26
        ]);
        Enterprise::create([
            'name'=> 'NUEVOS PROYECTOS',
            'color'=>'82A5FF',
            'extend'=>null,
            'id'=>27
        ]);

        Enterprise::create([
            'name'=> 'ENTRADAS, SALIDAS, NOTICIAS',
            'color'=>null,
            'extend'=>1,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'ESTATUS PORTAFOLIO',
            'color'=>null,
            'extend'=>1,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'COMITÉ DE CREDITO',
            'color'=>null,
            'extend'=>1,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'SEMAFORO DE ENDEUDAMIENTO',
            'color'=>null,
            'extend'=>1,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'CORPORATIVO',
            'color'=>null,
            'extend'=>2,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'REQUERIMIENTO DE CAPITAL',
            'color'=>null,
            'extend'=>2,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'LA CASITA GANADO',
            'color'=>null,
            'extend'=>3,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'LA CASITA PATRIMONIAL',
            'color'=>null,
            'extend'=>3,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'GENETICA',
            'color'=>null,
            'extend'=>3,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'CHAPARRAL CACERIA',
            'color'=>null,
            'extend'=>3,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'CHAPARRAL PATRIMONIAL',
            'color'=>null,
            'extend'=>3,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'ARCADIA',
            'color'=>null,
            'extend'=>5,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'ANDENES',
            'color'=>null,
            'extend'=>5,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'SUNMALL',
            'color'=>null,
            'extend'=>5,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'KINO PITIC',
            'color'=>null,
            'extend'=>5,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'JLL GPO MULATOS',
            'color'=>null,
            'extend'=>7,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'TARSCO',
            'color'=>null,
            'extend'=>8,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PETROLEOS MTY',
            'color'=>null,
            'extend'=>8,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'LIBR Y PUENTES',
            'color'=>null,
            'extend'=>9,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PUERTA NORTE',
            'color'=>null,
            'extend'=>12,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PUERTA OESTE',
            'color'=>null,
            'extend'=>12,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PROHOSA-NOG',
            'color'=>null,
            'extend'=>12,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PROHOSA-BC',
            'color'=>null,
            'extend'=>12,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'VENTURA HILLO',
            'color'=>null,
            'extend'=>12,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PISCSA',
            'color'=>null,
            'extend'=>18,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'CONDOR',
            'color'=>null,
            'extend'=>18,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'TURISMO',
            'color'=>null,
            'extend'=>19,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'DESARROLLO',
            'color'=>null,
            'extend'=>19,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'HERMOSILLO',
            'color'=>null,
            'extend'=>20,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'AGUASCALIENTES',
            'color'=>null,
            'extend'=>20,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'PLAYA DEL CARMEN',
            'color'=>null,
            'extend'=>20,
            'id'=>null
        ]);
        Enterprise::create([
            'name'=> 'SAN FRANCISQUITO',
            'color'=>null,
            'extend'=>23,
            'id'=>null
        ]);
        //Francisco Esquer
        Enterprise_User::create([
            'id_user'=>4,
            'id_enterprise'=>1,
        ]);
        Enterprise_User::create([
            'id_user'=>4,
            'id_enterprise'=>28,
        ]);
        Enterprise_User::create([
            'id_user'=>4,
            'id_enterprise'=>29,
        ]);
        Enterprise_User::create([
            'id_user'=>4,
            'id_enterprise'=>30,
        ]);
        Enterprise_User::create([
            'id_user'=>4,
            'id_enterprise'=>31,
        ]);
        //Daniel Ortiz
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>2,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>5,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>6,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>9,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>10,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>16,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>18,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>20,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>21,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>25,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>32,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>2,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>39,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>40,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>41,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>42,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>46,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>52,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>53,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>56,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>57,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>58,
        ]);
        Enterprise_User::create([
            'id_user'=>5,
            'id_enterprise'=>27,
        ]);
        //Jesus Noriega
        Enterprise_User::create([
            'id_user'=>6,
            'id_enterprise'=>4,
        ]);
        Enterprise_User::create([
            'id_user'=>6,
            'id_enterprise'=>7,
        ]);
        Enterprise_User::create([
            'id_user'=>6,
            'id_enterprise'=>11,
        ]);
        Enterprise_User::create([
            'id_user'=>6,
            'id_enterprise'=>43,
        ]);
        Enterprise_User::create([
            'id_user'=>6,
            'id_enterprise'=>27,
        ]);
        Enterprise_User::create([
            'id_user'=>6,
            'id_enterprise'=>33,
        ]);
        //Alfredo Leyva
        Enterprise_User::create([
            'id_user'=>7,
            'id_enterprise'=>3,
        ]);
        Enterprise_User::create([
            'id_user'=>7,
            'id_enterprise'=>34,
        ]);
        Enterprise_User::create([
            'id_user'=>7,
            'id_enterprise'=>35,
        ]);
        Enterprise_User::create([
            'id_user'=>7,
            'id_enterprise'=>36,
        ]);
        Enterprise_User::create([
            'id_user'=>7,
            'id_enterprise'=>37,
        ]);
        Enterprise_User::create([
            'id_user'=>7,
            'id_enterprise'=>38,
        ]);
        //Ruben Cortina
        Enterprise_User::create([
            'id_user'=>8,
            'id_enterprise'=>8,
        ]);
        Enterprise_User::create([
            'id_user'=>8,
            'id_enterprise'=>44,
        ]);
        //Gustavo Mazon
        Enterprise_User::create([
            'id_user'=>9,
            'id_enterprise'=>45,
        ]);
        Enterprise_User::create([
            'id_user'=>9,
            'id_enterprise'=>22,
        ]);
        Enterprise_User::create([
            'id_user'=>9,
            'id_enterprise'=>17,
        ]);
        Enterprise_User::create([
            'id_user'=>9,
            'id_enterprise'=>59,
        ]);
        Enterprise_User::create([
            'id_user'=>9,
            'id_enterprise'=>29,
        ]);
        Enterprise_User::create([
            'id_user'=>9,
            'id_enterprise'=>27,
        ]);
        //Edgardo Cruz
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>12,
        ]);
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>13,
        ]);
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>47,
        ]);
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>48,
        ]);
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>49,
        ]);
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>50,
        ]);
        Enterprise_User::create([
            'id_user'=>10,
            'id_enterprise'=>51,
        ]);
        //Heberto Dessens
        Enterprise_User::create([
            'id_user'=>11,
            'id_enterprise'=>14,
        ]);
        //Iker Lambarri
        Enterprise_User::create([
            'id_user'=>12,
            'id_enterprise'=>23,
        ]);
        //Jesus Oscar
        Enterprise_User::create([
            'id_user'=>13,
            'id_enterprise'=>26,
        ]);
        //Daniel Suarez
        Enterprise_User::create([
            'id_user'=>14,
            'id_enterprise'=>15,
        ]);


        //WEEKS

        Week::create([
            'end_date'=>\Carbon\Carbon::now()->toDateString(),
            'start_date'=>\Carbon\Carbon::now()->subDays(7)->toDateString()
        ]);
        Week::create([
            'end_date'=>\Carbon\Carbon::now()->subDays(7)->toDateString(),
            'start_date'=>\Carbon\Carbon::now()->subDays(14)->toDateString()
        ]);
        Week::create([
            'end_date'=>\Carbon\Carbon::now()->subDays(14)->toDateString(),
            'start_date'=>\Carbon\Carbon::now()->subDays(21)->toDateString()
        ]);
        Week::create([
            'end_date'=>\Carbon\Carbon::now()->subDays(21)->toDateString(),
            'start_date'=>\Carbon\Carbon::now()->subDays(28)->toDateString()
        ]);
    }
}
