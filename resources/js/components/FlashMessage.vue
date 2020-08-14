<template>
  <div class="flash">
    <div v-if="$page.flash.success" class="green">{{ $page.flash.success }}</div>
    <div v-if="$page.flash.error" class="red">{{ $page.flash.error }}</div>
    <div v-if="$page.flash.info" class="red">{{ $page.flash.info }}</div>
  </div>
</template>
