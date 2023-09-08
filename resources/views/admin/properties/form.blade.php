@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Creer un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-3" action="{{ route($property->exists?'admin.property.update':'admin.property.store', $property) }}"
          method="post">

        @csrf
        @method($property->exists ? 'patch' : 'post')

        <div class="row">
            @include('share.input', ['class' =>'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])

            <div class="col row">
                @include('share.input', ['class' =>'col', 'name' => 'surface', 'value' => $property->surface])
                @include('share.input', ['class' =>'col', 'name' => 'price', 'value' => $property->price])
            </div>
        </div>
        @include('share.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])

        <div class="row">
            @include('share.input', ['class' =>'col', 'name' => 'rooms', 'label' => 'Pieces', 'value' => $property->rooms])
            @include('share.input', ['class' =>'col', 'name' => 'bedrooms', 'label' => 'Chambre', 'value' => $property->bedrooms])
            @include('share.input', ['class' =>'col', 'name' => 'floor', 'label' => 'Etage', 'value' => $property->floor])
        </div>
        <div class="row">
            @include('share.input', ['class' =>'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address])
            @include('share.input', ['class' =>'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city])
            @include('share.input', ['class' =>'col', 'name' => 'postal_code', 'label' => 'Code Postal', 'value' => $property->postal_code])
        </div>

        @include('share.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
        @include('share.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold, 'options' => $options])




        <div>
            <button class="btn btn-primary">
                @if($property->exists)
                    Modifier
                @else
                    Creer
                @endif
            </button>
        </div>

    </form>


@endsection
