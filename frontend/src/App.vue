<script setup lang="ts"></script>

<template>
  <div class="min-h-screen bg-background">
    <nav class="bg-gray-800 text-white p-4 shadow-xl rounded-b-sm">
      <div class="container mx-auto flex justify-between items-center">
        <RouterLink to="/" class="text-lg font-bold">Home Page</RouterLink>
      </div>
    </nav>
    <RouterView />
  </div>
</template>

<style scoped></style>
