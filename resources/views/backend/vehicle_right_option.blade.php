
<div class="sidebar columns is-multiline">

    <!-- Make Widzert -->
    @foreach($sidebar->taxonomy as $tax)
    <div class="widzert mb-10 column is-6">
        <h5 class="title is-5 py-2">{{$tax->name}}</h5>
        <div>
            @foreach($sidebar->{$tax->slug} as $data)
            <label class="checkbox">
                <input name="taxonomy[]" value="{{$data->id}}" type="checkbox" {{in_array($data->id, $taxonomy_meta_selected)?'checked':''}}>
                {{$data->name}}
            </label>
            @endforeach
        </div>
    </div>
    @endforeach

    <!-- Make Widzert -->
	<div class="widzert mb-10 column is-6">
		<h5 class="title is-5 py-2">Feature</h5>
		<div>
			@foreach($feature as $data)
			<label class="checkbox">
				<input name="feature[]" value="{{$data->id}}" type="checkbox" {{in_array($data->id, $feature_selected)?'checked':''}}>
				{{$data->name}}
			</label>
			@endforeach
		</div>
	</div>
    
</div>