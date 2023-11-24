<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    objectList: Object,
    deleteRoute: String,
    csrf: document.head.querySelector('meta[name="csrf-token"]').content
});
</script>

<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div class="bg-gray-200 m-2 p-4 rounded-md" v-for="current in objectList">
                        {{ current.name ? current.name : current.title }}
                        <div class="float-right inline-block">
                            <button class="bg-blue-400 text-white mr-2 p-1 rounded-md hover:bg-blue-800">Edit</button>
                            <form v-if="deleteRoute" :action="route(deleteRoute, current)" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" :value="csrf">
                                <button type="submit" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-800">Delete</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>