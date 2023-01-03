<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todos os Artigos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
@foreach($arcticles as $arcticle)
    <div class="container" style="margin: 2rem">
        <div class="row justify-content-md-center">
            <div class="card" style="width: 50rem; padding-top:1rem">
                <img src="{{$arcticle->imageUrl}}" class="card-img-top" alt='{{$arcticle->title}}' style="border-radius:10px" >
                <div class="card-body">
                    <h5 class="card-title">{{$arcticle->title}}</h5>
                    <p class="card-text">{{$arcticle->summary}}</p>
                    <a class="btn btn-dark" href='{{route('arcticles.edit',['arcticle'=>$arcticle->id])}}'>Editar</a>
                    <form action={{route('arcticles.delete',['arcticle'=>$arcticle->id])}} method="post" style="display: inline-block;">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="hidden" name="arcticle" value="{{$arcticle->id}}" />
                        <input type="submit" class="btn btn-dark" value="Deletar"/>
                    </form>
                     <a class="btn btn-dark" href='{{$arcticle->url}}'>Acessar</a>
                </div>
            </div>
        </div>
    </div>
        @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>