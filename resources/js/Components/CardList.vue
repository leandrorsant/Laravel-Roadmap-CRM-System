<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from "./Pagination.vue"
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
    objectList: Object,
    deleteRoute: String,
    editRoute: String
   
});

const form = reactive({
  id: null,
  name: null,
})

function submit(current) {
  form.id = current.id
  router.put(props.editRoute+current.id, form)
}
</script>


<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg p-10">
                <table :id="index" class="w-full m-2 rounded-md" v-for="(current, index) in objectList.data" :key="current.id">
                    <tr class="border-2 hover:bg-blue-200 hover:text-gray-800 rounded-md">
                        <td class="w-4/5 p-4">  
                            <form v-if="editRoute"  @submit.prevent="$event=>{
                                    submit(current)
                                    this.$refs['input'+current.id][0].classList.toggle('hidden')
                                    this.$refs['p'+current.id][0].classList.toggle('hidden')
                                }" 
                                :ref="'input'+current.id" class="hidden"
                            >
                                <input :placeholder="current.title? current.title:current.name" v-model="form.name" class="w-full rounded-md"/>
                                <button type="submit" class="bg-green-400    text-white border-2 p-2 m-1 rounded-md">Submit</button>
                            </form>
                            <p :id="'p'+current.id" :ref="'p'+current.id">{{ (current.name ? current.name : current.title) }}</p>
                        </td>
                        <td class="text-right">
                            <span class="m-2">
                                <button 
                                    v-on:click="$event => {
                                        this.$refs['input'+current.id][0].classList.toggle('hidden')
                                        this.$refs['p'+current.id][0].classList.toggle('hidden')
                                    }" 
                                    class="bg-blue-400 text-white mr-2 p-1 rounded-md hover:bg-blue-800"
                                >
                                    Edit
                                </button>
                                <Link v-if="deleteRoute" method="delete" as="button" type="button" :href="route(deleteRoute, current, )" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-800">Delete</Link>
                            </span>
                        </td>
                    </tr>
                    
                </table>
                </div>
            </div>
            <Pagination :elements="objectList"></Pagination>
        </div>
</template>