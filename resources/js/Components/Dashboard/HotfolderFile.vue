<script setup>
import Trash from '~icons/mdi/trash'
import {ref, defineProps, defineEmits} from 'vue';
import {Link} from "@inertiajs/vue3";

const {file, isSelected} = defineProps(['file', 'isSelected']);
const emit = defineEmits();

const toggleSelect = () => {
    emit('toggle-select', file.filename);
};

</script>

<template>
    <tr class="hover:bg-gray-700">
        <td class="py-3 px-4">
            <input
                type="checkbox"
                class="form-checkbox text-blue-500"
            />
        </td>
        <td class="py-3 px-4 text-white ">{{ file.filename }}</td>
        <td class="py-3 px-4 text-white">{{ file.extension }}</td>
        <td class="py-3 px-4 text-white">{{ file.mimetype }}</td>
        <td class="py-3 px-4">
            <div v-if="file.supported" class="text-green-500">Yes</div>
            <div v-else class="text-red-500">No</div>
        </td>
        <td class="py-3 px-4">
            <Link :href="route('hotfolder.delete')" method="POST" :data="{deleteItem: file}" as="button"
                  class="text-red-500 hover:text-red-700 underline">
                <Trash color="white" width="25" height="25"/>
            </Link>
        </td>
    </tr>

</template>
