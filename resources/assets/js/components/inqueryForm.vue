<template>
<div class="card inqueryForm">
    <header class="card-header">
        <p class="card-header-title">
            <span class="title is-5 px-10 has-text-left my-5">INQUIRY (FREE QUOTE)</span>
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon delete">
            <i class="fa fa-times" aria-hidden="true"></i>
          </span>
        </a>
    </header>
    <div class="card-content pa-0">
        <div class="is-boxed ma-5">
            <div class="vehicleDetails pa-15">
                <h5 class="title is-6 has-text-left my-5">{{ vehicle.name }}</h5>
                <div class="columns">
                    <div class="column">
                        <img v-if="vehicle.thumbnail" v-for="link in JSON.parse(vehicle.thumbnail)" :src="link" style="height: 100px">
                        <input v-if="vehicle" type="hidden" name="vehicle_id" :value="vehicle.id">
                    </div>
                    <div class="column has-text-left">
                        <div class="columns is-gapless mb-2">
                            <div class="column">Year</div>
                            <div class="column">{{ vehicle.year }}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Engine</div>
                            <div class="column">{{ vehicle.engine }}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Mileage</div>
                            <div class="column">{{ vehicle.mileage }}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Seats</div>
                            <div class="column">{{ vehicle.seats }}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Dors</div>
                            <div class="column">{{ vehicle.dors }}</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="columns is-gapless mb-2">
                            <div class="column">Insurance</div>
                            <div class="column">{{insurance=='On'?'Yes':'No'}}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Inspection</div>
                            <div class="column">{{inspection=='On'?'Yes':'No'}}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Certificate</div>
                            <div class="column">{{certificate=='On'?'Yes':'No'}}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Warranty</div>
                            <div class="column">{{warranty=='On'?'Yes':'No'}}</div>
                        </div>
                        <div class="columns is-gapless mb-2">
                            <div class="column">Price</div>
                            <div class="column">
                                <span class="has-text-success title is-5">
                                    <b>{{ vehicle.total }}</b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="columns">
                    <label class="column is-4 has-text-right">Choose Final Country*</label>
                    <div class="column is-8">
                        <v-select v-model="country" :filterable="false" :options="countries" @search="getCountries" @change="defaultSearch()" label="name">
                            <template slot="option" slot-scope="option">
                              <div class="d-center">
                                {{ option.name }}
                                </div>
                            </template>
                        </v-select>
                        <input v-if="country" type="hidden" name="country_id" :value="country.id">
                    </div>
                </div>
                <div class="columns">
                    <label class="column is-4 has-text-right">Choose Final Port*</label>
                    <div class="column is-8">
                        <v-select v-model="port" :filterable="false" :options="ports" @search="getPorts" label="name">
                            <template slot="option" slot-scope="option">
                              <div class="d-center">
                                {{ option.name }}
                                </div>
                            </template>
                        </v-select>
                        <input v-if="port" type="hidden" name="port_id" :value="port.id">
                    </div>
                </div>

            </div>
            <div class="pa-15">
                <div class="columns">
                    <label class="column is-4 has-text-right">Name</label>
                    <div class="column is-8">
                        <input type="text" class="input" name="name" v-model="user.name" style="width:100%">
                    </div>
                </div>
                <div class="columns">
                    <label class="column is-4 has-text-right">Email</label>
                    <div class="column is-8">
                        <input type="email" class="input" name="email" v-model="user.email">
                    </div>
                </div>
                <div class="columns">
                    <label class="column is-4 has-text-right">Phone*</label>
                    <div class="column is-8">
                        <input type="text" class="input" name="phone" v-model="user.phone">
                    </div>
                </div>
                <div class="columns">
                    <label class="column is-4 has-text-right">City</label>
                    <div class="column is-8">
                        <input type="text" class="input" name="city" v-model="user.city">
                    </div>
                </div>
                <div class="columns">
                    <label class="column is-4 has-text-right">Address*</label>
                    <div class="column is-8">
                        <input type="text" class="input" name="address" v-model="user.address">
                    </div>
                </div>
                
                <div class="columns">
                    <label class="column is-4 has-text-right">Discount Coupon</label>
                    <div class="column is-8">
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input type="text" class="input" name="token" v-model="user.token">
                            </div>
                            <div class="control">
                                <button type="submit" class="button is-default">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="has-text-centered">
                    <button class="button is-warning is-large px-100" type="submit">Get free quote</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: [
        'ajax_inquery_url', 'csrf_token',
        'vehicle_id', 'country_id', 'port_id',
        'insurance', 'inspection', 'certificate', 'warranty'
    ],
    data: function(){
        return {
            countries: [],
            country: null,

            vehicle: null,
            user: {},

            ports: [],
            port: null
        }
    },
    methods: {
        dataSearch(search, loading, type) {
            loading(true);
            let _this = this;
            let portSearch = null;
            let countrySearch = null;

            if(type = 'portSearch') portSearch = search;
            if(type = 'countrySearch') countrySearch = search;

            let vehicle_id = null;
            let country_id = null;
            let port_id = null;

            if(_this.vehicle) vehicle_id = _this.vehicle.id;
            if(_this.country) country_id = _this.country.id;
            if(_this.port) port_id = _this.port.id;

            axios.post(_this.ajax_inquery_url, {
                vehicle_id: vehicle_id,
                country_id: country_id,
                port_id: port_id,
                countrySearch: countrySearch,
                portSearch: portSearch,
                insurance: _this.insurance,
                inspection: _this.inspection,
                certificate: _this.certificate,
                warranty: _this.warranty
            })
            .then(response => {
                loading(false);
                if(response.data.countries)
                    _this.countries = response.data.countries;
                if(response.data.vehicles)
                    _this.vehicles = response.data.vehicles;
                if(response.data.ports)
                    _this.ports = response.data.ports;
            })
            .catch(error => {
                loading(false);
            })
        },
        getCountries(search, loading) {
            this.dataSearch(search, loading, 'countrySearch');
        },
        getPorts(search, loading) {
            this.dataSearch(search, loading, 'portSearch');
        },
        defaultSearch() {
            let _this = this;
            let vehicle_id = null;
            let country_id = null;
            let port_id = null;

            if(_this.vehicle) vehicle_id = _this.vehicle.id; else vehicle_id = _this.vehicle_id
            if(_this.country) country_id = _this.country.id; else country_id = _this.country_id
            if(_this.port) port_id = _this.port.id; else port_id = _this.port_id

            axios.post(_this.ajax_inquery_url, {
                vehicle_id: vehicle_id,
                country_id: country_id,
                port_id: port_id,
                countrySearch: null,
                portSearch: null,
                insurance: _this.insurance,
                inspection: _this.inspection,
                certificate: _this.certificate,
                warranty: _this.warranty
            })
            .then(response => {
                if(response.data.countries)
                    _this.countries = response.data.countries;
                if(response.data.country)
                    _this.country = response.data.country;
                if(response.data.vehicles)
                    _this.vehicles = response.data.vehicles;
                if(response.data.vehicle)
                    _this.vehicle = response.data.vehicle;
                if(response.data.ports)
                    _this.ports = response.data.ports;
                if(response.data.port)
                    _this.port = response.data.port;
                if(response.data.user)
                    _this.user = response.data.user;
            })
            .catch(error => {

            })
        }
    },
    mounted() {
        this.defaultSearch();
    }
}
</script>