<script setup>
import {Head, usePage} from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import {computed, ref} from 'vue'
import useSlipSockets from '@/Composables/useSlipSockets.js'
import HotfolderFile from "@/Components/Dashboard/HotfolderFile.vue";
import useCheckboxSelection from '@/Composables/useCheckboxSelection.js';


const { selectedItems, toggleSelect, isSelected } = useCheckboxSelection();

const selectAll = ref(false)
const files = ref(computed(() => usePage().props.files))
const check = selectedItems.value

useSlipSockets()
</script>

<template>
    <Head title="Hot Folder"/>
    <MainLayout>
        <div class="w-full flex justify-center">

            <div class="bg-gray-800 p-8 rounded-lg">


                <div>
                    <div class="w-full">
                        <div class="text-white" v-if="files.length">Your Hot folder contains {{files.length}} files</div>
                    </div>
                    <div class="text-right w-full">
                        <div v-if="check.length" class="text-white">You chose {{check.length}} files</div>
                        <button @click="" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4 mr-4">Upload</button>
                        <button @click="" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </div>
                </div>
                <table class="w-full bg-gray-900 rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-500" v-model="selectAll" @change="toggleSelectAll" />
                            </label>
                        </th>
                        <th class="py-3 px-4">Filename</th>
                        <th class="py-3 px-4">Extension</th>
                        <th class="py-3 px-4">Mimetype</th>
                        <th class="py-3 px-4">Supported</th>

                        <th class="py-3 px-4"></th>

                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">

                    <HotfolderFile v-for="file in files"
                                   :file="file"
                                   :is-selected="isSelected(file.filename)"
                                   @toggle-select="toggleSelect(file.filename)">
                    </HotfolderFile>

                    </tbody>
                </table>
            </div>
        </div>
    </MainLayout>
</template>
<style>
</style>
