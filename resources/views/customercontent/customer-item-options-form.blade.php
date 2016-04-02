<label for="item-option">{{$option->name}}</label>
@if($option->type == "combo")
	<select name="item-option" class="form-control">
		@foreach($option->choices as $choice)
			<option value="{{$choice->id}}">{{$choice->name}}</option>
		@endforeach
	</select>
@elseif($option->type == "check")
	@foreach($option->choices as $choice)
		<div class="checkbox">
			<label><input type="checkbox" name="item-option" value="{{$choice->id}}"/>{{$choice->name}}</label>
		</div>
	@endforeach
@else
	<textarea class="form-control" rows="3" name="item-option"></textarea>
@endif