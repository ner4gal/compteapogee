@component('mail::message')
# Statut de votre accès APOGEE

Votre demande d'accès a été mise à jour: 

**Nouveau statut**: {{ $status }}

@if($status === 'Accès accordé')
Vous pouvez maintenant accéder à toutes les fonctionnalités du système.
@elseif($status === 'Accès refusé')
Veuillez contacter l'administration pour plus d'informations.
@endif

@component('mail::button', ['url' => url('/')])
Accéder au système
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent