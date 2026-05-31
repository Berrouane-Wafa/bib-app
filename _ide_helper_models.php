<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Auteur
 *
 * @property int $id
 * @property string $nom
 * @property string|null $biographie
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Livre> $livres
 * @property-read int|null $livres_count
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereBiographie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereUpdatedAt($value)
 */
	class Auteur extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $nom
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Emprunt> $emprunts
 * @property-read int|null $emprunts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Edition
 *
 * @property int $id
 * @property string $nom
 * @property string|null $adresse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Livre> $livres
 * @property-read int|null $livres_count
 * @method static \Illuminate\Database\Eloquent\Builder|Edition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Edition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Edition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereUpdatedAt($value)
 */
	class Edition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Emprunt
 *
 * @property int $id
 * @property int $livre_id
 * @property int $client_id
 * @property string $date_emprunt
 * @property string $date_retour_prevue
 * @property string|null $date_retour_reelle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Livre $livre
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt query()
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereDateEmprunt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereDateRetourPrevue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereDateRetourReelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereLivreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emprunt whereUpdatedAt($value)
 */
	class Emprunt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Livre
 *
 * @property int $id
 * @property string $titre
 * @property int $stock
 * @property int $auteur_id
 * @property int $edition_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Auteur $auteur
 * @property-read \App\Models\Edition $edition
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Emprunt> $emprunts
 * @property-read int|null $emprunts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Livre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Livre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Livre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereAuteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereEditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livre whereUpdatedAt($value)
 */
	class Livre extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

