<template>
<div class="inqueryForm2">
    <div class="card" id="step">
        <header class="card-header ash">
            <p class="card-header-title">Step 1. CHOOSE YOUR DELIVERY OPTIONS</p>
        </header>
        <div class="card-content px-0">
            <input v-if="vehicle" type="hidden" name="vehicle_id" :value="vehicle.id">
                <div class="field px-20">
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
                <div class="field mb-0">
                    <table class="table is-striped is-bordered mb-0" width="100%">
                        <tr>
                            <th>Arival Port</th>
                            <th>Delevary Destination</th>
                            <th>Delevary Price</th>
                            <th>Total</th>
                        </tr>
                        <tr v-for="port in ports">
                            <td>{{ port.name }}</td>
                            <td>
                                <label class="radio">
                                    <input v-model="radio_port_id" :value="port.id" type="radio">
                                </label>
                                {{ port.name }} (port)
                            </td>
                            <td>{{ vehicle.total - vehicle.price }}</td>
                            <td>{{ vehicle.total }}</td>
                        </tr>
                    </table>
                </div>
                <div class="ash py-10">
                    <div class="px-20">
                        <p class="title is-6 my-5">Additional Options</p>
                        <div class="pt-5">
                            <input type="checkbox" v-model="check_warranty" value="On"> Warranty (FREE TRIAL!)
                        </div>
                        <hr class="my-10" />
                    </div>
                    <div class="px-20">
                        <p class="title is-6 my-5">Local Government Requirements</p>
                        <div class="pt-5">
                            <input type="checkbox" v-model="check_inspection" value="On"> Pre-export Inspection
                        </div>
                        <div class="pt-5">
                            <input type="checkbox" v-model="check_certificate" value="On"> Required by government
                        </div>
                        <div class="pt-5">
                            <input type="checkbox" v-model="check_insurance" value="On"> Insurance for Damage
                        </div>
                    </div>
                </div>
                <div class="px-20 py-10">
                    <div class="title is-6 mb-0has-text-centered">Discount Coupon</div>
                    <div class="">
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
            <hr class="mt-0" />
            <div class="px-20">
                <div class="columns">
                    <div class="column is-6">
                        <h4 class="title is-5">Total Price</h4>
                    </div>
                    <div class="column is-6 has-text-right">
                        <h4 class="title is-5">C&amp;F {{vehicle.total}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box mt-20">
        You're almost there! We just need a few more details below <br/>
        <span v-if="(vehicle.actual_price-vehicle.price)>0" class="has-text-success">
            Save <span class="has-text-danger">{{ vehicle.actual_price-vehicle.price }}</span> on this vehicle today. Don't miss out on this price!
        </span>
    </div>

    <div class="has-text-centered">
        <img src="/img/icon_step_arrow.png">
    </div>

    <div class="card mt-15">
        <header class="card-header ash">
            <p class="card-header-title">Step 2. YOUR DETAILS</p>
        </header>
        <div class="card-content">
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Name*</label>
                        <div class="control">
                            <input type="text" class="input" name="name" v-model="user.name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email*</label>
                        <div class="control">
                            <input type="email" class="input" name="email" v-model="user.email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Phone*</label>
                        <div class="control">
                            <input type="text" class="input" name="phone" v-model="user.phone">
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label">City*</label>
                        <div class="control">
                            <input type="text" class="input" name="city" v-model="user.city">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Address*</label>
                        <div class="control">
                            <input type="text" class="input" name="address" v-model="user.address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="has-text-centered">
                <button class="button is-warning is-large">GET A PRICE QUOTATION NOW</button>
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
            port: null,
            radio_port_id: null
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
            if(_this.radio_port_id) port_id = _this.radio_port_id;

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
            if(_this.radio_port_id) port_id = _this.radio_port_id; else port_id = _this.port_id

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