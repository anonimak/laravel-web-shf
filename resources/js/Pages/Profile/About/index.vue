<template>
    <Layout>
        <div>Ini About {{ meta }}</div>
    </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts

export default {
    components: {
        Layout
    },
    props: ["meta"]
};
</script>
