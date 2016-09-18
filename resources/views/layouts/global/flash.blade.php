@if ( Session::has('flash.message') )
<script>
    $(function(){
        noty_flash('{{ Session::get('flash.message') }}','{{ Session::get('flash.level') }}');
    });
</script>
@endif