<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    projects: Object
});
</script>


<template>
    <AppLayout title="Projects">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div v-for="project in projects">
                        {{ project.title }}
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>