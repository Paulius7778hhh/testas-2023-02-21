@inject('write', 'App\Services\Rate')
@extends('front.app')

@section('content')
    <Section>
        <textarea name="weltext" id="" cols="120" rows="30" readonly value='{{ old('weltext') }}'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus corporis ullam sit. Labore vero, quidem animi quasi totam quibusdam dolorum atque sequi expedita rerum officiis ipsum soluta reprehenderit illum provident quae voluptates in obcaecati exercitationem harum eius omnis ullam perferendis maxime? Perferendis, reprehenderit exercitationem nulla, voluptatum molestias adipisci ipsam commodi aperiam obcaecati est fuga id, deleniti nostrum. Blanditiis veritatis veniam aliquid corrupti, expedita explicabo quod reiciendis repudiandae nobis debitis error enim perferendis et vel a nisi vitae exercitationem dolor aliquam magnam quas dolore rem suscipit excepturi! Nam dolore dolor quaerat eos consequatur, voluptas et hic repellat doloremque! Cum dolorum non incidunt quidem ipsum consequatur, quam atque illo modi tempora fugiat provident, minus corrupti quasi repudiandae libero odio commodi quaerat, dicta unde odit nobis tenetur! Dolorum modi earum suscipit eos! Deleniti ab eligendi doloremque nesciunt quaerat nam laboriosam quas nulla provident praesentium ipsam, non in laborum cupiditate molestiae assumenda porro incidunt asperiores molestias? Illum, placeat voluptate. Earum doloremque sapiente maiores nihil nostrum sint, iure modi. Maiores, rerum porro debitis, suscipit similique cupiditate dicta rem amet totam perferendis sed officiis dolor explicabo expedita laboriosam saepe molestiae qui reiciendis libero voluptas nesciunt aut. Et, nobis excepturi! Eveniet totam molestiae adipisci! At, sint laudantium?</textarea>
    </Section>
    {{ $write->test() }}
@endsection
