<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    // php artisan make:test BoardTest
    // 테스트 파일명의 끝이 Test로 끝날것

    use RefreshDatabase; // 테스트 완료 후 DB 초기화를 위한 트레이드

    // 게스트로 리다이렉트 헀을 때
    // public function test_index_게스트_리다이렉트() {
    //     $response = $this->get('/board');
    //     $response->assertRedirect('/user/login');
    // }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
        
    // }
}
