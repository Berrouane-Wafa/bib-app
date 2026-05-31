<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
public function test_un_utilisateur_peut_s_inscrire()
{
    $this->browse(function ($browser) {
        $browser->visit('/login')
                ->type('email', 'admin@bib.com')
                ->type('password', '12345678')
                ->press('Se connecter') // Ou le texte de ton bouton
                ->assertPathIs('/books'); // Vérifie la redirection
    });
}
}
