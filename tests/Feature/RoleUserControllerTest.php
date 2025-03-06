<?php
//
//namespace Tests\Feature;
//
//
//
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Support\Facades\Hash;
//use Tests\TestCase;
//use App\Models\User;
//use App\Models\Role;
//
//class RoleUserControllerTest extends TestCase
//{
//    use RefreshDatabase;
//    public User $user;
//    public Role $role;
//    public string $token;
//
//    public function setUp(): void
//    {
//        parent::setUp();
//        $this->user = User::query()->create([
//            'name' => 'Test User',
//            'email' => 'test@test.com',
//            'password' => 'password',
//            'password_confirmation' => 'password',
//        ]);
//        $this->token = $this->user->createToken('test-token')->plainTextToken;
//        $this->role = Role::query()->create([
//            'name' => 'Test Role',
//        ]);
//    }
//
//    public function test_create_role_user()
//    {
//        $createRoleUser = $this->withHeaders(['Authorization'=>'Bearer ' . $this->token])->postJson('/api/role-user', [
//            'role_id' => $this->role->id,
//            'user_id' => $this->user->id,
//        ]);
//        $createRoleUser->assertStatus(201);
//        $createRoleUser->assertJson([
//            'success'=>true,
//        ]);
//    }
//
//    public function test_update_role_user()
//    {
//        $updateRoleUser = $this->withHeaders(['Authorization'=>'Bearer ' . $this->token])->putJson('/api/role-user/' . $this->user->id, [
//            'role_id' => $this->role->id,
//            'user_id' => $this->user->id,
//        ]);
//        $updateRoleUser->assertStatus(200);
//        $updateRoleUser->assertJson([
//            'success'=>true,
//        ]);
//    }
//}
