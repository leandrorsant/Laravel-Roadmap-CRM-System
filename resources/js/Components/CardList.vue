<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div :id="index" class="bg-gray-200 m-2 p-4 rounded-md" v-for="(current, index) in objectList" :key="current.id">
                        <form @submit.prevent="$event=>{
                            $event.preventDefault();
                            submit(current)
                            this.$refs['input'+current.id][0].classList.toggle('hidden')
                            this.$refs['p'+current.id][0].classList.toggle('hidden')
                            }" :ref="'input'+current.id" class="hidden">
                            <!-- <input type="hidden" :value="current.id" v-bind:hidden="form.id"> -->
                            <input :placeholder="current.title? current.title:current.name" v-model="form.name" />
                            <button type="submit">Submit</button>
                        </form>                     
                        
                        <p :id="'p'+current.id" :ref="'p'+current.id">{{ (current.name ? current.name : current.title) }}</p>
                        <div class="float-right inline-block">

                            <button 
                                v-on:click="$event => {
                                    //console.log(this.$refs['input'+current.id][0].children[0]);
                                    this.$refs['input'+current.id][0].classList.toggle('hidden')
                                    this.$refs['p'+current.id][0].classList.toggle('hidden')
                                }" 
                                class="bg-blue-400 text-white mr-2 p-1 rounded-md hover:bg-blue-800"
                            >
                                Edit
                            </button>
                            <Link v-if="deleteRoute" method="delete" as="button" type="button" :href="route(deleteRoute, current, )" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-800">Delete</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>