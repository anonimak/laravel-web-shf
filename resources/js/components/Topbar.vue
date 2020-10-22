<template>
    <nav class="topnav navbar navbar-expand-lg container">
        <inertia-link class="navbar-brand" :href="route('home')">
            <img src="/img/brand.png" alt width="300px" />
        </inertia-link>
        <b-navbar-nav class="ml-auto">
            <language-selector />
        </b-navbar-nav>
    </nav>
</template>
<script>
import LanguageSelector from "@/Shared/LanguageSelector";

export default {
    components: {
        LanguageSelector
    }
};
</script>
<style scoped>
nav {
    z-index: 1021;
}

@media (max-width: 768px) {
    img {
        width: 200px;
    }
}
</style>
