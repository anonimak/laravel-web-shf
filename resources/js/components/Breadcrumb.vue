<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li
        class="breadcrumb-item"
        v-for="item in items"
        :key="item.title"
        :class="{ active: item.active }"
      >
        <inertia-link v-if="!item.active" :href="route(item.href)">
          {{
          item.title
          }}
        </inertia-link>
        <span v-else>{{ item.title }}</span>
      </li>
    </ol>
  </nav>
</template>

<script>
export default {
  props: {
    items: {
      type: Array,
    },
  },
};
</script>
