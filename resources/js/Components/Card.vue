<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

defineProps({
    objectList: Object,
    deleteRoute: String,
    edit : false
});

</script>

<template>
    <!-- <input v-if="edit" placeholder="current.name" /> -->
    <p v-if="!edit">{{ (current.name ? current.name : current.title) }}</p>
    <div class="float-right inline-block">
        <button v-on:click="console.log(this.$refs)" class="bg-blue-400 text-white mr-2 p-1 rounded-md hover:bg-blue-800">Edit</button>
        <Link v-if="deleteRoute" method="delete" as="button" type="button" :href="route(deleteRoute, current, )" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-800">Delete</Link>
    </div>
</template>