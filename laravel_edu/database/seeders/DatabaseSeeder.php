<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // php artisan db:seed --class=DatabaseSeeder 해당 명령어 사용
        // 더미 데이터 삽입용 팩토리 호출 | 대량의 더미를 생성 시 컴퓨터가 버틸 수 있는지 확인할 것, 보통 5000 ~ 10000 단위로 루프 돌림

        // 30만건을 생성하는 예제
        // $cnt = 0;
        // while($cnt < 60) {
        //     \App\models\Board::factory(5000)->create();
        //     $cnt++;
        // }

        $cnt = 0;
        while($cnt < 60) {
            \App\models\Board::factory(10)->create();
            $cnt++;
        }
    }
}
