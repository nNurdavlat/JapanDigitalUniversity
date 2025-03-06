<?php
//
//namespace Tests\Feature;
//
//use App\Models\Subject;
//use App\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Tests\TestCase;
//
//class SubjectControllerTest extends TestCase
//{
//    use RefreshDatabase;
//
//    public function test_can_create_subject()
//    {
//        $user = User::factory()->create();
//        $token = $user->createToken('token')->plainTextToken;
//
//        $createSubject = $this->withHeaders(['Authorization'=> 'Bearer '.$token])
//            ->postJson('/api/subjects',[
//                'name' => 'Test Subject',
//            ]);
//        $createSubject->assertStatus(201);
//        $createSubject->assertJson([
//            'message' => "Subject created successfully!"
//        ]);
//    }
//
//    public function test_cannot_create_subject()
//    {
//        $user = User::factory()->create();
//        $token = $user->createToken('token')->plainTextToken;
//
//        $createSubject = $this->withHeaders(['Authorization'=> "Bearer $token"])
//            ->postJson('/api/subjects',[
//            ]);
//        $createSubject->assertStatus(422);
//        $createSubject->assertJson([
//            'errors' => [
//                'name' => ['The name field is required.'],
//            ]
//        ]);
//    }
//}
