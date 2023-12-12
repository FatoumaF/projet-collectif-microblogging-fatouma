@props(['user' => $user])

<p>User name: {{ $user->name }}</p>
<p>User id: {{ $user->id }}</p>
<p class="followers">{{ $user->followers }}</p>
<x-follow :userId="$user->id" :followed="$user->followed"/>
