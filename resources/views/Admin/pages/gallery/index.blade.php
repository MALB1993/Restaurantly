@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('gallery.index') }}">Galleries</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="col-md-12">
        <table class="table table-bordered border-primary">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($galleries as $gallery)
                <tr>
                    <th scope="row">{{ $gallery->id }}</th>
                    <th scope="col">
                        <img src="{{ asset('/images/gallery/'.$gallery->image) }}" alt="" width="200" height="200" class="rounded-circle">
                    </th>

                    @switch($gallery->status)
                        @case(1)
                        @php $status = '<i class="btn btn-sm bi bi-eye-slash btn-success"></i>' @endphp
                        @break
                        @case(0)
                        @php $status = '<i class="btn btn-sm bi bi-eye-fill btn-danger"></i>' @endphp
                        @break
                    @endswitch
                    <td class="text-center">{!! $status !!}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('gallery.show',$gallery->id) }}" class="fs-6 btn btn-sm btn-outline-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <x-form action="{{ route('gallery.destroy',$gallery->id) }}" method="post">
                            <x-button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash-fill"></i>
                            </x-button>
                        </x-form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 d-flex justify-content-center">
        {{ $galleries->links('vendor/pagination/bootstrap-5') }}
    </div>
@endsection
