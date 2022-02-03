

@if(@$item['subitem'] == [])

    <li >
        <p>{{ $item['name'] }}  <a href="/admin/categories/{{$item['id']}}/edit" class="btn-xs btn btn-outline-info "><i class="far fa-edit"></i></a></p>


    </li>
@else
<li  class="first-item" >

 <p> {{ $item['name'] }}  <a href="/admin/categories/{{$item['id']}}/edit" class="btn-xs btn btn-outline-info "><i class="far fa-edit"></i></a></p>


    <ol class="lista2">

        @foreach($item['subitem'] as $j => $submenu)

            @if (@$submenu['subitem'] == [])
                <li class="o-item">

                   <p>{{$submenu['name']}}  <a href="/admin/categories/{{$submenu['id']}}/edit" class="btn-xs btn btn-outline-info "><i class="far fa-edit"></i></a></a>
                   </p>


                </li>
            @else

                @include('layouts.backend.partials.category-item', [ 'item' => $submenu ])
            @endif


        @endforeach
    </ol>
</li>

@endif





