<template>
    <div class="card border-0 shadow hvr-float">
        <inertia-link :href="route(link)">
            <img class="img-card-top" :src="imgSrc" />
            <div class="card-body">
                <h5 class="card-title text-dark">
                    {{ title }}
                </h5>
            </div>
        </inertia-link>
    </div>
</template>
<script>
export default {
    props: ["link", "imgSrc", "title"]
};
</script>
