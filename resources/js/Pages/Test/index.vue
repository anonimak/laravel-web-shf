<template>
    <Layout>
        <!-- <particles-bg type="cobweb" bg="true" color="#009688"/> -->
        {{ __("test_param", { param: nama }) }}
        {{ __n("test_plural", 2) }}
    </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts

export default {
    components: { Layout },
    data() {
        return {
            nama:"Jono"
        }
    },
};
</script>
