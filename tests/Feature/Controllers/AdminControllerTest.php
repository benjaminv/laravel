<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            factory(User::class)->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_admins()
    {
        $admins = factory(Admin::class, 5)->create();

        $response = $this->get(route('admins.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.admins.index')
            ->assertViewHas('admins');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_admin()
    {
        $response = $this->get(route('admins.create'));

        $response->assertOk()->assertViewIs('app.admins.create');
    }

    /**
     * @test
     */
    public function it_stores_the_admin()
    {
        $data = factory(Admin::class)
            ->make()
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->post(route('admins.store'), $data);

        unset($data['password']);
        unset($data['remember_token']);

        $this->assertDatabaseHas('admins', $data);

        $admin = Admin::latest('id')->first();

        $response->assertRedirect(route('admins.edit', $admin));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_admin()
    {
        $admin = factory(Admin::class)->create();

        $response = $this->get(route('admins.show', $admin));

        $response
            ->assertOk()
            ->assertViewIs('app.admins.show')
            ->assertViewHas('admin');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_admin()
    {
        $admin = factory(Admin::class)->create();

        $response = $this->get(route('admins.edit', $admin));

        $response
            ->assertOk()
            ->assertViewIs('app.admins.edit')
            ->assertViewHas('admin');
    }

    /**
     * @test
     */
    public function it_updates_the_admin()
    {
        $admin = factory(Admin::class)->create();

        $data = [
            'name' => $this->faker->text(255),
            'email' => $this->faker->text(255),
            'remember_token' => $this->faker->text(255),
        ];

        $data['password'] = \Str::random('8');

        $response = $this->put(route('admins.update', $admin), $data);

        unset($data['password']);
        unset($data['remember_token']);

        $data['id'] = $admin->id;

        $this->assertDatabaseHas('admins', $data);

        $response->assertRedirect(route('admins.edit', $admin));
    }

    /**
     * @test
     */
    public function it_deletes_the_admin()
    {
        $admin = factory(Admin::class)->create();

        $response = $this->delete(route('admins.destroy', $admin));

        $response->assertRedirect(route('admins.index'));

        $this->assertDeleted($admin);
    }
}
