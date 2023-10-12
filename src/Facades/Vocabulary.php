<?php

namespace Creode\LaravelTaxonomy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creode\LaravelTaxonomy\Services\VocabularyService
 */
class Vocabulary extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creode\LaravelTaxonomy\Services\VocabularyService::class;
    }
}
