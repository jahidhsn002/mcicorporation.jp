<template>
<div class="file is-boxed mb-5 image-upload">
    <label class="file-label">
        <input class="file-input" accept="image/*" type="file" @change="imageUpload($event)" :multiple="multiple">
        <input type="hidden" :name="name" :value="json_data">
        <span :class="!Array.isArray(data)?'file-cta':'box pa-0'">
            <span v-if="!Array.isArray(data)" class="file-icon">
                <i class="fa fa-upload"></i>
            </span>
            <span v-if="!Array.isArray(data)" class="file-label">
                {{opt.placeholder}}
            </span>
            <span v-if="Array.isArray(data)">
                <span class="columns is-multiline is-gapless" v-if="data.length>1">
                    <span class="column is-4" v-for="link in data">
                        <figure class="image is-2by3">
                            <img :src="$url+link" @click="data=null">
                        </figure>
                    </span>
                </span>
                <figure class="image is-2by3"  v-if="data.length<=1">
                    <img v-for="link in data" :src="$url+link" @click="data=null">
                </figure>
            </span>
        </span>
    </label>
</div>
</template>

<script>
export default {
    props: ['value', 'multiple', 'name'],
    data: function(){
        return {
            data: null,
            json_data: '{}',
            url: $url,
            opt: {
                default: null,
                placeholder: 'Upload File'
            }
        }
    },
    methods: {
        imageUpload(event) {
            var _this = this;
            var fileList = event.target.files;
            var formData = new FormData();
            if (!fileList.length) return;
            Array
                .from(Array(fileList.length).keys())
                .map(x => {
                    formData.append('files[]', fileList[x], fileList[x].name);
                });

            $app.spin()
            axios.post($url+'/upload', formData, {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    $app.spin()
                    if(response.data)
                        _this.data = response.data
                })
                .catch(error => {
                    $app.spin()
                    if (is_silent)
                        $app.httpError(error)
                    if(error.response.data.errors)
                        $app.errors = error.response.data.errors
                })
        }
    },
    watch: {
        value: function (val) {
            this.data = val
        },
        data: function (val) {
            if (this.data==null) this.json_data = '{}'
            else this.json_data = JSON.stringify(this.data)
        }
    },
    mounted() {
        this.data = this.value
    }
}
</script>