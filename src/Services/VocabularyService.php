<?php

namespace Creode\LaravelTaxonomy\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

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

        // Create the new table. (This should be from a stub).
        $tableName = Str::of($name)->snake() . '_taxonomy_vocabulary';
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('parent_id')->nullable;
            // TODO: Fire an event here to allow you to add new table fields.
            $table->timestamps();
        });

        // Fire an event to say that a new vocabulary has been registered.
        event(new \Creode\LaravelTaxonomy\Events\VocabularyRegistered($vocabulary));

        return $vocabulary;
    }
}
