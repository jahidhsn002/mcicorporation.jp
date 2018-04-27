
<div class="column pt-15 is-12">
    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field is-expanded">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-warning is-static">
                            Search By Keyword
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input is-warning" type="text" name="search" placeholder="Search here ...">
                    </p>
                    <p class="control">
                        <button class="button is-warning px-30" type="submit"><b>Search</b></button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="search_box box column is-12 mt-0 mb-0">
    <div class="columns mb-0 is-multiline">
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Price</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input" type="number" step="any" name="price-from" placeholder="Min">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input" type="number" step="any" name="price-to" placeholder="Max">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Mileage</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input" type="number" step="any" name="mileage-from" placeholder="Min">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input" type="number" step="any" name="mileage-to" placeholder="Max">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Engine</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input" type="number" step="any" name="engine-from" placeholder="Min">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded">
                            <input class="input" type="number" step="any" name="engine-to" placeholder="Max">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @foreach($sidebar->taxonomy as $tax)
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth">
                            <select name="taxonomy[]">
                                <option value="">{{$tax->name}}</option>
                                @foreach($sidebar->{$tax->slug} as $data)
                                <option
                                    value="{{$data->id}}"
                                    {{in_array($data->id, $taxonomy_selected)?'selected':''}}
                                >{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- expand -->

    </div>

    <!-- Make Widzert -->
    <div class="mb-10">
        <h5 class="title is-5 pa-5 mb-20">Features</h5>
        <div class="columns is-multiline">
            @foreach($features as $data)
            <label class="checkbox px-15 py-5 column is-2">
                <input name="feature[]" value="{{$data->id}}" type="checkbox" {{in_array($data->id, $feature_selected)?'checked':''}}>
                {{$data->name}}
            </label>
            @endforeach
        </div>
    </div>

    <!-- Make Widzert -->
    <div class="columns">
        <div class="column is-3"></div>
        <div class="column is-6 has-text-centered">
            <button class="button is-warning px-50" type="submit">Search</button> or <button class="button is-link px-50"  type="reset">Reset</button>
        </div>
        <div class="column is-3 has-text-right">
            @if(isset($_REQUEST['taxonomy'])) <a href="{{ route('wishlist_save', ['taxonomy' => $_REQUEST['taxonomy']]) }}" class="button is-info px-50">Add to wish list</a> @endif
        </div>
    </div>
</section>