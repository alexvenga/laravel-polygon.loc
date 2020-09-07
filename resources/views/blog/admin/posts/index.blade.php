@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-light bg-transparent">
                <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Заголовок</th>
                            <th>Дата публикации</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($paginator as $post)
                            @php /** @var \App\Models\BlogPost $post */  @endphp
                            <tr @if (!$post->is_published) style="background-color: #eee;" @endif>
                                <td>
                                    {{ $post->id }}
                                </td>
                                <td>
                                    {{ $post->user->name }}
                                </td>
                                <td>
                                    {{ $post->category->title }}
                                </td>
                                <td>
                                    <a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                                </td>
                                <td>
                                    {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d,M H:i') : '' }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($paginator->total() > $paginator->count())
            <br>
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        {{ $paginator->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


