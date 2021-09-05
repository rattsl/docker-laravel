<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一つ一つのレコード
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => 30,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@toireno.jp',
            'age' => 50,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'hoge',
            'mail' => 'hoge@fuga.jp',
            'age' => 20,
        ];
        DB::table('people')->insert($param);
    }
}
