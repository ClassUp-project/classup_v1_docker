<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfSelectClasseTest extends TestCase
{
    /** @test */
    public function professeur_select_classe_et_matiere()
    {
        $response = $this->post('/profs', [
            'classe' =>'1a1',
            'matiere'=>'mathématique'
        ]);

        $response->assertOk();

        $this->assertCount(1, Professeur::all());
    }

}
