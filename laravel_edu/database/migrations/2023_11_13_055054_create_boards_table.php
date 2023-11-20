<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // migration 파일 생성 : php artisan make:migration 파일명
        // migration 실행(모든 migration 파일의 up()메소드를 실행) : php artisan migrate
        // migration 리셋(모든 migration 파일의 down()메소드를 실행) : php artisan migrate:reset
        // migration 롤백(가장 마지막에 실행한 migration의 내용을 롤백) : php artisan migrate:rollback

        // 시더 (초기 데이터 생성) : database\seeders의 각 클래스 파일 확인
        // 팩토리 (더미 데이터 생성) : database\factories의 각 클래스 파일 확인

        Schema::create('boards', function (Blueprint $table) {
            // 글번호, 제목, 내용, 작성일, 수정일, 삭제일자
            $table->id(); // big_int, pk, auto_increment, 파라미터를 따로 안주면 컬럼명이 자동으로 id가됨
            // string = VARCHAR
            // null을 주고 싶을 경우 ->nullable() | 기본적으로 not null
            // ->index() 인덱스 추가 시에
            $table->string('title', 50); // 데이터 타입 varchar(50), 기본 not null
            $table->string('content', 1000); // 데이터 타입 varchar(1000), 기본 not null
            $table->timestamps(); // created_at, updated_at를 자동으로 만들어 줌 | 대신 null 허용
            // $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes(); // 기본 값이 deleted_at, null 허용
            // $table->timestamp('deleted_at')->nullable();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
