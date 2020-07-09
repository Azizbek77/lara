@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') Панел управления @endslot
            @slot('parent') Главная  @endslot
            @slot('active')  @endslot
        @endcomponent
    </section>
@endsection
