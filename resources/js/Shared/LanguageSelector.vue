<template>
    <b-nav-item-dropdown text="User" right no-caret class="p-auto">
        <template slot="button-content">
            <p class="font-lang">
                {{ nameActiveLang }}
                <i class="fas fa-globe"></i>
            </p>
        </template>
        <li v-for="item in itemLang" :key="item.name" role="presentation">
            <inertia-link
                class="dropdown-item font-lang"
                :class="item.iName == activeLang ? 'active' : ''"
                :href="route('language', [item.iName])"
            >
                <Flag :name="item.iName" />
                {{ item.name }}
            </inertia-link>
        </li>
    </b-nav-item-dropdown>
</template>
<script>
import Flag from "@/Shared/IconFlag";

export default {
    components: {
        Flag
    },
    data() {
        return {
            itemLang: [
                { name: "English", iName: "en" },
                { name: "Indonesia", iName: "id" }
            ],
            activeLang: this.$page.locale,
            nameActiveLang: "Eng"
        };
    },
    mounted() {
        this.checkLangName();
    },
    methods: {
        checkLangName() {
            if (this.activeLang != "en") this.nameActiveLang = "Ind";
        }
    }
};
</script>
<style scoped>
.dropdown-menu {
    z-index: 99999;
}

p.font-lang,
a.font-lang {
    font-size: 13px;
}
</style>
