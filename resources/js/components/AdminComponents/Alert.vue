<template>
    <b-alert v-if="flash.success"
            show="3"
            dismissible
            fade
            variant="success"
        >
        {{ flash.success }}
    </b-alert>
    <b-alert v-else-if="flash.error"
            show="3"
            dismissible
            fade
            variant="error"
        >
        {{ flash.error }}
    </b-alert>
    <b-alert v-else-if="flash.info"
            show="3"
            dismissible
            fade
            variant="info"
        >
        {{ flash.info }}
    </b-alert>
</template>
<script>
export default {
    props:["flash"],
    data() {
        return {
            variant:null
        }
    }
}
</script>