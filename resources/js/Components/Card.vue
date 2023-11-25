<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

defineProps({
    objectList: Object,
    deleteRoute: String,
});

</script>

<template>
    <input v-if="edit"  v-model="editedElement" placeholder="current.name" />
    <p v-if="!edit">{{ (current.name ? current.name : current.title) }}</p>
    <div class="float-right inline-block">
        <button v-on:click="$event => edit = !edit" class="bg-blue-400 text-white mr-2 p-1 rounded-md hover:bg-blue-800">Edit</button>
        <Link v-if="deleteRoute" method="delete" as="button" type="button" :href="route(deleteRoute, current, )" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-800">Delete</Link>
    </div>
</template>