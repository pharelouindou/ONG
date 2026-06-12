@extends('layouts.app')

@section('title', 'Contact | ADéProG-ONG')
@section('meta_description', 'Contactez ADéProG-ONG à Nikki, Borgou. Formulaire, téléphone, email et réseaux sociaux.')

@section('content')
@include('partials.page-hero', [
    'heroClass' => 'ph-contact',
    'tag'       => 'Écrivez-nous',
    'title'     => 'Contact',
    'subtitle'  => 'Rejoignez-nous pour construire un développement durable et inclusif au Bénin.',
    'icon'      => '✉️',
])

<section class="section section-contact-page">
    <div class="container contact-grid">
        <div class="contact-info contact-info-light">
            <ul class="contact-list">
                <li>
                    <strong>Adresse</strong>
                    Département du Borgou, Commune de Nikki,<br />
                    Quartier Gah-Maro, Maison BORI BATA YERIMA
                </li>
                <li>
                    <strong>Téléphones</strong>
                    <a href="tel:+22996453901">+229 96 45 39 01</a> ·
                    <a href="tel:+22995909814">+229 95 90 98 14</a> ·
                    <a href="tel:+229153379954">+229 15 33 79 954</a>
                </li>
                <li>
                    <strong>Email</strong>
                    <a href="mailto:Adeprogong2@gmail.com">Adeprogong2@gmail.com</a>
                </li>
                <li>
                    <strong>LinkedIn</strong>
                    <a href="https://www.linkedin.com/company/adeprog-ong/" target="_blank" rel="noopener">adeprog-ong</a>
                </li>
            </ul>
        </div>

        <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
            @csrf

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Votre nom" />
                @error('name')<span class="form-error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="votre@email.com" />
                @error('email')<span class="form-error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Partenariat, information..." />
                @error('subject')<span class="form-error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required placeholder="Votre message...">{{ old('message') }}</textarea>
                @error('message')<span class="form-error">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary btn-full">Envoyer le message</button>
        </form>
    </div>
</section>
@endsection
