@component('mail::message')

<h1>Olá {{ $user->name }}</h1>
<p>Seu lance para o <b>{{$user->nome_leilao}}</b> foi superado </p>
    @component('mail::button',['url'=>$user->link_leilao])
    Novo Lance
    @endcomponent
<small>Lembrando que para dar um lance é necessário estar logado!</small>

@endcomponent
