@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <p class="text-gray-500">{{ $size->name ?? ''  }}</p>
                <p class="text-gray-500">{{ $size->description ?? ''  }}</p>
            </div>
        </div>
    </div>
@endsection
