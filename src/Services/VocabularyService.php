<?php

namespace Creode\LaravelTaxonomy\Services;

class VocabularyService
{
    /**
     * Allows the registration of a new vocabulary.
     *
     * @param  string  $name
     * @param  string  $description
     * @return void
     */
    public function register($name, $description)
    {
        // Create a new vocabulary record???
        $vocabulary = new \Creode\LaravelTaxonomy\Models\Vocabulary();
        $vocabulary->name = $name;
        $vocabulary->description = $description;
        $vocabulary->save();

        // Fire an event to say that a new vocabulary has been registered.
        event(new \Creode\LaravelTaxonomy\Events\VocabularyRegistered($vocabulary));

        return $vocabulary;
    }
}
