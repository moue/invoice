<?php

class SizesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('invoice_items_sizes')->delete();

        DB::table('invoice_items_sizes')->insert( 
            array(
                array('size' => '1/4 Page'),
                array('size' => '1/3 Page'),
                array('size' => '1/2 Page'),
                array('size' => '2/3 Page'),
                array('size' => 'Full Page'),
                array('size' => 'Center Spread')
            )
        );
    }

}

?>