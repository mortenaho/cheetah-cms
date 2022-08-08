<script>
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    $(function () {
        new PNotify({
            title: 'هشدار',
            text: '{{$error}}',
            type: 'error',
            addclass: "bg-danger"
        });
    });
    @endforeach
    @endif
</script>
