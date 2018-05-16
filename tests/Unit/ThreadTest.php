<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;

	/** @test  */
	public function a_thread_has_replies()
	{
		$thread = factory('App\Thread')->create();

		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$thread->replies);
	}

	public function test_a_thread_has_a_creator()
	{
		$this->assertInstanceOf('App\User',$this->thread->creator);
	}

	/** @test */
	public function a_thread_can_add_a_reply()
	{
		$this->thread->addReply([
			                        'body' => 'Foobar',
			                        'user_id' => 1
		                        ]);

		$this->assertCount(1,$this->thread->replies);
	}


}