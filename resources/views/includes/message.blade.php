@if (session()->has('message'))
	<div class="alert alert-success" style="text-align: center; margin-top: 25px;">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{{-- <span style="color:#fff"> --}}
		{{session()->get('message')}}
		{{-- </span> --}}
	</div>
@endif

<script>
	$('div.alert').delay(5000).slideUp(300);
</script>
