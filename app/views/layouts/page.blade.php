<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{ ViewHelper::getPageTitle() }}</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        {{ stylesheet_link_tag()    }}
        {{ javascript_include_tag() }}
	</head>
    <body>
        <div id="container">
            @include('layouts.status')
        	@include('layouts.header')
            
        	<div class="content">
            	@yield('content')
            </div>

            @include('layouts.footer')
        </div>
    </body>
</html>