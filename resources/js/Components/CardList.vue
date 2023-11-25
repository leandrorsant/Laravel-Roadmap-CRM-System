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
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div class="bg-gray-200 m-2 p-4 rounded-md" v-for="current in objectList">                       
                        <input v-if="edit" v-model="editedElement" placeholder="current.name" />
                        <p v-if="!edit">{{ (current.name ? current.name : current.title) }}</p>
                        <div class="float-right inline-block">
                            <button v-on:click="$event => edit = !edit" class="bg-blue-400 text-white mr-2 p-1 rounded-md hover:bg-blue-800">Edit</button>
                            <Link v-if="deleteRoute" method="delete" as="button" type="button" :href="route(deleteRoute, current, )" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-800">Delete</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>