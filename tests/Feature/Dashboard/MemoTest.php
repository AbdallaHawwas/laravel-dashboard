<?php

use App\Models\Admin;
use App\Models\Memo;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $admin = Admin::factory()->create();

    $this->actingAs($admin);
});

test('Memos index page can be rendered', function () {
    $this->get(route('memos.index'))->assertOk();
});

test('Memos create page can be rendered', function () {
    $this->get(route('memos.create'))->assertOk();
});

test('Memos can be created', function () {
    $this->post(route('memos.store'), [
        'title' => 'Test Title',
        'content' => 'Test Content',
    ])->assertRedirect();

    $this->assertDatabaseHas('memos', [
        'title' => 'Test Title',
        'content' => 'Test Content',
    ]);
});

test('Memos show page can be rendered', function () {
    $memo = Memo::factory()->create();

    $this->get(route('memos.show', $memo))->assertOk();
});

test('Memos edit page can be rendered', function () {
    $memo = Memo::factory()->create();

    $this->get(route('memos.edit', $memo))->assertOk();
});

test('Memos can be updated', function () {
    $memo = Memo::factory()->create();

    $this->put(route('memos.update', $memo), [
        'title' => 'Test Title',
        'content' => 'Test Content',
    ])->assertRedirect();

    $this->assertDatabaseHas('memos', [
        'id' => $memo->id,
        'title' => 'Test Title',
        'content' => 'Test Content',
    ]);
});

test('Memos can be deleted', function () {
    $memo = Memo::factory()->create();

    $this->delete(route('memos.destroy', $memo))->assertRedirect();

    $this->assertDatabaseMissing('memos', [
        'id' => $memo->id,
    ]);
});
