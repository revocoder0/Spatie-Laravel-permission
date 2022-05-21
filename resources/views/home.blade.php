@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            </div>
            <div class="card mt-4">
                <div class="container">
                    @hasanyrole('writer|admin')
                    <a href="#" class="btn btn-primary btn-sm mt-3">Add Post</a>
                    @endhasanyrole
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Post::all() as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    @hasanyrole('editor|admin')
                                    <a href="#" class="btn btn-sm btn-warning btn-rounded">Edit</a>
                                    @endhasanyrole
                                    @hasanyrole('publisher|admin')
                                    <a href="#" class="btn btn-sm btn-danger btn-rounded">Publish</a>
                                    @endhasanyrole
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
