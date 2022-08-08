@foreach($posts as $item)
    <div class="form-group">
        <lable class="checkbox-inline"> {{$item->title}}
            <input  data-id="{{$item->id}}" data-type="{{$item->post_type}}" data-title="{{$item->title}}" data-link="/{{$item->post_type}}/{{$item->id}}/{{$item->slug}}" type='checkbox' class='styled chk-category-menu' name="" title='{{$item->title}}'/>
        </lable>
    </div>
@endforeach
