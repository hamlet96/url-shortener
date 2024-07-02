<script setup>
import {ref} from 'vue';

let url = ref('');
const errorMessage = ref('');
const shortenedUrl = ref('');

function shortenUrl() {
    axios.post('/url/store', {
        url: url.value,
    }).then(response => {
        errorMessage.value = '';
        shortenedUrl.value = response.data.data.shortened_url;
    }).catch(error => {
        errorMessage.value = error.response.data.message ?? 'An error occurred';
        shortenedUrl.value = '';
    });
}

</script>

<template>
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-medium leading-6 text-gray-900">Paste a long
                URL</label>
            <div class="mt-2">
                <input v-model="url" type="text"
                       placeholder="https://example.com/very-long-url-that-needs-to-be-shortened"
                       class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div v-if="shortenedUrl">
                <label class="block mt-2 text-sm font-medium leading-6 text-gray-900">Shortened
                    URL</label>
                <input type="text"
                       class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       :value="shortenedUrl" readonly>
            </div>
        </div>
        <div v-if="errorMessage.length>0">
            <p class="mt-2 text-sm text-red-600">{{ errorMessage }}</p>
        </div>


        <div>
            <button @click="shortenUrl"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Shorten URL
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
