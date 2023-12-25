@extends('layoutAdmin')
@section('title', 'エラー | 丸井グループ 弔事連絡表')
@section('content')
    <main class="main container @yield('mainClass')">
    <div class="card">
        <div class="card-content">
            <div class="row yellow lighten-4 caution">
                {{ $error }}
            </div>
        </div>
    </div>
    </main>
@endsection
