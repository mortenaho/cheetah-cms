{{--<div class="row">--}}
    {{--<div class="col-md-6 animated fadeIn">--}}
        {{--<div class="alert bg-{{$type}} alert-styled-left">--}}
            {{--<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>--}}
            {{--<span class="text-semibold">{{$message}}</span>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<script>
    noty({
        text: '{{$message}}',
        layout: 'bottom',
        type:'{{$type}}',

    });
</script>
