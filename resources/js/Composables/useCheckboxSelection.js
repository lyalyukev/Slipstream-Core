import { ref } from 'vue';

export default function useCheckboxSelection(initialSelection = []) {
    const selectedItems = ref(initialSelection);

    function toggleSelect(filename) {
        const newSelectedItems = { ...selectedItems.value }; // Создаем копию объекта
        if (newSelectedItems[filename]) {
            // Если файл уже выбран, удаляем его из объекта
            delete newSelectedItems[filename];
        } else {
            // Если файл не выбран, добавляем его в объект
            newSelectedItems[filename] = true;
        }
        selectedItems.value = newSelectedItems; // Присваиваем измененный объект
    }
    function isSelected(filename) {
        return !!selectedItems.value[filename];
    }

    return { selectedItems, toggleSelect, isSelected };
}
