<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{!!asset('images/logo.jpeg')!!}">
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/login.css')!!}
    

    @yield('content')

    <meta name="_token" content="{!! csrf_token() !!}" />
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    <script src="{{asset('js/ajax-crud.js')}}"></script>
  </body>
</html>
