@if (Session::has('error'))
    <div id="error">
        <p>{{ Session::pull('error') }}</p>
    </div>
@endif
@if (Session::has('success'))
	<div id="success">
        <p>{{ Session::pull('success') }}</p>
    </div>
@endif
@if (Session::has('info'))
	<div id="info">
        <p>{{ Session::pull('info') }}</p>
    </div>
@endif
