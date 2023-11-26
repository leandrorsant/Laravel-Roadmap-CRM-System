<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CardList from '@/Components/CardList.vue';

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
        <CardList  :objectList=projects deleteRoute="projects.destroy" editRoute="/projects/"></CardList>
    </AppLayout>
</template>