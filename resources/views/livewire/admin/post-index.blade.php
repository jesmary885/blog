<div class="card">
    <div class="card-header">
        <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($posts->count())
        <div class="body-card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td with="10px"><a href="{{route('admin.posts.edit',$post)}}" class="btn btn-primary btn-sn">Editar</a></td>
                        <td with="10px">
                            <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Elimnar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
    <div class="card-body">
        <footer>No hay ningun registro...</footer>
    </div>
    @endif
</div>
