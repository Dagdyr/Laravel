
@extends('template')
@section('content')
    <h1 class="text-center">{{$article->title}}</h1>
    <div>
        {{$article->content}}
    </div>
    <h2 class="text-center mt-4">Комментарии: </h2>


    <script>
        /*function getComment() {

        function renderComment() {
            let card = document.createElement("div");
            let cardHeader = document.createElement("div");
            let cardBody = document.createElement("div");
            let cardText = document.createElement("p");
            card.classList.add("card", "mb-3");
            cardHeader.classList.add("card-header");
            cardBody.classList.add("card-body");
            cardText.classList.add("card-text");
            cardHeader.innerText = {{auth()->user()->id}};
            cardText.innerText = 1;
            cardBody.append(cardText);
            card.append(cardHeader);
            card.append(cardBody);
            commentDiv.prepend(card);
        }}*/

    </script>
    <div class="col-sm-12 mx-auto">
        <form action="/addComment" method="POST">
            @csrf
            <div class="mx-auto">
                <input class="form-control" name="content" type="text" placeholder="Добавить комментарий">
            </div>
                <input class="form-control" name="article_id" type="hidden" value="{{$article->id}}">
                <input class="form-control" name="author_id" type="hidden" value="{{auth()->user()->id}}">
            <div class="mt-3 mx-auto">
                <input type="submit" class="form-control btn btn-primary" value="Отправить комментарий">
            </div>
        </form>
    </div>
@endsection
