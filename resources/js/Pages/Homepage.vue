<script setup>
import ShortenerForm from '../Components/ShortenerForm.vue';
</script>

<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Shorten a long URL
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <ShortenerForm />
        </div>
    </div>
</template>

<style scoped>

</style>
