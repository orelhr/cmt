<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('StateSeeder');
	}



}

class StateSeeder extends Seeder {

    public function run(){

        DB::table('states')->delete();
        DB::table('states')->insert(array(
                array('name'=>'AGUASCALIENTES', 'description'=> 'ZONA 02', 'active'=>'1','country'=>'1'),
                array('name'=>'BAJA CALIFORNIA', 'description'=> 'ZONA 01', 'active'=>'1','country'=>'1'),
                array('name'=>'BAJA CALIFORNIA SUR', 'description'=> 'ZONA 01', 'active'=>'1','country'=>'1'),
                array('name'=>'CAMPECHE', 'description'=> 'ZONA 06', 'active'=>'1','country'=>'1'),
                array('name'=>'COAHUILA DE ZARAGOZA', 'description'=> 'ZONA 02', 'active'=>'1','country'=>'1'),
                array('name'=>'COLIMA', 'description'=> 'ZONA 04', 'active'=>'1','country'=>'1'),
                array('name'=>'CHIAPAS', 'description'=> 'ZONA 08', 'active'=>'1','country'=>'1'),
                array('name'=>'CHIHUAHUA', 'description'=> 'ZONA 02', 'active'=>'1','country'=>'1'),
                array('name'=>'DISTRITO FEDERAL', 'description'=> 'ZONA 05', 'active'=>'1','country'=>'1'),
                array('name'=>'DURANGO', 'description'=> 'ZONA 02', 'active'=>'1','country'=>'1'),
                array('name'=>'GUANAJUATO', 'description'=> 'ZONA 04', 'active'=>'1','country'=>'1'),
                array('name'=>'GUERRERO ', 'description'=> 'ZONA 07', 'active'=>'1','country'=>'1'),
                array('name'=>'HIDALGO', 'description'=> 'ZONA 05', 'active'=>'1','country'=>'1'),
                array('name'=>'JALISCO', 'description'=> 'ZONA 04', 'active'=>'1','country'=>'1'),
                array('name'=>'MÉXICO', 'description'=> 'ZONA 05', 'active'=>'1','country'=>'1'),
                array('name'=>'MORELOS', 'description'=> 'ZONA 07', 'active'=>'1','country'=>'1'),
                array('name'=>'NAYARIT', 'description'=> 'ZONA 01', 'active'=>'1','country'=>'1'),
                array('name'=>'NUEVO LEÓN', 'description'=> 'ZONA 03', 'active'=>'1','country'=>'1'),
                array('name'=>'OAXACA', 'description'=> 'ZONA 08', 'active'=>'1','country'=>'1'),
                array('name'=>'PUEBLA', 'description'=> 'ZONA 10', 'active'=>'1','country'=>'1'),
                array('name'=>'QUERETARO', 'description'=> 'ZONA 04', 'active'=>'1','country'=>'1'),
                array('name'=>'QUINTANA ROO', 'description'=> 'ZONA 06', 'active'=>'1','country'=>'1'),
                array('name'=>'SAN LUIS POTOSÍ', 'description'=> 'ZONA 03', 'active'=>'1','country'=>'1'),
                array('name'=>'SINALOA', 'description'=> 'ZONA 01', 'active'=>'1','country'=>'1'),
                array('name'=>'SONORA', 'description'=> 'ZONA 01', 'active'=>'1','country'=>'1'),
                array('name'=>'TABASCO', 'description'=> 'ZONA 06', 'active'=>'1','country'=>'1'),
                array('name'=>'TAMAULIPAS', 'description'=> 'ZONA 03', 'active'=>'1','country'=>'1'),
                array('name'=>'TLAXCALA', 'description'=> 'ZONA 05', 'active'=>'1','country'=>'1'),
                array('name'=>'VERACRUZ DE IGNACIO', 'description'=> 'ZONA 06', 'active'=>'1','country'=>'1'),
                array('name'=>'SINALOA', 'description'=> 'ZONA 01', 'active'=>'1','country'=>'1'),
            )



        );

    }

}


