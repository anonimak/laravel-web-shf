<template>
    <div id="wrapper">
        <!-- Content Wrapper -->
        <Sidebar />
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <Navbar />
                <main>
                    <div class="container-fluid">
                        <slot />
                    </div>
                </main>
            </div>
            <Footer />
        </div>
    </div>
</template>
<script>
import Sidebar from "@/components/AdminComponents/Sidebar";
import Navbar from "@/components/AdminComponents/Navbar";
import Footer from "@/components/AdminComponents/Footer";
// import { ParticlesBg } from "particles-bg-vue";

export default {
    components: {
        Sidebar,
        Navbar,
        Footer
        // ParticlesBg
    },
    methods: {
        handleLogout() {
            alert("Ini Sudah Logout");
        }
    }
};
</script>
