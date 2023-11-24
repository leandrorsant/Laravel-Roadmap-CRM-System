<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CardList from '@/Components/CardList.vue';

defineProps({
    clients: Object
});
</script>


<template>
    <AppLayout title="Projects">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
        </template>
        <CardList  :objectList=clients></CardList>
    </AppLayout>
</template>