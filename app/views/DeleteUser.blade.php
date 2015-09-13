@extends('main')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php
					if(Session::has('msg')){
						echo '<h2 style="color:green">'. Session::get('msg') .'</h2>';
					}
				?>
				<form class="form-horizontal" method="post" action="{{ URL::route('postDeleteUser') }}">
				  <fieldset>
				    <legend>Delet User</legend>
				    <div class="form-group">
				      <label for="user" class="col-md-2 control-label">Select User</label>
				      <div class="col-md-10">
						<select class="form-control" id="user" name="user">
						<?php
							$users = DB::table('users')->get();
							$i = 0;
							foreach ($users as $user) {
								if($i==0){
									$i++;
								}else{
									echo '<option value="'. $user->id .'">'. $user->username .'</option>';
								}
								
							}
						?>
				        </select>
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <div class="col-md-10 col-md-offset-2">
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
@stop