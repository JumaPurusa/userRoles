@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                        <tbody>   
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} </td>
                                <td>
                                    @can('edit-users')
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary float-left">Edit</a>
                                    @endcan
                                    
                                    @can('delete-users')
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field("DELETE") }}

                                            <input type="submit" value="Delete" class="btn btn-secondary"/>
                                        </form>  
                                    @endcan
                                    
                                    
                                </td>
                            </tr>
                        </tbody>    
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection