<?php

use Illuminate\Support\Facades\Schema;

describe('vocabulary registration', function () {
    it('can register a new vocabulary', function () {
        $service = app(\Creode\LaravelTaxonomy\Services\VocabularyService::class);
        $vocabulary = $service->register('test', 'Test Vocabulary');

        expect($vocabulary->name)->toBe('test');
    });

    it('can be registered with a facade', function () {
        $vocabulary = \Creode\LaravelTaxonomy\Facades\Vocabulary::register('test', 'Test Vocabulary');

        expect($vocabulary->name)->toBe('test');
    });

    it('fires an event when a vocabulary is created', function () {
        $service = app(\Creode\LaravelTaxonomy\Services\VocabularyService::class);

        \Illuminate\Support\Facades\Event::fake();

        $service->register('test', 'Test Vocabulary');

        \Illuminate\Support\Facades\Event::assertDispatched(
            \Creode\LaravelTaxonomy\Events\VocabularyRegistered::class
        );
    });

    it('creates a new table to hold vocabulary terms', function () {
        $service = app(\Creode\LaravelTaxonomy\Services\VocabularyService::class);

        $service->register('test', 'Test Vocabulary');

        expect(Schema::hasTable('test_taxonomy_vocabulary'))->toBeTrue();
    });
});
