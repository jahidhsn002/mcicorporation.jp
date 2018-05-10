<template>
<div class="is-boxed ma-5">
    <button class="button mt-5 is-success" @click.prevent="modelActive=true">
        <slot name="button"></slot>
    </button>

    <b-modal :active.sync="modelActive" :width="640" scroll="keep">
        <slot></slot>
    </b-modal>
</div>
</template>

<script>
export default {
    data: function(){
        return {
            modelActive: false,
        }
    }
}
</script>