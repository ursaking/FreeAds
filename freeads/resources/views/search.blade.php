@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-top: 50px">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="/search" method="post" role="search">
				{{ csrf_field() }}
				<div class="input-group">
					<input type="text" class="form-control" name="search" placeholder="Search Ads"><span class="input-group-btn"></span>
					<button type="submit" class="btn btn-default"></button>
					<span class="glyphicon glyphicon-search"></span>
				</div>
			</form>
			
		</div>
	</div>
</div>