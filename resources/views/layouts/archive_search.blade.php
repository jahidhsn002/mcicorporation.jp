
<div class="column pt-15 is-12">
    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field is-expanded">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-warning">
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

<section class=" column is-12 my-0">
<div class="search_box box pa-15">
    <b-collapse :open="false">

        <div class="columns mb-0 is-multiline" slot="trigger">
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
            @foreach($sidebar->taxonomy as $ident=>$tax)
                @if($ident < 8)
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
                @endif
            @endforeach

            <div class="column is-3">
                <button class="button is-primary submit" @click.prevent="">SHOW MORE OPTIONS</button>
            </div>
            <!-- expand -->

        </div>

        <div class="columns mb-0 is-multiline">
        
            @foreach($sidebar->taxonomy as $ident=>$tax)
                @if($ident >= 8)
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
                @endif
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

    </b-collapse>

    <!-- Make Widzert -->
    <div class="columns">
        <div class="column is-3">
            
        </div>
        <div class="column is-6 has-text-centered">
            <button class="button is-warning px-50" type="submit">Search</button> 
            <span class="title is-4 px-10 my-0"> or</span>
            <button class="button is-link px-50"  type="reset">Reset</button>
        </div>
        <div class="column is-3 has-text-right">
            @if(isset($_REQUEST['taxonomy']))
                <span class="title is-4 is-pulled-right ml-5 mt-2 tool">
                    <i class="fa fa-question-circle"></i>
                    <span class="msg">
                        Wishlist is a tool save and resume your searched and see availability
                    </span>
                </span>
                <a href="{{ route('wishlist_save', ['taxonomy' => $_REQUEST['taxonomy']]) }}" class="button is-info px-50">Add to wish list</a>
            @endif
        </div>
    </div>

</div>
</section>