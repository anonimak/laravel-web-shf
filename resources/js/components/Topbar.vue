<template>
  <nav class="topnav navbar-expand-lg">
    <div class="container">
      <inertia-link class="navbar-brand py-3" :href="route('home')">
        <img src="/img/brand.png" alt width="300px" />
      </inertia-link>
    </div>
  </nav>
</template>
<style scoped>
@media (max-width: 768px) {
  a.navbar-brand {
    margin-left: 1rem !important;
  }
}
</style>
