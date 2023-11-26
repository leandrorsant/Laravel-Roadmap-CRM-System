<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CardList from '@/Components/CardList.vue';

defineProps({
    users: Object
});
</script>


<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <CardList :objectList=users deleteRoute="users.destroy" editRoute="/users/"></CardList>
    </AppLayout>
</template>
