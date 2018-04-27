<section class="search_box box column is-12 mt-15 mb-0">
    <h5 class="title is-5 mb-5">SEARCH FOR CARS</h5>
    <div class="b-line">
        <div></div>
    </div>
    <div class="columns pt-10">
        <div class="column is-10">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Search By Keyword</label>
                </div>
                <div class="field-body">
                    <div class="field">
                      <p class="control">
                        <input class="input" type="text" name="search" placeholder="Search here ...">
                      </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2">
            <button class="button is-white px-30" type="submit"><b>Search</b></button>
        </div>
    </div>
    <div class="columns is-multiline">
        <div class="column is-4">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Make</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth">
                            <select name="taxonomy[]">
                                <option value="">All</option>
                                @foreach($sidebar->make as $data)
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
        <div class="column is-4">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Model</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth">
                            <select name="taxonomy[]">
                                <option value="">All</option>
                                @foreach($sidebar->model as $data)
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
        <div class="column is-4">
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
        <div class="column is-4">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Type</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth">
                            <select name="taxonomy[]">
                                <option value="">All</option>
                                @foreach($sidebar->{'body-type'} as $data)
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
        <div class="column is-4">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Stearing</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth">
                            <select name="taxonomy[]">
                                <option value="">All</option>
                                @foreach($sidebar->steering as $data)
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
        <div class="column is-4">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Deals</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth">
                            <select name="taxonomy[]">
                                <option value="">All</option>
                                @foreach($sidebar->status as $data)
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
    </div>
</section>