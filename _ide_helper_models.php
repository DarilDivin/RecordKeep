<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BoiteArchive
 *
 * @property int $id
 * @property string $libelle
 * @property string $code
 * @property int $rayon_rangement_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChemiseDossier> $chemisedossiers
 * @property-read int|null $chemisedossiers_count
 * @property-read \App\Models\RayonRangement|null $rayonrangement
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereRayonRangementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BoiteArchive withoutTrashed()
 */
	class BoiteArchive extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChemiseDossier
 *
 * @property int $id
 * @property string $libelle
 * @property string $code
 * @property int $boite_archive_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\BoiteArchive|null $boitearchive
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereBoiteArchiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemiseDossier withoutTrashed()
 */
	class ChemiseDossier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DemandePret
 *
 * @property int $id
 * @property string $motif
 * @property int $duree
 * @property string $etat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Document|null $document
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret query()
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret whereDuree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret whereEtat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret whereMotif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandePret whereUpdatedAt($value)
 */
	class DemandePret extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DetailsTransfert
 *
 * @property int $document_id
 * @property int $transfert_id
 * @method static \Illuminate\Database\Eloquent\Builder|DetailsTransfert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailsTransfert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailsTransfert query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailsTransfert whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailsTransfert whereTransfertId($value)
 */
	class DetailsTransfert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Direction
 *
 * @property int $id
 * @property string $nom
 * @property string $sigle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|Direction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereSigle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Direction withoutTrashed()
 */
	class Direction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Division
 *
 * @property int $id
 * @property string $nom
 * @property string $sigle
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\Service $service
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereSigle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Division withoutTrashed()
 */
	class Division extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property string $signature
 * @property string $code
 * @property string $objet
 * @property string|null $source
 * @property string $emetteur
 * @property string $recepteur
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChemiseDossier> $motclefs
 * @property string $datecreation
 * @property int $disponibilite
 * @property int $archive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $nature_document_id
 * @property int|null $chemise_dossier_id
 * @property int|null $division_id
 * @property int|null $service_id
 * @property int|null $direction_id
 * @property-read \App\Models\ChemiseDossier|null $chemisedossier
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DemandePret> $demandeprets
 * @property-read int|null $demandeprets_count
 * @property-read \App\Models\Direction|null $direction
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Fonction> $fonctions
 * @property-read int|null $fonctions_count
 * @property-read int|null $motclefs_count
 * @property-read \App\Models\NatureDocument|null $naturedocument
 * @property-read \App\Models\Service|null $service
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transfert> $transferts
 * @property-read int|null $transferts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereChemiseDossierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDatecreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDisponibilite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereEmetteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereMotclefs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNatureDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereObjet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereRecepteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withoutTrashed()
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Fonction
 *
 * @property int $id
 * @property string $fonction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction whereFonction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Fonction withoutTrashed()
 */
	class Fonction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FonctionDocument
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FonctionDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FonctionDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FonctionDocument query()
 */
	class FonctionDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NatureDocument
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NatureDocument whereUpdatedAt($value)
 */
	class NatureDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RayonRangement
 *
 * @property int $id
 * @property string $libelle
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BoiteArchive> $boitearchives
 * @property-read int|null $boitearchives_count
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement query()
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RayonRangement withoutTrashed()
 */
	class RayonRangement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $nom
 * @property string $sigle
 * @property int $direction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Direction $direction
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Division> $divisions
 * @property-read int|null $divisions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSigle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service withoutTrashed()
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transfert
 *
 * @property int $id
 * @property string $source
 * @property string $date
 * @property string $destination
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert withoutTrashed()
 */
	class Transfert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $nom
 * @property string $prenoms
 * @property string $email
 * @property string $motdepasse
 * @property string $datenaissance
 * @property string $sexe
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $fonction_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DemandePret> $demandeprets
 * @property-read int|null $demandeprets_count
 * @property-read \App\Models\Division|null $division
 * @property-read \App\Models\Fonction $fonction
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDatenaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFonctionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMotdepasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrenoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

