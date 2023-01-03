<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin:2rem">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form action={{route('arcticles.update',['arcticle' => $arcticle->id])}} method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="title" class="form-label">Título</label>
                    <input name="title" type="text" class="form-control" value="{{$arcticle->title}}">
                    <label for="url" class="form-label">Endereço do artigo</label>
                    <input name="url" type="text" class="form-control" value="{{$arcticle->url}}">
                    <label for="imageUrl" class="form-label">Imagem(url)</label>
                    <input name="imageUrl" type="text" class="form-control" value="{{$arcticle->imageUrl}}">
                    <label for="newsSite" class="form-label">Site</label>
                    <input name="newsSite" type="text" class="form-control" value="{{$arcticle->newsSite}}">
                    <label for="summary" class="form-label">Resumo</label>
                    <textarea name="body" class="form-control">{{$arcticle->summary}}</textarea>
                    <input type="submit" class="btn btn-dark" value="Salvar" style="margin-top:1rem">
                </form>
            </div>
        </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>