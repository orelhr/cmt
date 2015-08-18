<?php

use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Model::unguard();
        $this->call('GuestTypeSeeder');
       
    }
}

class GuestType extends Seeder(){


	 public function run(){

        DB::table('guest_type')->delete();
        DB::table('guest_type')->insert(array(
        	array ('name'=>'GRUPO', 'type'=> '1', 'active'=> '1'),
            array ('name'=>'SEDESOL', 'type'=> '2','active'=>'1'),
            array ('name'=>'SAGARPA', 'type'=> '2','active'=>'1'),
            array ('name'=>'CDI', 'type'=> '2','active'=>'1'),
            array ('name'=> 'OPORTUNIDADES','type'=> '2', 'active'=> '1'),
            array ('name'=> 'GOBIERNO MUNICIPAL', 'type'=> '2', 'active'=> '1'),
            array ('name'=> 'GOBIERNO FEDERAL', 'type'=> '2', 'active' => '1'),
           
            ));
      }
}
